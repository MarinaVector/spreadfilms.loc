<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class CompanyController extends Controller
{
    public function start() {
        return view('company.start')->with('authUser', Auth::user());
    }

    public function store() {
        //register company
        //become the company admin

        return redirect()->route('profile.index');
    }
}
