<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SiteConfigController extends Controller {
    public function index(){
        return view('site-config.index')->with('authUser', Auth::user());
    }
}
