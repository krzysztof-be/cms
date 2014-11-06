<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Artisan;

class InstallController extends Controller {

	public function install()
	{
	     
	      Artisan::call('migrate:install', [
	      		'--env' => APP_NAME,

	      	]);
	      echo 'done migrate:install<br>';
	     
	      Artisan::call('migrate', [
	      		'--env' => APP_NAME,
	        '--path'     => "app/database/migrations"
	        ]);
	      echo 'done migrate<br>';
	      
	      
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

	      echo 'done migrate   packages<br>';
	     
	      Artisan::call('db:seed', [
	      		'--env' => APP_NAME
	      		]);
	      echo 'done db:seed<br>';
	    


	}

}
