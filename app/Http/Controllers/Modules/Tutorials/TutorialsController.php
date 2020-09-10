<?php
namespace App\Http\Controllers\Modules\Tutorials;

use App\Http\Controllers\Controller;
use App\Models\Companycategory;
use App\Models\Paragraph;
use App\Models\Paragraphs\NormalText;
use App\Models\Paragraphs\TextImage;
use App\Models\Paragraphs\Video;
use App\Models\Pivots\TutorialAssignee as TutorialAssigneePivot;
use App\Models\Pivots\TutorialCompanycategory as TutorialCompanycategoryPivot;
use App\Models\TutorialUserCompletion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tutorial;
use Illuminate\View\View;
use App\Models\CompanyTutorialsSettings;

class TutorialsController extends Controller
{
    //Admin page where he can manage tutorials
    final public function manageTutorials(): View {
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
        $authUser = Auth::user();
        $userCompany = $authUser->company();
        $userCompanyUsers = $userCompany->users()->get(['id', 'firstname'])->toArray();
        $userCompanyTutorials = $authUser->company()->tutorials;

        foreach($userCompanyUsers as $userKey=>$user){
            $tutorialsClone = clone $userCompanyTutorials;
            $userCompanyUsers[$userKey]['tutorials'] = $tutorialsClone->toArray();

            foreach($userCompanyUsers[$userKey]['tutorials'] as $tutorialKey=>$tutorial){
                $progressObj = TutorialUserCompletion::where([
                    'user_id' => $user['id'],
                    'tutorial_id' => $tutorial['id'],
                ])->get('completion')->first();

                if(isset($progressObj->completion)){
                    $userCompanyUsers[$userKey]['tutorials'][$tutorialKey]['progress'] = $progressObj->completion;
                    switch ($progressObj->completion) {
                        case 'completed':
                            $progressIconClass = "fa-times";
                            $progressColorClass = "si-dark";
                            break;
                        default:
                            break;
                    }
                    $userCompanyUsers[$userKey]['tutorials'][$tutorialKey]['progressIconClass'] = $progressIconClass;
                    $userCompanyUsers[$userKey]['tutorials'][$tutorialKey]['progressColorClass'] = $progressColorClass;
                } else {
                    $userCompanyUsers[$userKey]['tutorials'][$tutorialKey]['progress'] = null;
                    $userCompanyUsers[$userKey]['tutorials'][$tutorialKey]['progressIconClass'] = 'fa-times';
                    $userCompanyUsers[$userKey]['tutorials'][$tutorialKey]['progressColorClass'] = 'si-times';
                }
            }
        }

        return view('modules.tutorials.statistics')->with([
            'authUser' => Auth::user(),
            'companyTutorials' => $userCompanyTutorials->toJson(),
            'companyUsers' => json_encode($userCompanyUsers),
        ]);
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

        return json_encode(['status' => 'ok', 'oldIndex' => $oldIndex, 'newIndex' => $newIndex]);
    }

