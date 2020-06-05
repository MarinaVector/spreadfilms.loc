<?php
namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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

    public function passwordChangeForm() {
        $user = Auth::user();

        return view('profile.password-change')->with(['authUser' => $user]);
    }

    public function personalInfoEdit(){
        $user = Auth::user();

        return view('profile.personal-info-change')->with(['authUser' => $user]);
    }

    public function personalInfoUpdate(Request $request){
        $user = Auth::user();
        $user->update($request->except(['email']));

        return redirect()->route('profile.personal-info')->with('success', __('messages.Information_saved_successfully'));
    }

    public function passwordChangeStore(ChangePasswordRequest $request){
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        return redirect(url()->previous())->with('success', __('messages.Password_changed'));
    }




}
