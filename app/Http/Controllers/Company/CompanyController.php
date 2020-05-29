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
    public function start() {
        return view('company.start')->with('authUser', Auth::user());
    }

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

        return redirect()->route('profile.index');
    }
}
