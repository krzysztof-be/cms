<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Repositories\ThemeRepository;

class ThemeController extends Controller {

	protected $repo;

	public function __construct(ThemeRepository $repo)
	{
		$this->repo = $repo;
	}

	public function themes() 
	{
		$themes =  $this->repo->all();

		return \View::make('admin.themes')->with('themes', $themes);
	}

	public function theme($slug) 
	{
		$theme =  $this->repo->get($slug);

		return \View::make('admin.theme')->with('theme', $theme);

	}

	public function customize($slug) 
	{
		$theme =  $this->repo->get($slug);

		$data = \Request::except('_token');

		$theme->colors = json_encode($data);
		$theme->save();

		$config_path = public_path('themes/' . $slug . '/css/config-template.css');

		try
		{
		    $contents = \File::get($config_path);

		    foreach($data as $field => $value) {

		    	$contents = str_replace('{$' . $field . '}', $value, $contents);

		    }

			$path = public_path('themes/' . $slug . '/css/config.css');

			$random_name = \Str::random(40);
			$random_file = public_path('themes/' . $slug . '/css/config/'.$random_name.'.css');

			\File::put($random_file, $contents);
			\File::put($path, "@import url('config/$random_name.css');");


		}
		catch (Illuminate\Filesystem\FileNotFoundException $e)
		{
		   
		}

		\Flash::success(tr('admin.theme_updated'));

		return \Redirect::back();

	}

	public function changeTheme() 
	{
		$field = 'theme';

		if(\App\Settings::value($field)) {

			$object = \App\Settings::where('key', $field)->first();

			if($object) {

				$object->value = \Request::get($field);
				$object->save();

			}

		} else {

			\App\Settings::create([

				'key' => $field,
				'value' => \Request::get($field)

			]);

		}

		\Flash::success(tr('admin.theme_changed'));

		return \Redirect::back();

	}

	public function edit() 
	{

	}

	public function install()
	{
		return \View::make('admin.upload');
	}

	public function postInstall()
	{

		if(!\Input::hasFile('theme'))
		{
			\Flash::error('Proszę wybrać plik z szablonem.');
			return \Redirect::back();
		}

		$zipper = new \Chumper\Zipper\Zipper;
		$file = $zipper->make(\Input::file('theme'));

		$info = $file->getFileContent('theme.ini');

		if($info === false)
		{
			\Flash::error('Archiwum nie zawiera szablonu.');
			return \Redirect::back();			
		}

		$ini = parse_ini_string($info, false , INI_SCANNER_RAW);


		if(isset($ini['slug']) && isset($ini['name']) && 
			isset($ini['colors']) && isset($ini['provides']))

		{

			$path = public_path('themes/' . $ini['slug']);

			if(\File::makeDirectory($path, 0775, true))
			{

				\App\Theme::create([

					'slug' => $ini['slug'],
					'name' => $ini['name'],
					'image' => 'image.png',
					'colors' => $ini['colors'],
					'provides' => $ini['provides']

				]);

				$file->extractTo($path, ['theme.ini']);

				\Flash::success('Pomyślnie zainstalowano szablon.');
				return \Redirect::to('admin/themes');

			}

		}

		\Flash::error('Archiwum nie zawiera szablonu.');
		return \Redirect::back();	

	}

}
