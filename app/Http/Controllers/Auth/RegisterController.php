<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
	use RegistersUsers;

    /**
     * Role adicionado ao usuário quando ele é criado
     *
     * @var string
     */
    protected $role = 'canteen';

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/blockchain';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('guest');
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
    		'name' => 'required|string|max:255',
    		'email' => 'required|string|email|max:255|unique:users',
    		'password' => 'required|string|min:6|confirmed',
    	]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    	$user = User::create([
    		'name' => $data['name'],
    		'email' => $data['email'],
    		'password' => Hash::make($data['password']),
    	]);

    	$user->attachRole(Role::where('name', $this->role)->first());

    	return $user;
    }
}
