<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
{
   $this->validate($request, [
    'email' => 'required',
    'password' => 'required',

  ]);
    // adjust as needed
}


    protected function authenticated($request, $user)
    {
        // check user profile is completed
        // if($user->user_profile_status==0)
        // {
        //     return redirect('/users/compete_profile');
        // }


        if ($user->role == 1 ) {
            return redirect()->route('admin-dashboard');
        } else if( $user->role == 0 ){

            if ($user->verified==0) {
                auth()->logout();
                return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
            }

            if ($user->status==2) {
                auth()->logout();
                return back()->with('warning', 'Your account is blocked for further information contact the admin.');
            }
            return redirect()->route('users-dashboard');

        } else {
            //$currentPath= Route::getFacadeRoot()->current()->uri();
            //dd($currentPath);
            return redirect('/login');
        }
    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
    }


}
