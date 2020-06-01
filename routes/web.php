<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index')->name('main');
Auth::routes(['verify' => true]);
Route::get('/logout', 'Auth\LoginController@logout');

// Auth routes
Route::group(['middleware' => 'auth'], function () {
    //Company Start
    Route::get('/company/start', 'Company\CompanyController@start')->name('company.start');
    Route::post('/company/start', 'Company\CompanyController@store')->name('company.store');

    ////Profile
    //Profile | personal-info
    Route::get('/profile/personal-info', 'Profile\ProfileController@personalInfo')->name('profile.personal-info');
    //Profile | settings
    Route::get('/profile/settings', 'Profile\ProfileController@settings')->name('profile.settings');

    //Profile | settings | change password
    Route::get('/profile/settings/password_change', 'Profile\ProfileController@passwordChangeForm')->name('profile.password-change');
    Route::post('/profile/settings/password_change', 'Profile\ProfileController@passwordChangeStore')->name('profile.password-change-store');

    //Site Config=================
    Route::namespace('Admin')->prefix('admin')->group(function () {
        //Main Admin Config Page
        Route::resource('site-config', 'SiteConfigController');
        //User Management
        Route::resource('user-management', 'UserManagementController', ['parameters' => [
            'user-management' => 'user',
        ]]);
    });
    //============================
});


