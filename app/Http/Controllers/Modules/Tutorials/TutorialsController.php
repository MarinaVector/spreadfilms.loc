<?php
namespace App\Http\Controllers\Modules\Tutorials;

use App\Http\Controllers\Controller;
use App\Models\Companycategory;
use App\Models\Paragraph;
use App\Models\Paragraphs\NormalText;
use App\Models\Paragraphs\TextImage;
use App\Models\Pivots\TutorialAssignee as TutorialAssigneePivot;
use App\Models\Pivots\TutorialCompanycategory as TutorialCompanycategoryPivot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tutorial;
use Illuminate\View\View;

class TutorialsController extends Controller
{
    //Admin page where he can manage tutorials
    final public function manageTutorials(): View {
        /*$tutorial = Tutorial::find(71);
        dump($tutorial->deleteRecursively());
        dd('end');*/
        $user = Auth::user();
        $userCompanyTutorials = $user->company()->tutorials;
        $userCompanyTutorialsNested = [];
        foreach($userCompanyTutorials->toArray() as $tutorial){
            if($tutorial['parent_tutorial_id'] === 0){
                $resTutorial = [
                    'id' => $tutorial['id'],
                    'label' => $tutorial['name'],
                ];
                $resChildren = $this->getTutorialChildren($userCompanyTutorials->toArray(), $tutorial['id']);
                if($resChildren){
                    $resTutorial['children'] = $resChildren;
                }
                $userCompanyTutorialsNested[] = $resTutorial;
            }
        }
        //dd($userCompanyTutorialsNested);
        $userCompanyTutorialsNestedJSON = json_encode($userCompanyTutorialsNested);

        return view('modules.tutorials.manage_tutorials')->with([
            'authUser' => $user,
            'companyTutorials' => $userCompanyTutorialsNestedJSON
        ]);
    }

    final public function addTutorial(): View {
        $user = Auth::user();
        $userCompany = $user->company();
        $usercompanyusers = $userCompany->users()->with('companyroles')->get();
        $userCompanyTutorials = $user->company()->tutorials;
        $userCompanyTutorialsNested = [];
        foreach($userCompanyTutorials->toArray() as $tutorial){
            if($tutorial['parent_tutorial_id'] === 0){
                $resTutorial = [
                    'id' => $tutorial['id'],
                    'label' => $tutorial['name'],
                ];
                $resChildren = $this->getTutorialChildren($userCompanyTutorials->toArray(), $tutorial['id']);
                if($resChildren){
                    $resTutorial['children'] = $resChildren;
                }
                $userCompanyTutorialsNested[] = $resTutorial;
            }
        }
        $userCompanyTutorialsNestedJSON = json_encode($userCompanyTutorialsNested);
        $companyCategoriesJSON = $userCompany->companycategories->toJson();

        return view('modules.tutorials.add')->with(
            [
                'authUser' => $user,
                'userCompanyUsers' => $usercompanyusers,
                'companyTutorials' => $userCompanyTutorialsNestedJSON,
                'companyCategoriesJSON' => $companyCategoriesJSON
            ]);
    }

    final public function statisticsTutorial(): View {

        return view('modules.tutorials.statistics')->with('authUser', Auth::user());
    }

