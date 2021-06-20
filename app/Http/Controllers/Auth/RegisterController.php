<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;
use Mail;
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
    }

    public function index(){
        return view('users.auth.register');
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
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verification_code' => $veri,
        ]);
        return $user;
    }

    public function signup(Request $request)
    {
        $username = str_replace(' ', '', $request->username);
        $already_exist = User::where('email',$request->email)->first();
        $already_username = User::where('username',$username)->first();

        if($already_exist)
        {
            $status = "This email already exist. Please try with another email thank you !";
            return redirect('/login')->with('warning', $status);
        }

        if($already_username)
        {
            $status = "This username already exist. Please try with another username thank you !";
            return redirect('/login')->with('warning', $status);
        }

        $ref = User::where('username',$request->ref_name)->first();
        if($ref)
        {
            $ref_id = $ref->id;
        }
        else
        {
            $ref_id = '';
        }
        $last_account_no = DB::table('users')->latest('id')->first();
        $veri=str_random(20);
        $users = new User;
        $users->ref_id = $ref_id;
        $users->name =$request->name;
        $users->username = str_replace(' ', '', $request->username);
        $email=$request->email;
        $users->email =$email;
        $users->account =$last_account_no->account+1;
        $users->phone =$request->phone;
        $users->country =$request->country;
        $users->password =Hash::make($request->password);
        $users->verification_code=$veri;
        $users->save();
        //$this->sendmail($request->email,$veri,$request->name);
        \Toastr::success('Registered successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('/login')->with('message', 'User has been registered please login!');
    }
}
