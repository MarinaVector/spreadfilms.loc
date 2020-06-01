<?php
namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function personalInfo() {
        $user = Auth::user();
        $userCompany = $user->company()->first();

        return view('profile.personal-info')->with(['authUser' => $user, 'userCompany' => $userCompany]);
    }

    public function settings() {
        $user = Auth::user();
        $userCompany = $user->company()->first();

        return view('profile.settings')->with(['authUser' => $user, 'userCompany' => $userCompany]);
    }

    public function passwordChange() {
        $user = Auth::user();

        return view('profile.password-change')->with(['authUser' => $user]);
    }
}
