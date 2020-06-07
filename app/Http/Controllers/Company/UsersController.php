<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Siterole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //Company users list
    public function index() {
        $authUser = Auth::user();
        $authUserCompany = $authUser->company();
        $authUserCompanyUsers = $authUserCompany->users;

        return view('company.users-index')->with(['authUser' => $authUser, 'authUserCompanyUsers' => $authUserCompanyUsers]);
    }

    //Company add user form
    public function addUserForm() {
        return view('company.user-add')->with('authUser', Auth::user());
    }
}
