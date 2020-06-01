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

    //public function vueTest(){
     //   $user = Auth::user();
      //  $myVariable = "eXCom";

       // return view('profile.test-vue')->with(['authUser' => $user, 'myVariable' => $myVariable]);
   // }
}
