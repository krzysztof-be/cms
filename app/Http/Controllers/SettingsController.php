<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Settings;

class SettingsController extends Controller {

	public function index() {

		return \View::make('admin.settings');

	}

	public function update() {

		$fields = \Request::except('_token');

		foreach($fields as $field => $value) {

			if(Settings::value($field)) {

				$object = Settings::where('key', $field)->first();

				if($object) {

					$object->value = \Request::get($field);
					$object->save();

				}

			} else {

				Settings::create([

					'key' => $field,
					'value' => \Request::get($field)

				]);

			}

		}

		\Flash::success(tr('admin.changes_has_been_saved'));

		return \Redirect::back();

	}

	public function module($name) {

		return \View::make('admin.module')->with('module', ucfirst($name));

	}

	public function moduleUpdate($name) {

		$fields = \Input::except('_token');
		$module = ucfirst($name);

		$settings = m($module)->settings;

		foreach($fields as $key => $value) {

			$settings[$key] = $value;

		}

		\DB::table('kkstudio_modules')->where('name', $module)->update(['settings' => json_encode($settings)]);

		\Flash::success(tr('admin.changes_has_been_saved'));

		return \Redirect::back();

	}

	public function change() {

		$old_password = \Request::get('old_password');
		$password = \Request::get('password');
		$password_confirmation = \Request::get('password_confirmation');

		
		if(!\Hash::check($old_password, \Auth::user()->password)) {
			\Flash::error('Obecne hasło jest niepoprawne.');
			return \Redirect::back();
		}

		if(strlen($password) < 6 || strlen($password_confirmation) < 6) {
			\Flash::error('Hasło musi mieć co najmniej 6 znaków.');
			return \Redirect::back();			
		}

		if($password != $password_confirmation) {
			\Flash::error('Nowe hasła nie pasują do siebie.');
			return \Redirect::back();
		}

		\Auth::user()->password = \Hash::make($password);
		\Auth::user()->save();

			\Flash::success('Hasło zostało zmienione.');
			return \Redirect::back();

	}

	public function turnoff($slug)
	{
		\App\Module::turnoff($slug);

		\Flash::success('Moduł wyłączony.');
		return \Redirect::to('admin');
	}

	public function turnon($slug)
	{
		\App\Module::turnon($slug);

		\Flash::success('Moduł włączony.');
		return \Redirect::to('admin');
	}

}
