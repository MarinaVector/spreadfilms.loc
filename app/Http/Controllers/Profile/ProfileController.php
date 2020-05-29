<?php
namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        $userCompany = $user->company()->first();

        return view('profile.main')->with(['authUser' => $user, 'userCompany' => $userCompany]);
    }
}
