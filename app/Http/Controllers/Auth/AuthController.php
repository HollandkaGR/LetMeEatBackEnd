<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginFormRequest;
use App\Http\Requests\Auth\RegisterFormRequest;
use App\Http\Requests\Auth\UpdateFormRequest;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
	private $auth;

	public function __construct(JWTAuth $auth)
	{
		$this->auth = $auth;
	}

	public function login(LoginFormRequest $request)
	{
		try {
			if (!$token = $this->auth->attempt($request->only('email', 'password'))) {
				return response()->json([
					'errors' => [
					'root' => 'A megadott adatokkal a belépés nem lehetséges'
					]
				], 401);
			}
		} catch (JWTException $e) {
			return response()->json([
				'errors' => [
				'root' => 'Bejelentkezési hiba, próbálja újra!'
				]
				], $e->getStatusCode());
		}

		return response()->json(
			[
			'data' => $request->user(),
			'meta' => [
			'token' => $token
			]
			], 200);

	}

	public function register(RegisterFormRequest $request)
	{
		$user = User::create([
			'first_name' 		=> $request->first_name,
			'last_name' 		=> $request->last_name,
			'email' 				=> $request->email,
			'password' 			=> bcrypt($request->password),
			'phone_number' 	=> $request->phone_number,
		]);

		$token = $this->auth->attempt($request->only('email', 'password'));

		return response()->json(
		[
			'data' => $user,
			'meta' => [
				'token' => $token
			]
		], 200);
	}

	public function userUpdate(UpdateFormRequest $request)
	{
		
		$user = User::find($request->user()->id);

		$user->first_name 	= $request->first_name;
		$user->last_name 		= $request->last_name;
		$user->phone_number = $request->phone_number;

		if ($request->user()->email !== $request->email) {
			$user->email = $request->email;
		}

		$user->save();

		return response()->json(
		[
			'data' => $user
		], 200);
	}

	public function logout ()
	{
		$this->auth->invalidate($this->auth->getToken());

		return response(null, 200);
	}

	public function user(Request $request)
	{
		return response()->json([
			'data' => $request->user(),
			]);
	}

}