    final public function storeTutorial(Request $request): RedirectResponse {
        //dd($request->all());
        $user = Auth::user();

        // 1. Determining the sortorder of a new tutorial
        $maxSortorder = Tutorial::where('parent_tutorial_id', $request->get('parent_tutorial_id'))
            ->where('company_id', $user->company()->id)->max('sortorder');

        // 2. store tutorial
        $tutorial = Tutorial::create([
            'name' => $request->get('tutorial_name'),
            'tutorial_background' => $request->get('tutorial_background'),
            'parent_tutorial_id' => $request->get('parent_tutorial_id') ? $request->get('parent_tutorial_id') : 0,
            'company_id' => $user->company()->id,
            'sortorder' => $maxSortorder + 1
        ]);

        // 3. store all tutorial paragraph blocks
        $paragraphsArr = json_decode($request->get('paragraphsJSON'), true);
        foreach($paragraphsArr as $paragraph){
            $paragraphId = Paragraph::create(['tutorial_id' => $tutorial->id, 'paragraph_type' => $paragraph['ComponentType']])->id;
            $this->storeParagraphData($paragraph, $paragraphId);
        }

        // 4. store all tutorial categories
        if(null !== $request->get('categories')) {
            $categoriesArr = explode(',', $request->get('categories'));
            foreach ($categoriesArr as $categoryId) {
                TutorialCompanycategoryPivot::create(['tutorial_id' => $tutorial->id, 'category_id' => $categoryId]);
            }
        }

        // 5. store tutorial assignees(who have permission to view it)
        if(null !== $request->get('assignee')) {
            $tutorialAssignees = array_keys($request->get('assignee'));
            foreach ($tutorialAssignees as $tutorialAssignee) {
                TutorialAssigneePivot::create(['tutorial_id' => $tutorial->id, 'assignee_id' => $tutorialAssignee]);
            }
        }

        // 6. redirect to tutorials manage page
        return redirect()->route('module.tutorials.admin')->with('success', __('messages.Tutorial_created'));
    }

    final public function update(Request $request) {
        //dd($request->all());
        $user = Auth::user();

        // 1. update tutorial
        $tutorial = Tutorial::find($request->get('tutorial_id'));
        $tutorial->name = $request->get('tutorial_name');
        $tutorial->tutorial_background = $request->get('tutorial_background');
        // updating sortorder(must be executed before assigning new parent_tutorial_id)
        if($tutorial->parent_tutorial_id !== $request->get('parent_tutorial_id')){
            $oldSortorder = $tutorial->sortorder;
            $maxSortorder = Tutorial::where('parent_tutorial_id', $request->get('parent_tutorial_id'))
                ->where('company_id', $user->company()->id)->max('sortorder');
            //setting new sortorder to current tutorial
            $tutorial->sortorder = $maxSortorder + 1;
        }
        $tutorial->parent_tutorial_id = $request->get('parent_tutorial_id');
        $tutorial->save();

        // 2. store all tutorial paragraph blocks
        $tutorial->deleteAllParagraphs();
        $paragraphsArr = json_decode($request->get('paragraphsJSON'), true);
        foreach($paragraphsArr as $paragraph){
            $paragraphId = Paragraph::create(['tutorial_id' => $tutorial->id, 'paragraph_type' => $paragraph['ComponentType']])->id;
            $this->storeParagraphData($paragraph, $paragraphId);
        }

        // 3. store all tutorial categories
        $tutorial->deleteAllCategories();
        if(null !== $request->get('categories')) {
            $categoriesArr = explode(',', $request->get('categories'));
            foreach ($categoriesArr as $categoryId) {
                TutorialCompanycategoryPivot::create(['tutorial_id' => $tutorial->id, 'category_id' => $categoryId]);
            }
        }

        // 4. store tutorial assignees(who have permission to view it)
        $tutorial->deleteAllAssignees();
        if(null !== $request->get('assignee')) {
            $tutorialAssignees = array_keys($request->get('assignee'));
            foreach ($tutorialAssignees as $tutorialAssignee) {
                TutorialAssigneePivot::create(['tutorial_id' => $tutorial->id, 'assignee_id' => $tutorialAssignee]);
            }
        }

        // 5. redirect to tutorials manage page
        return redirect()->route('module.tutorials.admin')->with('success', __('messages.Tutorial_updated'));
    }

    final public function delete(Request $request) {
        $tutorial = Tutorial::find($request->get('tutorial_id'));
        $tutorial->deleteRecursively();

        return redirect()->route('module.tutorials.admin')->with('success', __('messages.Tutorial_deleted'));
    }

    final public function changeOrder(Request $request):string{
        $params = $request->get('params');
        $tutorialID = $params['tutorialID'];
        $oldIndex = $params['oldIndex'];
        $newIndex = $params['newIndex'];
        $tutorial = Tutorial::find($tutorialID);
        $tutorial->updateTutorialsSortorder($oldIndex, $newIndex);

        return json_encode(['status' => 'ok']);
    }

