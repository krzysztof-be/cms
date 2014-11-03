<?php

Route::get('/', [
	'as' => 'home',
	'uses' => 'App\Http\Controllers\HomeController@index'
]);

Route::get('auth/login', [
	'uses' => 'App\Http\Controllers\HomeController@login'
]);

Route::post('auth/login', [
	'uses' => 'App\Http\Controllers\HomeController@postLogin'
]);

Route::get('auth/logout', [
	'uses' => 'App\Http\Controllers\HomeController@logout'
]);

Route::get('admin', [
	'before' => 'admin',
	'uses' => 'App\Http\Controllers\AdminController@index'
]);

Route::get('admin/settings', [
	'before' => 'admin',
	'uses' => 'App\Http\Controllers\SettingsController@index'
]);

Route::post('admin/settings', [
	'before' => 'admin',
	'uses' => 'App\Http\Controllers\SettingsController@update'
]);

Route::get('admin/{module}/settings', [
	'before' => 'admin',
	'uses' => 'App\Http\Controllers\SettingsController@module'
]);

Route::post('admin/{module}/settings', [
	'before' => 'admin',
	'uses' => 'App\Http\Controllers\SettingsController@moduleUpdate'
]);

Route::get('admin/themes', [
	'before' => 'admin',
	'uses' => 'App\Http\Controllers\ThemeController@themes'
]);

Route::get('admin/theme/{slug}', [
	'before' => 'admin',
	'uses' => 'App\Http\Controllers\ThemeController@theme'
]);

Route::post('admin/themes/change', [
	'before' => 'admin',
	'uses' => 'App\Http\Controllers\ThemeController@changeTheme'
]);

Route::post('admin/theme/{slug}/customize', [
	'before' => 'admin',
	'uses' => 'App\Http\Controllers\ThemeController@customize'
]);

Route::post('backup', [
	'before' => 'admin',
	'uses' => 'App\Http\Controllers\BackupController@download'
]);

Route::post('password', [
	'before' => 'admin',
	'uses' => 'App\Http\Controllers\Auth\PasswordController@change'
]);

\View::composer('admin.template', function($view)
{
	$repo = new \App\Http\Repositories\ModuleRepository;
	$modules = $repo->all();

	$notifications = \App\Notification::where('status', 'unread')->orderBy('created_at', 'desc')->get();

    $view->with('modules', $modules)->with('notifications', $notifications);
});