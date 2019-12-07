<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:user')->except('logout');
        $this->middleware('guest:vendor')->except('logout');
    }

    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'];

        return $this->hasher->check($plain, $user->getAuthPassword());
    }

    public function logout(Request $request) {
        // $user = Auth()->user();
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } elseif (Auth::guard('vendor')->check()) {
            Auth::guard('vendor')->logout();
        }
        return redirect()->route('homePage');
    }

    public function loginUser(Request $request)
    {
        // $this->validate($request, [
        //     'email'   => 'required|email',
        //     'password' => 'required|min:6'
        // ]);
        if (Auth::guard('user')->attempt(['user_email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/');
        }
        return back()->withInput($request->only('user_email', 'remember'))->withErrors(['Failed to log in']);
    }

    public function loginVendor(Request $request)
    {
        // $this->validate($request, [
        //     'email'   => 'required|email',
        //     'password' => 'required|min:6'
        // ]);
        if (Auth::guard('vendor')->attempt(['vendor_email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/');
        }
        return back()->withInput($request->only('vendor_email', 'remember'))->withErrors(['Failed to log in']);
    }

    public function index()
    {
        return view('auth.login.index', ['login_as' => '']);
    }

    public function showUserLogin()
    {
        return view('auth.login.index', ['login_as' => 'user']);
    }

    public function showVendorLogin()
    {
        return view('auth.login.index', ['login_as' => 'vendor']);
    }

}
