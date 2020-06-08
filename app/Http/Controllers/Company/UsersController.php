<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInvitationRequest;
use App\Mail\UserInvitationMail;
use App\Models\Company;
use App\Models\Siterole;
use App\Models\UserInvitation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        $authUser = Auth::user();
        $authUserCompany = $authUser->company();
        $authUserCompanyRoles = $authUserCompany->companyroles;

        return view('company.user-add')->with(['authUser' => $authUser, 'authUserCompanyRoles' => $authUserCompanyRoles]);
    }

    // Company invites a new user to the company
    public function inviteUser(CreateInvitationRequest $request) {
        $requestData = $request->except('_token');
        $requestData['password'] = $requestData['password'] ? $requestData['password'] : Str::random(10);
        $requestData['company_id'] = Auth::user()->company_id;
        $requestData['invite-uuid'] = Str::uuid();
        $requestData['roles'] = implode(",", $requestData['roles']);

        $userInvitation = UserInvitation::create($requestData);
        $userInvitation->company_name = Auth::user()->company()->name;

        // 1. Send invitation email
        Mail::to($requestData['email'])->send(new UserInvitationMail($userInvitation));

        return redirect()->route('company-users.index')->with('success', __('messages.User_invitation_sent'));
    }

    public function deleteUserFromCompany(Request $request) {
        // 1. remove all user company roles
        $user = User::find($request->get('userId'));
        foreach ($user->companyroles as $role) {
            $user->removeCompanyRoleByName($role->name);
        }

        // 2. set users company_id to null
        $user->company_id = null;
        $user->save();

        return redirect()->route('company-users.index')->with('success', __('messages.User_removed_from_the_company'));
    }
}
