<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Companyrole;
use App\Models\CompanyrolePermission;
use App\Models\Pivots\CompanyCompanyrole as CompanyCompanyrolePivot;
use App\Models\Pivots\CompanyrolePermission as CompanyrolePermissionPivot;
use App\Models\DefaultCompanyrole;
use App\Models\Pivots\UserCompanyrole;
use App\Models\Pivots\UserSiterole;
use App\Models\Siterole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    //A form where user can see a form to create new company or see the company invitations
    public function start() {
        $user = Auth::user();

        //dd('end');
        //dd($user->company());
        return view('company.start')->with('authUser', Auth::user());
    }

    //Creating a new company
    public function createCompany(Request $request) {
        $user = Auth::user();

        // 1. register company
        $company = Company::create([
            'name' => $request->get('name')
        ]);

        // 2. assigning this user to a company
        $user->company_id = $company->id;
        $user->save();

        // 3. user got his website role(in this case he became admin)
        // (it is commented now because company owner dont need siterole anymore)
        //UserSiterole::create(['user_id' => $user->id, 'role_id' => Siterole::where('name', 'admin')->first()->id]);

        // 4. now company must get default roles
        $defaultCompanyRoles = DefaultCompanyrole::all();
        //dd($defaultCompanyRoles);
        foreach ($defaultCompanyRoles as $defaultCompanyRole){
            // copy a default role into companyroles
            $companyRole = Companyrole::create(['name' => $defaultCompanyRole->name, 'description' => $defaultCompanyRole->description]);
            // remember company admin role
            if ($companyRole->name === 'admin') {
                $companyAdminRole = $companyRole;
            }

            // tie this companyrole to a company
            CompanyCompanyrolePivot::create(['company_id' => $company->id, 'role_id' => $companyRole->id]);
        }

        // 6. user must get one of companyroles
        UserCompanyrole::create(['user_id' => $user->id, 'role_id' => $companyAdminRole->id]);

        // 7. grant companyrole 'admin' with all company permissions
        $allCompanyPermissions = CompanyrolePermission::all();
        foreach ($allCompanyPermissions as $permission) {
            CompanyrolePermissionPivot::create(['role_id' => $companyAdminRole->id, 'permission_id' => $permission->id]);
        }

        return redirect()->route('profile.personal-info');
    }

    //Company general info page(company profile)
    public function generalInfo() {
        return view('company.general-info')->with('authUser', Auth::user());
    }

    //Company settings(only for company owner)
    public function settings(){
        return view('company.settings')->with('authUser', Auth::user());
    }

    //Company roles & permissions management
    public function rolesPermissionsPage() {
        return view('company.roles-permissions-page')->with('authUser', Auth::user());
    }

    //Company add role form
    public function addRoleForm() {
        return view('company.role-add')->with('authUser', Auth::user());
    }

}
