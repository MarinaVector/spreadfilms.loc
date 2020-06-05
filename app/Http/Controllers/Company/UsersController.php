<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //Company users list
    public function index() {
        return view('company.users-index')->with('authUser', Auth::user());
    }

    //Company add user form
    public function addUserForm() {
        return view('company.user-add')->with('authUser', Auth::user());
    }
}
