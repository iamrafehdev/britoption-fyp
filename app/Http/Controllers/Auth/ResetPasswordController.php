<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User;
use DB;
use Mail;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';



     public function forgotPass(Request $request)
    {
        $this->validate($request,[
                'email' => 'required',
            ]);
        $user = User::where('email', $request->email)->first();
        if ($user == null)
        {
            return back()->with('alert', 'Email Not Available');
        }
        else
        {
            $to =$user->email;
            $name = $user->name;
            $subject = 'Password Reset';
            $code = str_random(30);
            $message = 'Use This Link to Reset Password: '.url('/').'/reset/'.$code;

            DB::table('password_resets')->insert(
                ['email' => $to, 'token' => $code,'created_at' => date("Y-m-d h:i:s")]
            );

            //send_email($to, $subject, $name, $message);
            $this->sendmail($to,$subject,$name,$message);

            return redirect()->route('login')->with('message', 'Password Reset Email Sent Succesfully to your Registered Email');
        }

    }


    public function resetLink($code)
    {
        $reset = DB::table('password_resets')->where('token', $code)->orderBy('created_at', 'desc')->first();
        if($reset)
        {
            return view('auth.passwords.reset', compact('reset'));
        }
        else
        {
            return back()->with('message', 'Invalid Reset Link');
        }


    }

    public function passwordReset(Request $request)
    {
        $this->validate($request,[
                'email' => 'required',
                'code' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required',
            ]);

        $reset = DB::table('password_resets')->where('token', $request->code)->orderBy('created_at', 'desc')->first();
        if($reset)
        {
        $user = User::where('email', $reset->email)->first();

            if($request->password == $request->password_confirmation)
            {
                $user->password = bcrypt($request->password);
                $user->save();

                DB::table('password_resets')->where('email', $user->email)->delete();

                $msg =  'Password Changed Successfully';
                $this->sendmail($user->email,'Password Changed', $user->name, $msg);
                // $sms =  'Password Changed Successfully';
                // send_sms($user->mobile, $sms);

                return redirect()->route('login')->with('message', 'Password Changed Successfully');
            }
            else
            {
                return back()->with('alert', 'Password Not Matched');
            }
        }
        else
        {
            return back()->with('message', 'Invalid Reset Link');
        }

    }


    public function sendmail($email,$subject,$name,$msg)
    {
            $data = array('desc'=>$msg,'name'=>$name);

        Mail::send('emails.email_template', $data, function($message)use($email) {
         $message->to($email)->subject('Password Reset');
         //$message->from('support@profitearn.io','Brit Option');
      });
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