    final public function storeParagraphData(array $paragraph, int $paragraphId): bool {
        switch ($paragraph['ComponentType']) {
            case 'NormalText':
                NormalText::create([
                    'paragraph_id' => $paragraphId,
                    'header' => $paragraph['header'],
                    'text' => $paragraph['text']
                ]);
                break;
            case 'TxtImg':
                TextImage::create([
                    'paragraph_id' => $paragraphId,
                    'header' => $paragraph['header'],
                    'text' => $paragraph['text'],
                    'src' => $paragraph['src']
                ]);
                break;
            default:
                break;
        }

        return true;
    }

    final public function editTutorialSettings():view {
        $user = Auth::user();
        $userCompany = $user->company();
        $userCompanyTutorialsSettings = $userCompany->tutorialsSettings->toJSON();

        return view('modules.tutorials.settings_tutorials')->with([
            'authUser' => $user,
            'userCompanyTutorialsSettings' => $userCompanyTutorialsSettings]);
    }

    final public function updateTutorialSettings(Request $request) {
        $user = Auth::user();
        $userCompany = $user->company();
        $userCompanyTutorialsSettings = $userCompany->tutorialsSettings;
        $userCompanyTutorialsSettings->logo = $request->get('logo');
        $userCompanyTutorialsSettings->startscreen_title = $request->get('startscreen_title');
        $userCompanyTutorialsSettings->startscreen_button_text = $request->get('startscreen_button_text');
        $userCompanyTutorialsSettings->main_page_background = $request->get('main_page_background');
        $userCompanyTutorialsSettings->chapter_complete = $request->get('chapter_complete');
        $userCompanyTutorialsSettings->save();

        return redirect()->route('module.tutorials.settings.edit')->with('success', __('messages.Settings_saved'));
    }

    final public function getTutorialChildren(array $tutorials, int $tutorialId):array {
        $resTutorials = [];

        foreach($tutorials as $tutorial){
            if($tutorial['parent_tutorial_id'] === $tutorialId){
                $resTutorial = [
                    'id' => $tutorial['id'],
                    'label' => $tutorial['name'],
                ];
                $resChildren = $this->getTutorialChildren($tutorials, $tutorial['id']);
                if($resChildren){
                    $resTutorial['children'] = $resChildren;
                }

                $resTutorials[] = $resTutorial;
            }
        }

        return $resTutorials;
    }

    final public function edit(int $tutorialId): View
    {
        $user = Auth::user();
        $userCompany = $user->company();
        $usercompanyusers = $userCompany->users()->with('companyroles')->get();
        $userCompanyTutorials = $user->company()->tutorials;
        $userCompanyTutorialsNested = [];
        foreach($userCompanyTutorials->toArray() as $tutorial){
            if($tutorial['parent_tutorial_id'] === 0){
                $resTutorial = [
                    'id' => $tutorial['id'],
                    'label' => $tutorial['name'],
                ];
                $resChildren = $this->getTutorialChildren($userCompanyTutorials->toArray(), $tutorial['id']);
                if($resChildren){
                    $resTutorial['children'] = $resChildren;
                }
                $userCompanyTutorialsNested[] = $resTutorial;
            }
        }
        $userCompanyTutorialsNestedJSON = json_encode($userCompanyTutorialsNested);
        $companyCategoriesJSON = $userCompany->companycategories->toJson();

        $tutorial = Tutorial::find($tutorialId)->load(['categories', 'assignees']);
        $paragraphComponents = $tutorial->paragraphs;
        $paragraphs = [];
        foreach($paragraphComponents as $component){
            $paragraph = [];
            $paragraph['paragraph_type'] = $component['paragraph_type'];
            $paragraph['data'] = $this->getParagraphDetails($component['paragraph_type'], $component['id']);
            $paragraphs[] = $paragraph;
        }

        //deleting general paragraphs info array to avoid confusion
        unset($tutorial->paragraphs);

        $tutorial->paragraphs = $paragraphs;

        return view('modules.tutorials.edit')->with(
            [
                'authUser' => $user,
                'userCompanyUsers' => $usercompanyusers,
                'companyTutorials' => $userCompanyTutorialsNestedJSON,
                'companyCategoriesJSON' => $companyCategoriesJSON,
                'tutorial' => $tutorial,
            ]);
    }


