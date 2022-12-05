<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function login()
	{
		if (Auth::check()) {
			return redirect()->route('home');
		}
		
		return view('pages.login');
	}

	public function home()
	{
		return view('pages.home');
	}
	
	public function authenticate(LoginRequest $request)
	{
		$credentials = $request->validated();

		if(Auth::attempt($credentials)) {
			$request->session()->regenerate();

			return redirect()->intended('home');
		}

		return back()->withErrors([
			'email' => 'Incorrect email or password.',
		])->onlyInput('email');
	}

	public function logout(Request $request)
	{
		Auth::logout();
	
		$request->session()->invalidate();
	
		$request->session()->regenerateToken();
	
		return redirect('/');
	}
}
