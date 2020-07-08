<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserInvitation;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PERSONALINFO;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  StoreUserRequest  $request
     * @return false|string
     */
    public function register(StoreUserRequest $request)
    {
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return redirect()->route('company.start')->with('success', __('messages.Successfully_registered'));
    }

    public function acceptInvitation($uuid) {
        $userInvitation = UserInvitation::where('invite-uuid', $uuid)->first();
        $userInvitationArr = $userInvitation->toArray();
        $userInvitationArr['email_verified_at'] = Carbon::now()->format('Y-m-d H:i:s');
        $userInvitationArr['password'] = Hash::make($userInvitationArr['password']);
        $rolesArr = explode(',', $userInvitationArr['roles']);
        unset($userInvitationArr['roles']);

        $user = User::create($userInvitationArr);

        $this->guard()->login($user);

        //assigning user roles
        foreach($rolesArr as $rolename) {
            $user->addCompanyRoleByName($rolename);
        }

        // deleting used invitation
        $userInvitation->delete();

        // creating company user private folder
        $companyUserPrivatePath = storage_path().'/userfiles/companies/' . $user->company()->id . '/private/' . $user->id;
        File::makeDirectory($companyUserPrivatePath, $mode = 0755, true, true);

        return redirect()->route('profile.personal-info')->with('success', __('messages.Successfully_registered'));
    }
}
