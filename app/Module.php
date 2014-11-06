<?php namespace App;

abstract class Module {

	protected static $instances = [];
	public $settings = [];
	protected $enabled = 'disabled';

	protected function __construct() { }

	/**
	*	Returns module singleton instance
	*	@return Module
	*/

	public static function getInstance($name) 
	{
		if(isset(self::$instances[$name])) {

			return self::$instances[$name];

		}

		self::$instances[$name] = new $name;

		$module = (explode('\\', $name));

		$settings = \DB::table('kkstudio_modules')->where('slug', \Str::lower($module[3]))->first();
		
		self::$instances[$name]->settings = ($settings) ? json_decode($settings->settings, true) : [];
		self::$instances[$name]->enabled = ($settings) ? $settings->status : 'disabled';
		
		return self::$instances[$name];
	}

	public function setting($key, $default = '') {

		if(isset($this->settings[$key])) {

			return $this->settings[$key];

		}

		return $default;

	}

	public function notify($id, $message, $url, $icon)
	{

		Notification::create([

			'context' => $id,
			'message' => $message,
			'url' => $url,
			'icon' => $icon,
			'status' => 'unread'

		]);

	}

	public function denotify($id)
	{

		Notification::where('context', $id)->delete();

	}

	public static function turnoff($slug)
	{
		\DB::table('kkstudio_modules')->where('slug', $slug)->update([ 'status' => 'disabled']);
		
	}

	public static function turnon($slug)
	{
		\DB::table('kkstudio_modules')->where('slug', $slug)->update([ 'status' => 'enabled']);
		
	}

	public function enabled() 
	{
		return ($this->enabled == 'enabled');
	}

}