<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyRole;
use App\Models\Pivots\CompanyRole as CompanyRolePivot;
use App\Models\DefaultCompanyRole;
use App\Models\Pivots\UserRole;
use App\Models\Role;
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
        // вот тут, в этом методе createCompany создается компания, ниже в комментариях я написал какие действия нужны,
        // но это по моей старой логике

        // создать саму компанию, это очень легко, и оно прекрасно работает, еще бы блин не работало, это основы ларавел))
        // потом я раньше пытался сделать связь между юзером и компанией, очень сложную и изощренную, но теперь это будет
        // сделать легко

        $user = Auth::user();

        // 1. register company
        $company = Company::create([
            'name' => $request->get('name')
        ]);

        // 2. assigning this user to a company
        $user->company_id = $company->id;
        $user->save();

        // 3. user got his website role(in this case he became company admin)
        UserRole::create(['user_id' => $user->id, 'role_id' => Role::where('name', 'admin')->first()->id]);

        // 4. now company must get default roles
        $defaultCompanyRoles = DefaultCompanyRole::all();
        //dd($defaultCompanyRoles);
        foreach ($defaultCompanyRoles as $defaultCompanyRole){
            $companyRole = CompanyRole::create(['name' => $defaultCompanyRole->name, 'description' => $defaultCompanyRole->description]);
            CompanyRolePivot::create(['company_id' => $company->id, 'role_id' => $companyRole->id]);
            // 1. create company role same as $defaultCompanyRole
            // 2. assign that role as a company role
        }

        dd('company created');

        // 5. create default permissions to roles

        /*
        $user = User::find(Auth::id());

        //become the company owner
        $user->company_id = $company->id;
        $user->role_id = Roles::where('name', 'owner')->first()->id;
        $user->save();*/

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