    final public function storeParagraphData(array $paragraph, int $paragraphId): bool {
        switch ($paragraph['ComponentType']) {
            //Text Layouts
            case 'Headline':
                break;
            case 'NormalText':
                NormalText::create([
                    'paragraph_id' => $paragraphId,
                    'header' => $paragraph['header'],
                    'text' => $paragraph['text']
                ]);
                break;
            case 'CenterText':
                break;
            case 'TextWithBigFont':
                break;
            case 'TextWithLogo':
                break;
            case 'TextImg':
                TextImage::create([
                    'paragraph_id' => $paragraphId,
                    'header' => $paragraph['header'],
                    'text' => $paragraph['text'],
                    'src' => $paragraph['src']
                ]);
                break;
            case 'TxtSpecialImg':
                break;
            case 'TextWithHighImage':
                break;
            //Text Layouts

            //Video Layouts
            case 'Video':
                Video::create([
                    'paragraph_id' => $paragraphId,
                    'banner' => $paragraph['banner'],
                    'videoUrl' => $paragraph['videoUrl'],
                    'dimension' => $paragraph['dimension'],
                    'notices' => $paragraph['notices'],
                ]);
                break;
            case 'bgVideo':
                break;
            case 'VideoWithText':
                break;
            case 'VideoSlider':
                break;
            //Video Layouts

            //Image Layouts
            case 'Image':
                break;
            case 'ImageSlider':
                break;
            case 'ImageSwitch':
                break;
            case 'Icons':
                break;
            //Image Layouts

            //Other Layouts
            case 'SeparatorLine':
                break;
            case 'ContactPerson':
                break;
            case 'MultipleChoice':
                break;
            case 'FAQs':
                break;
            case 'Quote':
                break;
            case 'Header':
                break;
            case 'Footer':
                break;
            //Other Layouts
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
            //Text Layouts
            case 'Headline':
                break;
            case 'NormalText':
                $component = NormalText::where('paragraph_id', $componentId)->first()->toArray();
                break;
            case 'CenterText':
                break;
            case 'TextWithBigFont':
                break;
            case 'TextWithLogo':
                break;
            case 'TextImg':
                $component = TextImage::where('paragraph_id', $componentId)->first()->toArray();
                break;
            case 'TxtSpecialImg':
                break;
            case 'TextWithHighImage':
                break;
            //Text Layouts

            //Video Layouts
            case 'Video':
                $component = Video::where('paragraph_id', $componentId)->first()->toArray();
                break;
            case 'bgVideo':
                break;
            case 'VideoWithText':
                break;
            case 'VideoSlider':
                break;
            //Video Layouts

            //Image Layouts
            case 'Image':
                break;
            case 'ImageSlider':
                break;
            case 'ImageSwitch':
                break;
            case 'Icons':
                break;
            //Image Layouts

            //Other Layouts
            case 'SeparatorLine':
                break;
            case 'ContactPerson':
                break;
            case 'MultipleChoice':
                break;
            case 'FAQs':
                break;
            case 'Quote':
                break;
            case 'Header':
                break;
            case 'Footer':
                break;
            //Other Layouts
            default:
                $component = null;
                break;
        }

        if($component){
            if(isset($component['header'])){
                $component['header'] = htmlspecialchars($component['header'], ENT_QUOTES);
            }

            if(isset($component['text'])){
                $component['text'] = htmlspecialchars($component['text'], ENT_QUOTES);
            }

            if(isset($component['notices'])){
                $component['notices'] = htmlspecialchars($component['notices'], ENT_QUOTES);
            }
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

        $userCompanyTutorialsAmount = $userCompanyTutorials->count();
        $userCompanyTutorialsCompletedAmount = 0;
        foreach($userCompanyTutorials as $tutorial){
            if($tutorial->isCompleted()){
                $userCompanyTutorialsCompletedAmount++;
            }
        }
        $userTutorialsProgress = round(($userCompanyTutorialsCompletedAmount / $userCompanyTutorialsAmount) * 100);

        $userCompanyTutorialsNestedJSON = json_encode($userCompanyTutorialsNested);
        $userCompanyTutorialsSettings = $userCompany->tutorialsSettings;

        return view('modules.tutorials.view_tutorials')->with([
            'authUser' => $user,
            'tutorials' => $userCompanyTutorialsNestedJSON,
            'settings' => $userCompanyTutorialsSettings,
            'tutorial' => '',
            'userTutorialsProgress' => $userTutorialsProgress,
            ]);
    }

    final public function view($tutorial_id){
        $user = Auth::user();
        $userCompany = $user->company();
        $userCompanyTutorials = $userCompany->tutorials;
        $userCompanyTutorialsNested = [];
        foreach($userCompanyTutorials->toArray() as $tTutorial){
            if($tTutorial['parent_tutorial_id'] === 0){
                $resTutorial = [
                    'id' => $tTutorial['id'],
                    'label' => $tTutorial['name'],
                    'count' => count($userCompanyTutorialsNested),
                ];

                $resChildren = $this->getTutorialChildren($userCompanyTutorials->toArray(), $tTutorial['id']);
                if($resChildren){
                    $resTutorial['children'] = $resChildren;


                }
                $userCompanyTutorialsNested[] = $resTutorial;
            }
        }

        $userCompanyTutorialsNestedJSON = json_encode($userCompanyTutorialsNested);
        $userCompanyTutorialsSettings = $userCompany->tutorialsSettings;
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
        $breadcrumb = $tutorial->getTutorialBreadcrumb();

        $userCompanyTutorialsAmount = $userCompanyTutorials->count();
        $userCompanyTutorialsCompletedAmount = 0;
        foreach($userCompanyTutorials as $companyTutorial){
            if($companyTutorial->isCompleted()){
                $userCompanyTutorialsCompletedAmount++;
            }
        }
        $userTutorialsProgress = round(($userCompanyTutorialsCompletedAmount / $userCompanyTutorialsAmount) * 100);

        return view('modules.tutorials.view_tutorials')->with([
            'authUser' => $user,
            'tutorials' => $userCompanyTutorialsNestedJSON,
            'settings' => $userCompanyTutorialsSettings,
            'tutorial' => $tutorial->toArray(),
            'breadcrumb' => $breadcrumb,
            'userTutorialsProgress' => $userTutorialsProgress,
        ]);
    }

    final public function completeTutorial(Request $request):String{
        $user = Auth::user();
        $params = $request->get('params');
        $tutorialId = $params['tutorialId'];
        $tutorial = Tutorial::find($tutorialId);
        $status = $tutorial->userCompletedTutorial($tutorialId, $user->id);

        $nextTutorialId = $tutorial->getNextCompanyTutorialId($tutorialId);

        return json_encode([
            'status' => $status,
            'nextTutorialId' => $nextTutorialId,
            'userName' => $user->firstname,
            'tutorialId' => $tutorialId,
            'userId' => $user->id,
        ]);
    }
}



