<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Vendor;
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
        $this->middleware('guest:vendor');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user,user_email'],
            'password' => ['required', 'string', 'min:6', 'max:64'],
            'password-confirmation' => ['required', 'same:password'],
            'phone-number' => ['required', 'numeric', 'max:999999999999999999', 'unique:user,user_phone_number'],
        ]);
    }

    protected function vendorValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendor,vendor_email'],
            'password' => ['required', 'string', 'min:6', 'max:64'],
            'password-confirmation' => ['required', 'same:password'],
            'phone-number' => ['required', 'numeric', 'max:999999999999999999', 'unique:vendor,vendor_phone_number'],
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
        $this->userValidator($request->all())->validate();
        $user = User::create([
            'user_name' => $request['name'],
            'user_email' => $request['email'],
            'user_password' => bcrypt($request['password']),
            'user_phone_number' => $request['phone-number'],
        ]);
        return redirect()->intended('/login');
    }

    protected function createVendor(Request $request)
    {
        $this->vendorValidator($request->all())->validate();
        $vendor = Vendor::create([
            'vendor_name' => $request['name'],
            'vendor_email' => $request['email'],
            'vendor_password' => bcrypt($request['password']),
            'vendor_phone_number' => $request['phone-number'],
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

    public function showVendorRegister()
    {
        return view('auth.register.index', ['register_as' => 'vendor']);
    }

}
