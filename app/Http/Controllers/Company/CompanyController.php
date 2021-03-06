<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Companycategory;
use App\Models\Companyrole;
use App\Models\CompanyrolePermission;
use App\Models\CompanyTutorialsSettings;
use App\Models\DefaultCompanycategory;
use App\Models\Pivots\CompanyCompanyrole as CompanyCompanyrolePivot;
use App\Models\Pivots\CompanyCompanycategory as CompanyCompanycategoryPivot;
use App\Models\Pivots\CompanyrolePermission as CompanyrolePermissionPivot;
use App\Models\DefaultCompanyrole;
use App\Models\Pivots\UserCompanyrole;
use App\Models\Pivots\UserSiterole;
use App\Models\Siterole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

        // 5. user must get one of companyroles
        UserCompanyrole::create(['user_id' => $user->id, 'role_id' => $companyAdminRole->id]);

        // 6. grant companyrole 'admin' with all company permissions
        $allCompanyPermissions = CompanyrolePermission::all();
        foreach ($allCompanyPermissions as $permission) {
            CompanyrolePermissionPivot::create(['role_id' => $companyAdminRole->id, 'permission_id' => $permission->id]);
        }

        // 7. Create company public and user private folders
        $companyPublicPath = storage_path().'/userfiles/companies/' . $company->id . '/public';
        $companyUserPrivatePath = storage_path().'/userfiles/companies/' . $company->id . '/private/' . $user->id;
        File::makeDirectory($companyPublicPath, $mode = 0755, true, true);
        File::makeDirectory($companyUserPrivatePath, $mode = 0755, true, true);

        // 8. Create company default categories
        $defaultCompanyCategories = DefaultCompanycategory::all();
        foreach ($defaultCompanyCategories as $defaultCompanyCategory){
            $companyCategory = Companycategory::create(['name' => $defaultCompanyCategory->name, 'description' => $defaultCompanyCategory->description]);

            // tie this companycategory to a company
            CompanyCompanycategoryPivot::create(['company_id' => $company->id, 'category_id' => $companyCategory->id]);
        }

        // 9. Create user company tutorials module settings
        CompanyTutorialsSettings::create([
            'company_id' => $company->id,
            'email_notifications_to' => $user->email
        ]);

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
        $authUser = Auth::user();
        $authUserCompanyroles = $authUser->company()->companyroles->sortBy('name');

        $allCompanyPermissions = CompanyrolePermission::all();

        return view('company.roles-permissions-page')->with([
            'authUser' => $authUser,
            'authUserCompanyroles' => $authUserCompanyroles,
            'allCompanyPermissions' => $allCompanyPermissions]);
    }

    //Company add role form
    public function addRoleForm() {
        return view('company.role-add')->with('authUser', Auth::user());
    }

    public function storeRole(Request $request) {
        $authUser = Auth::user();
        $authUserCompany = $authUser->company();

        $authUserCompany->addRoleByName($request->get('name'));

        return redirect()->route('company.roles-permissions-page')->with('success', __('messages.Role_created'));
    }

    public function editRole($role_id) {
        $companyRole = Companyrole::find($role_id);
        $allCompanyPermissions = CompanyrolePermission::all();

        return view('company.role-edit')->with([
            'authUser' => Auth::user(),
            'role' => $companyRole,
            'allCompanyPermissions' => $allCompanyPermissions]);
    }

    public function updateRole(Request $request, $role_id) {
        $companyRole = Companyrole::find($role_id);

        $companyRole->name = $request->get('name');
        $companyRole->save();

        $companyRole->setOnlyThesePermissionsByPermissionId($role_id, $request->get('permissions'));

        return redirect()->route('company.roles-permissions-page')->with('success', __('messages.Role_edited'));
    }
}
