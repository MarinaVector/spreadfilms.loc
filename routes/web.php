<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index')->name('main');
Auth::routes(['verify' => true]);
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/accept-invitation/{uuid}', 'Auth\RegisterController@acceptInvitation');

// Auth routes
Route::group(['middleware' => 'auth'], function () {
    //Company Start
    Route::get('/company/start', 'Company\CompanyController@start')->name('company.start');
    Route::post('/company/start', 'Company\CompanyController@createCompany')->name('company.create');

    //Company
    Route::group(['middleware' => ['inCompany']], function () {
        Route::get('/company/general-info', 'Company\CompanyController@generalInfo')->name('company.general-info');
        Route::get('/company/settings', 'Company\CompanyController@settings')->name('company.settings');

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
        Route::post('/admin/users/add', 'Company\UsersController@inviteUser')->name('company-users.invite');
        Route::get('/admin/roles_permissions', 'Company\CompanyController@rolesPermissionsPage')->name('company.roles-permissions-page');
        Route::get('/admin/roles_permissions/add', 'Company\CompanyController@addRoleForm')->name('company.role.add');
        Route::post('/admin/roles_permissions/add', 'Company\CompanyController@storeRole')->name('company.role.store');
        Route::get('/admin/roles_permissions/edit/{role_id}', 'Company\CompanyController@editRole')->name('company.role.edit');
        Route::post('/admin/roles_permissions/update/{role_id}', 'Company\CompanyController@updateRole')->name('company.role.update');
        Route::get('/admin/company/user/edit/{user_id}', 'Company\UsersController@editUser')->name('admin-company-user.edit');
        Route::post('/admin/company/user/edit/{user_id}', 'Company\UsersController@updateUser')->name('admin-company-user.update');
        Route::post('/admin/user/delete', 'Company\UsersController@deleteUserFromCompany')->name('company-user.delete');

        //Tutorials module
        Route::get('/module/tutorials', 'Modules\Tutorials\TutorialsController@index')->name('module.tutorials.index');
        Route::get('/module/tutorials/admin', 'Modules\Tutorials\TutorialsController@manageTutorials')->name('module.tutorials.admin');
        Route::get('/module/tutorials/admin/add', 'Modules\Tutorials\TutorialsController@addTutorial')->name('module.tutorials.add');
        Route::post('/module/tutorials/admin/add', 'Modules\Tutorials\TutorialsController@storeTutorial')->name('module.tutorials.store');
        Route::get('/module/tutorials/statistics', 'Modules\Tutorials\TutorialsController@statisticsTutorial')->name('module.tutorials.statistics');
        Route::resource('/modules/tutorials/editor', 'Modules\Tutorials\CKEditorController');
        Route::post('/module/tutorials/editor/image_upload', 'Modules\Tutorials\CKEditorController@upload')->name('module.tutorials.editor.upload');

        Route::any('/elfinder-popup/{input_id}', '\Barryvdh\Elfinder\ElfinderController@showPopup')->name('elfinder.popup');
    });

    //Site Config=================
    Route::namespace('Admin')->prefix('admin')->group(function () {
        //Main Admin Config Page
        Route::resource('site-config', 'SiteConfigController');
        //User Management
        Route::resource('user-management', 'UserManagementController', ['parameters' => [
            'user-management' => 'user',
        ]]);
    });

      });


