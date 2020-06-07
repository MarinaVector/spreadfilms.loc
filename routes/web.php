<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index')->name('main');
Auth::routes(['verify' => true]);
Route::get('/logout', 'Auth\LoginController@logout');

// Auth routes
Route::group(['middleware' => 'auth'], function () {
    //Company Start
    Route::get('/company/start', 'Company\CompanyController@start')->name('company.start');
    Route::post('/company/start', 'Company\CompanyController@createCompany')->name('company.create');

    //Company
    Route::group(['middleware' => ['inCompany']], function () {
        Route::get('/company/general-info', 'Company\CompanyController@generalInfo')->name('company.general-info');
        Route::get('/company/settings', 'Company\CompanyController@settings')->name('company.settings');
    });

    ////Profile
    //Profile | personal-info
    Route::get('/profile/personal-info', 'Profile\ProfileController@personalInfo')->name('profile.personal-info');
    Route::get('/profile/personal-info/edit', 'Profile\ProfileController@personalInfoEdit')->name('profile.personal-info.edit');
    Route::post('/profile/personal-info/edit', 'Profile\ProfileController@personalInfoUpdate')->name('profile.personal-info.update');
    //Profile | settings
    Route::get('/profile/settings', 'Profile\ProfileController@settings')->name('profile.settings');

    //Profile | settings | change password
    Route::get('/profile/settings/password_change', 'Profile\ProfileController@passwordChangeForm')->name('profile.password-change');
    Route::post('/profile/settings/password_change', 'Profile\ProfileController@passwordChangeStore')->name('profile.password-change-store');

    //Company Admin
    Route::get('/admin/users', 'Company\UsersController@index')->name('company-users.index');
    Route::get('/admin/users/add', 'Company\UsersController@addUserForm')->name('company-users.add');
    Route::get('/admin/roles_permissions', 'Company\CompanyController@rolesPermissionsPage')->name('company.roles-permissions-page');
    Route::get('/admin/roles_permissions/add', 'Company\CompanyController@addRoleForm')->name('company.role.add');
    Route::post('/admin/user/destroy', 'Company\UserManagmentController@destroy')->name('company-user.destroy');


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


