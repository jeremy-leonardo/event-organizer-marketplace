<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:user');
        $this->middleware('guest:organizer');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function userValidator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'max:255'],
            'user_email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'user_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function organizerValidator(array $data)
    {
        return Validator::make($data, [
            'organizer_name' => ['required', 'string', 'max:255'],
            'organizer_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'organizer_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createUser(Request $request)
    {
        // $this->userValidator($request->all())->validate();
        $user = User::create([
            'user_name' => $request['name'],
            'user_email' => $request['email'],
            'user_password' => bcrypt($request['password']),
            'user_phone_number' => $request['phonenumber'],
        ]);
        // $user->save();
        return redirect()->intended('/login');
    }

    protected function createOrganizer(Request $request)
    {
        $this->organizerValidator($request->all())->validate();
        $organizer = Organizer::create([
            'organizer_name' => $request['name'],
            'organizer_email' => $request['email'],
            'organizer_password' => bcrypt($request['password']),
        ]);
        return redirect()->intended('/login');
    }

    public function index(){
        return view('auth.register.index', ['register_as' => '']);
    }

    public function showUserRegister()
    {
        return view('auth.register.index', ['register_as' => 'user']);
    }

    public function showOrganizerRegister()
    {
        return view('auth.register.index', ['register_as' => 'organizer']);
    }

}
