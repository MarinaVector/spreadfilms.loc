<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    //A form where user can see a form to create new company or see the company invitations
    public function start() {
        return view('company.start')->with('authUser', Auth::user());
    }

    //Creating a new company
    public function store(Request $request) {
        //register company
        $company = Company::create([
            'name' => $request->get('name')
        ]);

        $user = User::find(Auth::id());

        //become the company owner
        $user->company_id = $company->id;
        $user->role_id = Roles::where('name', 'owner')->first()->id;
        $user->save();

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

}
