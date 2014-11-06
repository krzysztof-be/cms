<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Artisan;

class InstallController extends Controller {

	public function __construct()
	{
		$installed = base_path(APP_NAME . '/installed');

		if(\File::exists($installed)) return \App::abort(404);
	}

	public function install()
	{
		return \View::make('admin.install');
	}

	public function postInstall()
	{

		$email = \Request::get('email');
		$password = \Request::get('password');
		$password_confirmation = \Request::get('password_confirmation');

		$rules = [ 'email' => 'required|email', 'password' => 'required|confirmed' ];

		$validator = \Validator::make([ 'email' => $email, 'password' => $password, 'password_confirmation' => $password_confirmation ], $rules);

		if($validator->fails())
		{
			return \Redirect::back()->withErrors($validator)->withInput();
		}

		try {
		     
			Artisan::call('migrate:install', [
				'--env' => APP_NAME
			]);

			Artisan::call('migrate', [
				'--env' => APP_NAME,
			'--path'     => "app/database/migrations"
			]);      

			Artisan::call('migrate', [
			'--env' => APP_NAME,
			'--package'=>'kkstudio/blog'
			]);

			Artisan::call('migrate', [
				'--env' => APP_NAME,
				'--package'=>'kkstudio/gallery'
			]);

			Artisan::call('migrate', [
				'--env' => APP_NAME,
				'--package'=>'kkstudio/info'
			]);

			Artisan::call('migrate', [
				'--env' => APP_NAME,
				'--package'=>'kkstudio/contact'
			]);


			Artisan::call('migrate', [
				'--env' => APP_NAME,
				'--package'=>'kkstudio/menu'
			]);


			Artisan::call('migrate', [
				'--env' => APP_NAME,
				'--package'=>'kkstudio/portfolio'
			]);

			Artisan::call('migrate', [
				'--env' => APP_NAME,
				'--package'=>'kkstudio/page'
			]);

			Artisan::call('db:seed', [
				'--env' => APP_NAME
			]);

			\App\User::create([

				'email' => $email,
				'password' => \Hash::make($password),
				'level' => 1337

			]);

		} catch(\Exception $e) {

			\Flash::error('Wystąpił błąd podczas instalacji. Skontaktuj się z administratorem.');

			return \Redirect::back();

		}

		$installed = base_path(APP_NAME . '/installed');

		\File::put($installed, \Carbon\Carbon::now());

		\Flash::success('Instalacja przebiegła pomyślnie. Możesz się teraz zalogować do panelu administratora.');

		return \Redirect::to('auth/login');

	}

}
