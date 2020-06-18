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

        return view('modules.tutorials.add')->with('authUser', Auth::user());
    }
}