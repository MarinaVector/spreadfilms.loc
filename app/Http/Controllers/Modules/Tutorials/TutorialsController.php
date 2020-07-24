<?php
namespace App\Http\Controllers\Modules\Tutorials;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorialsController extends Controller
{
    //Admin page where he can manage tutorials
    public function manageTutorials() {
        $user = Auth::user();

        return view('modules.tutorials.manage_tutorials')->with('authUser', Auth::user());
    }

    //
    public function addTutorial() {
        $user = Auth::user();
        $usercompanyusers = $user->company()->users()->with('companyroles')->get();

        return view('modules.tutorials.add')->with(['authUser' => Auth::user(), 'userCompanyUsers' => $usercompanyusers]);
    }

    public function statisticsTutorial() {
        $user = Auth::user();

        return view('modules.tutorials.statistics')->with('authUser', Auth::user());
    }

    public function storeTutorial(Request $request) {
        dd($request->all());
    }

    public function settingsTutorial() {
        $user = Auth::user();

        return view('modules.tutorials.settings_tutorials')->with('authUser', Auth::user());
    }
}



