<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller {

	public function index()
	{		

		return v('index');
	}

	public function login()
	{
		return view('auth.login');
	}

	public function logout()
	{
		\Auth::logout();

		\Flash::success('Wylogowano.');
		return \Redirect::home();

	}

	public function postLogin()
	{
		if (\Auth::attempt(\Request::only('email', 'password')))
		{

			\Flash::success('Witamy!');
			return \Redirect::to('admin');
		}

		return \Redirect::to('/auth/login')->withErrors([
			'email' => 'Niepoprawne dane.',
		])->withInput();
	}

}