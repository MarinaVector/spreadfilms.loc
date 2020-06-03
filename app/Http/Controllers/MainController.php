<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index() {
        if(Auth::check()){
            return redirect('/profile/personal-info');
        } else {
            return redirect('login');
        }
    }
}