    final private function getParagraphDetails($componentType, $componentId) {
        switch ($componentType) {
            case 'NormalText':
                $component = NormalText::where('paragraph_id', $componentId)->first()->toArray();
                break;
            case 'TxtImg':
                $component = TextImage::where('paragraph_id', $componentId)->first()->toArray();
                break;
            default:
                $component = null;
                break;
        }

        return $component;
    }

    final public function index(): View {
        $user = Auth::user();
        $userCompany = $user->company();
        $userCompanyTutorials = $userCompany->tutorials;
        $userCompanyTutorialsNested = [];
        foreach($userCompanyTutorials->toArray() as $tutorial){
            if($tutorial['parent_tutorial_id'] === 0){
                $resTutorial = [
                    'id' => $tutorial['id'],
                    'label' => $tutorial['name'],
                    'count' => count($userCompanyTutorialsNested),


                ];

                $resChildren = $this->getTutorialChildren($userCompanyTutorials->toArray(), $tutorial['id']);
                if($resChildren){
                    $resTutorial['children'] = $resChildren;


                }
                $userCompanyTutorialsNested[] = $resTutorial;
            }
        }
        //dd($userCompanyTutorialsNested);
        $userCompanyTutorialsNestedJSON = json_encode($userCompanyTutorialsNested);
        $userCompanyTutorialsSettings = $userCompany->tutorialsSettings->toJSON();

        return view('modules.tutorials.view_tutorials')->with([
            'authUser' => $user,
            'tutorials' => $userCompanyTutorialsNestedJSON,
            'settings' => $userCompanyTutorialsSettings]);
    }

    final public function view($tutorial_id){
        $user = Auth::user();
        $userCompany = $user->company();
        $userCompanyTutorials = $userCompany->tutorials;
        $userCompanyTutorialsNested = [];
        foreach($userCompanyTutorials->toArray() as $tutorial){
            if($tutorial['parent_tutorial_id'] === 0){
                $resTutorial = [
                    'id' => $tutorial['id'],
                    'label' => $tutorial['name'],
                    'count' => count($userCompanyTutorialsNested),


                ];

                $resChildren = $this->getTutorialChildren($userCompanyTutorials->toArray(), $tutorial['id']);
                if($resChildren){
                    $resTutorial['children'] = $resChildren;


                }
                $userCompanyTutorialsNested[] = $resTutorial;
            }
        }
        //dd($userCompanyTutorialsNested);
        $userCompanyTutorialsNestedJSON = json_encode($userCompanyTutorialsNested);
        $userCompanyTutorialsSettings = $userCompany->tutorialsSettings->toJSON();
        $tutorial = Tutorial::find($tutorial_id)->load(['categories', 'assignees']);
        $paragraphComponents = $tutorial->paragraphs;
        $paragraphs = [];
        foreach($paragraphComponents as $component){
            $paragraph = [];
            $paragraph['paragraph_type'] = $component['paragraph_type'];
            $paragraph['data'] = $this->getParagraphDetails($component['paragraph_type'], $component['id']);
            $paragraphs[] = $paragraph;
        }

        //deleting general paragraphs info array to avoid confusion
        unset($tutorial->paragraphs);

        $tutorial->paragraphs = $paragraphs;
        //unset($tutorial->paragraphs);
        //dd($tutorial->toArray());

        return view('modules.tutorials.view_tutorials')->with([
            'authUser' => $user,
            'tutorials' => $userCompanyTutorialsNestedJSON,
            'settings' => $userCompanyTutorialsSettings,
            'tutorial' => $tutorial->toArray(),
        ]);
    }

}



