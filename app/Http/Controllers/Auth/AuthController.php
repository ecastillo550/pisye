<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';
	protected $loginPath = '/auth/login';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'username' => 'required|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

	protected function getLogin(Request $request) {
		return view('auth.login');
	}

	/**
	* Handle an authentication attempt
	*
	* @param Request $request
	* @return Response
	*/
	protected function authenticate(Request $request) {
		$rememberUser = !empty($request->remember) ? true : false;

		if (Auth::attempt(['email' => $request->username_email, 'password' => $request->password], $rememberUser)) {
			return redirect()->intended('/');
		}
		else if (Auth::attempt(['username' => $request->username_email, 'password' => $request->password], $rememberUser)) {
			return redirect()->intended('/');
		}

		$errors = new MessageBag(['password' => ['Email y/o password inválidos.']]);

		return back()->withErrors($errors)->withInput($request->except('password'));
	}

	protected function logout() {
		Auth::logout();

		return redirect('/');
	}
}
