<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
	public function index()
	{
		return view('users.index', [
			'users' => User::paginate(10),
			'roles' => Roles::get(),
		]);
	}

	public function create(CreateUserRequest $request)
	{
		$userInfo = $request->safe()->except('role', 'password');

		User::create(array_merge($userInfo, [
			'role_id' => $request->safe()->role,
			'password' => Hash::make($request->safe()->password),
		]));

		return back()->with('success', 'Success! User Added.');
	}

	public function show($user)
	{
		$id = Crypt::decrypt($user);

		$user = User::findOrFail($id);

		$user->enc_id = Crypt::encrypt($user->id);

		return view('users.edit', [
			'user' => $user,
			'roles' => Roles::get(),
		]);
	}

	public function update(UpdateUserRequest $request, $user)
	{
		$id = Crypt::decrypt($user);
		
		$userInfo = $request->safe()->except('role', 'password');
		
		$validator = Validator::make($userInfo, [
			'email' => Rule::unique('users', 'email')->ignore($id)
		]);

		if($validator->fails()) {
			return back()->withErrors($validator);
		}
		
		$user = User::find($id)->update(array_merge($userInfo, [
			'role_id' => $request->safe()->role,
			'password' => Hash::make($request->safe()->password),
		]));

		return back()->with([
			'user' => $user,
			'roles' => Roles::get(),
		])
		->with('success', 'Success! User information updated.');
	}

	public function delete($user)
	{
		$id = Crypt::decrypt($user);
		
		User::findOrFail($id)->delete();

		return back()->with([
			'user' => User::get(),
			'roles' => Roles::get(),
		])
		->with('removed', 'User has been removed.');
	}
}
