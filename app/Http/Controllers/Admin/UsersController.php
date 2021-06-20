<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PackagesPlan;
use App\UserPackagesPlan;
use App\User;
use App\UserDepositFunds;
use App\UserWithdrawFunds;
use App\UserPayments;
use App\UnilevelTransaction;
use DB;
use Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function approve_user($id){

        $users = User::find($id);
        $users->status="1";
        $users->save();
        \Toastr::success('User approved successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('/admin-dashboard');

    }

    public function user_profile($id)
    {
        $users = User::find($id);
        $user_packagesplan = UserPackagesPlan::where('user_id',$id)->paginate(10);


        $user_deposit_funds = UserDepositFunds::Join('packages_plan','users_deposit_funds.package_plan_id','=','packages_plan.id')
        ->join('users','users_deposit_funds.user_id','=','users.id')
        ->select('packages_plan.*','users_deposit_funds.amount','users_deposit_funds.created_at as created_date')
        ->where('users_deposit_funds.user_id',$id)
        ->paginate(10);

       $user_withdraw_funds = UserWithdrawFunds::where('users_withdraw_funds.user_id',$id)
        ->orderBy('id', 'desc')
        ->paginate(10);

       $user_daily_earning = UserPayments::where('users_payments.user_id',$id)
        ->orderBy('id', 'desc')
        ->paginate(10);

        $bonus = UnilevelTransaction::where('user_id',$id)->where('type','L')->get();


        return view('admin.users.user_profile',compact('users','user_packagesplan','user_deposit_funds','user_daily_earning','user_withdraw_funds','bonus'));
    }

     public function free_users()
    {
       $users = User::where('user_type','free')->where('role','0')->orderBy('id', 'desc')->get();
       return view('admin.users.free_users',compact('users'));
    }

    public function paid_users()
    {
        $users = User::where('user_type','paid')->where('status',1)->where('role','0')->orderBy('id', 'desc')->get();
       return view('admin.users.paid_users',compact('users'));
    }

    public function banned_users()
    {
        $users = User::where('status','2')->where('role','0') ->orderBy('id', 'desc')->get();
       return view('admin.users.banned_users',compact('users'));
    }

    public function ChangeUserStatus(Request $request)
    {
        if($request->status==1)
        {
            $status = "paid";
        }
        if($request->status==0)
        {
            $status = "free";
        }
        DB::table('users')->where('id',$request->userID)->update(['user_type' => $status]);
        \Toastr::success('User updated successfully!', 'Complete', ["positionClass" => "toast-top-right"]);

    }

     public function BannedUserStatus(Request $request)
    {
        if($request->status=='1')
        {
            $rstatus =2;
        }
        if($request->status=='0')
        {
            $rstatus = 1;
        }
        DB::table('users')->where('id',$request->userID)->update(['status' => $rstatus]);
        \Toastr::success('User updated successfully!', 'Complete', ["positionClass" => "toast-top-right"]);

    }

    public function send_conditional_email_free(Request $request)
    {
        $userID = $request->user_id;
        if($userID)
        {
            $user = User::find($userID);
            $this->sendmail_free($user->email,$user->name);
        }

        \Toastr::success('Email has been sent successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('free_users');


    }

    public function send_conditional_email_paid(Request $request)
    {
        $userID = $request->user_id;
        if($userID)
        {
            $user = User::find($userID);
            $this->sendmail($user->email,$user->name);
        }

        \Toastr::success('Email has been sent successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('paid_users');


    }

    public function sendmail($email,$name)
    {
        $data = array('name'=>$name);

        Mail::send('emails.conditional_account_email', $data, function($message)use($email) {
         $message->to($email)->subject('Brit Option');
         $message->from('noreply@profitearn.io','Brit Option');
      });
    }

    public function sendmail_free($email,$name)
    {
        $data = array('name'=>$name);

        Mail::send('emails.merketing_email', $data, function($message)use($email) {
         $message->to($email)->subject('Brit Option');
         $message->from('noreply@profitearn.io','Brit Option');
      });
    }

    public function change_user_package_status(Request $request)
    {
        $userID =   $request->user_id;
         $count_packages = UserPackagesPlan::where('user_id',$userID)->count();
         $count_expire  =  UserPackagesPlan::where('user_id',$userID)->where('package_status',4)->count();

        $up_pkg = UserPackagesPlan::where('id',$request->userpackageID)->first();
        // 4 = expire package
        $up_pkg->package_status =4;
        $up_pkg->save();

        if($count_packages == $count_expire)
        {
            $user = User::find($userID);
            $user->user_type ="free";
            $user->save();
        }
        \Toastr::success('Package expired successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('admin/user-profile/'.$request->user_id);
    }


}
