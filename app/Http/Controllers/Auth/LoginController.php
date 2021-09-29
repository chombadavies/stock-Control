<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\SystemAudit;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        if ($request->isMethod("post")) {
            $this->validate($request, [
                'email' => 'required',
                'password' => 'required',
            ]);

            $login_type = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

            $request->merge([
                $login_type => $request->input('email'),
            ]);

            if (Auth::attempt($request->only($login_type, 'password'))) {
                $user = Auth::User();
                $user->lastlogindate = date('Y-m-d H:i:s');
                $user->save();
                $description = $user->name . " signed into the system ";
                $client_ip = $request->ip();
                SystemAudit::CreateEvent($user, "Logged In", $description, "Critical", $client_ip, "User Management");

                return redirect()->intended($this->redirectPath());
            }

            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'login' => 'These credentials do not match our records.',
                ]);
        } else {
            return view('auth.login');
        }

    }

    public function logout(Request $request)
    {
        $user = Auth::User();
        if ($user) {
            $description = $user->name . " signed out the system ";
            $client_ip = $request->ip();
            SystemAudit::CreateEvent($user, "Logged out", $description, "Critical", $client_ip, "User Management");
        }

        \Auth::logout();
        return redirect('/');
    }
}
