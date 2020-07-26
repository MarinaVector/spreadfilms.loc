<?php
namespace App\Http\Controllers\Modules\Tutorials;

use App\Http\Controllers\Controller;
use App\Models\Paragraph;
use App\Models\Paragraphs\NormalText;
use App\Models\Paragraphs\TextImage;
use App\Models\Pivots\TutorialAssignee as TutorialAssigneePivot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tutorial;
use Illuminate\View\View;

class TutorialsController extends Controller
{
    //Admin page where he can manage tutorials
    final public function manageTutorials(): View {
        $user = Auth::user();
        $userCompanyTutorials = $user->company()->tutorials;

        return view('modules.tutorials.manage_tutorials')->with(['authUser' => $user, 'companyTutorials' => $userCompanyTutorials]);
    }

    final public function addTutorial(): View {
        $user = Auth::user();
        $usercompanyusers = $user->company()->users()->with('companyroles')->get();

        return view('modules.tutorials.add')->with(['authUser' => Auth::user(), 'userCompanyUsers' => $usercompanyusers]);
    }

    final public function statisticsTutorial(): View {

        return view('modules.tutorials.statistics')->with('authUser', Auth::user());
    }

    final public function storeTutorial(Request $request): RedirectResponse {
        //dd($request->all());
        $user = Auth::user();

        // 1. store tutorial
        $tutorial = Tutorial::create([
            'name' => $request->get('tutorial_name'),
            'tutorial_background' => $request->get('tutorial_background'),
            'parent_tutorial_id' => $request->get('parent_tutorial_id'),
            'category_id' => $request->get('category_id'),
            'company_id' => $user->company()->id,
        ]);

        // 2. store all tutorial paragraph blocks
        $paragraphsArr = json_decode($request->get('paragraphsJSON'), true);
        foreach($paragraphsArr as $paragraph){
            $paragraphId = Paragraph::create(['tutorial_id' => $tutorial->id, 'paragraph_type' => $paragraph['ComponentType']])->id;
            $this->storeParagraphData($paragraph, $paragraphId);
        }

        // 3. store tutorial assignees(who have permission to view it)
        $tutorialAssignees = array_keys($request->get('assignee'));
        foreach ($tutorialAssignees as $tutorialAssignee) {
            TutorialAssigneePivot::create(['tutorial_id' => $tutorial->id, 'assignee_id' => $tutorialAssignee]);
        }

        // 4. redirect to tutorials manage page
        return redirect()->route('module.tutorials.admin')->with('success', __('messages.Tutorial_created'));
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

    public function settingsTutorial() {
        $user = Auth::user();

        return view('modules.tutorials.settings_tutorials')->with('authUser', Auth::user());
    }
}



