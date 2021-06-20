<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PackagesPlan;
use App\User;
use Mail;

class EmailMarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages_plan = PackagesPlan::all();
        return view('admin.packages_plan.index',compact('packages_plan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.email_marketing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::where('user_type',$request->user_type)->get();
        foreach($users as $user)
        {
            $email = $user->email;
            $data=array('name'=>$user->name);
            Mail::send('emails.merketing_email', $data, function($message)use($email) {
             $message->to($email)->subject('Brit Option');
             $message->from('noreply@profitearn.io','Brit Option');
        });
        }
        \Toastr::success('Email has been sent successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('admin/send_marketing_email');
    }



}
