<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class BackupController extends Controller {

	public function download()
	{
		$path = app_path('database/dbs/'.APP_NAME.'.sqlite');

		$stamp = \Carbon\Carbon::now()->format('d-m-Y-H-i-s');
  	
  		return \Response::download($path, 'datbase-backup-' . $stamp . '.sqlite');
	
	}

}
