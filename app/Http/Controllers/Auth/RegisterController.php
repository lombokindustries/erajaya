<?php

namespace App\Http\Controllers\Auth;

use Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'firstname' => $data['firstname'],
    //         'lastname' => $data['lastname'],
    //         'hp' => $data['hp'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'role' => $data['role'],
    //         'status' => $data['status'],
    //     ]);
    // }

    public function generalRegister(Request $request)
    {
        $validate = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'hp' => 'required|max:14',
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:8',
            'password_confirmation' => 'required|alpha_num|min:8',
            'role' => 'required',
            'status' => 'required',
        ]);

        $u = new User();

        $u->firstname = $request->firstname;
        $u->lastname = $request->lastname;
        $u->hp = $request->hp;
        $u->email = $request->email;
        $u->password = Hash::make($request->password);
        $u->role = $request->role;
        $u->status = $request->status;

        $u->save();

        Alert::success('Well Done!', 'Terimakasih sudah bergabung, Silahkan login!');
        return redirect('admin/register');
    }
}
