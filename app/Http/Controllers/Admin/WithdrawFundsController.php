<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\PaymentMethods;
use App\UserWithdrawFunds;
use App\PackagesPlan;
use App\UserDepositFunds;
use App\UserPayments;
use App\AdminPayments;
use Auth;
use Mail;
use Config;
use URL;

class WithdrawFundsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_users = User::all();
        $all_payment_methods = PaymentMethods::all();
        return view('admin.withdraw_funds.index',compact('all_users','all_payment_methods'));
    }

    public function withdraw_preview(Request $request)
    {
        $user = User::find($request->user);
        $payment_method = PaymentMethods::find($request->payment_method);
        $withdraw_amount = $request->withdraw_amount;
        $withdraw_date = $request->withdraw_date;
        return view('admin.withdraw_funds.withdraw_preview',compact('user','payment_method','withdraw_amount','withdraw_date'));
    }

    public function withdraw_preview_save(Request $request)
    {
        $user_withdraw_funds = new UserWithdrawFunds;
        $user_withdraw_funds->user_id = $request->user;
        $user_withdraw_funds->payment_method_id = $request->payment_method;
        $user_withdraw_funds->amount = $request->withdraw_amount;
        $user_withdraw_funds->withdraw_date = $request->withdraw_date;
        $user_withdraw_funds->save();
        \Toastr::success('Amount withdraw successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('admin/fund-withdraw');
    }

    public function withdraw_request()
    {
         $user_withdraw_funds = UserWithdrawFunds::where('status',0)->get();
        return view('admin.withdraw_funds.withdraw_request',compact('user_withdraw_funds'));
    }



    public function respondWithdraw(Request $request, $id)
    {

         UserWithdrawFunds::whereId($id)
        ->update([
            'status' => $request->status,
        ]);
        if ($request->status == 1 )
        {
           $withdraw = UserWithdrawFunds::find($id);
            $user_id = $withdraw->user_id;
            $user = User::find($user_id);
            User::whereId($user_id)
                ->update([
                    'balance' => $user->balance - $withdraw->amount
                ]);

            // send withdraw charge amount to admin
            $admin_user = User::find(2);
            $save_payments=new AdminPayments;
            $save_payments->user_id = $withdraw->user_id;
            $save_payments->charge_percentage = $withdraw->charge;
            $save_payments->total_amount = $withdraw->comm_amount;
            $save_payments->payment_date = date('d-m-Y');
            $save_payments->save();

            $msg = "Congrats! Your Request for Withdrawl has been Processed. Thank You for using ProfitEarn.";

            $data = array('amount'=>$withdraw->amount,'charges'=>$withdraw->comm_amount,'name'=>Auth::user()->name,'date'=> date('Y-m-d'),'email'=>$user->email,'name'=>$user->name,'message'=>$msg,'status'=>1);

            $this->sendmail($user->email,$user->name,$data);

            return redirect()->back();
        }

    }

    public function withdrawReject(Request $request, $id)
    {
            $withdraw = UserWithdrawFunds::find($id);
             UserWithdrawFunds::whereId($id)
            ->update([
                'status' => 3,
                'rejection_comment' => $request->message,

            ]);
            $user_id = $withdraw->user_id;
            $message = $request->message;
            $user = User::find($user_id);
            $msg = "Ooops! It seems that something is wrong with your Transaction. Your Request for Withdrawl has been Rejected.<br>".$message;
            $data = array('amount'=>$withdraw->amount,'charges'=>$withdraw->comm_amount,'name'=>Auth::user()->name,'date'=> date('Y-m-d'),'email'=>$user->email,'name'=>$user->name,'rejectMessage'=>$msg,'status'=>0);

            $this->sendmail($user->email,$user->name,$data);
            \Toastr::success('Withdraw Status Updated successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
    }





    public function sendmail($email,$name,$data)
    {
           // $data = array('desc'=>$msg,'name'=>$name);

        Mail::send('emails.withdraw_approved_template', $data, function($message)use($email) {
         $message->to($email)->subject('Brit Option');
         $message->from('noreply@profitearn.io','Brit Option');
      });
    }

    // withdraw request detail
    public function withdraw_request_detail($id)
    {
        $withdraw_detail = UserWithdrawFunds::find($id);
        $id = $withdraw_detail->user_id;

        $users = User::find($id);

         $user_packagesplan = PackagesPlan::Join('users_packages','packages_plan.id','=','users_packages.packages_plan_id')
        ->join('users','users_packages.user_id','=','users.id')
        ->select('packages_plan.*','users.id as u_id','users.name')
        ->where('users_packages.user_id',$id)
        ->paginate(10);

        $user_deposit_funds = UserDepositFunds::Join('packages_plan','users_deposit_funds.package_plan_id','=','packages_plan.id')
        ->join('users','users_deposit_funds.user_id','=','users.id')
        ->select('packages_plan.*','users_deposit_funds.amount','users_deposit_funds.created_at as created_date')
        ->where('users_deposit_funds.user_id',$id)
        ->paginate(10);

       $user_withdraw_funds = UserWithdrawFunds::where('users_withdraw_funds.user_id',$id)
        ->paginate(10);

       $user_daily_earning = UserPayments::where('users_payments.user_id',$id)
        ->paginate(10);


        return view('admin.withdraw_funds.withdraw_request_detail',compact('users','user_packagesplan','user_deposit_funds','user_daily_earning','user_withdraw_funds','withdraw_detail'));
    }

    // approved withdraw request
    public function withdraw_request_approved()
    {
        $user_withdraw_funds = UserWithdrawFunds::where('status',1)->get();
        return view('admin.withdraw_funds.withdraw_request_approved',compact('user_withdraw_funds'));
    }

    // approved withdraw request filter
    public function withdraw_request_approved_filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $user_withdraw_funds = UserWithdrawFunds::where('status',1)->whereBetween('created_at',[$start_date,$end_date])->get();
        return view('admin.withdraw_funds.withdraw_request_approved',compact('user_withdraw_funds'));
    }

     // rejected withdraw request
    public function withdraw_request_rejected()
    {
        $user_withdraw_funds = UserWithdrawFunds::where('status',3)->get();
        return view('admin.withdraw_funds.withdraw_request_rejected',compact('user_withdraw_funds'));
    }

    // rejected withdraw request filter
    public function withdraw_request_rejected_filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $user_withdraw_funds = UserWithdrawFunds::where('status',3)->whereBetween('created_at',[$start_date,$end_date])->get();
        return view('admin.withdraw_funds.withdraw_request_rejected',compact('user_withdraw_funds'));
    }

    //  withdraw request filter
    public function withdraw_request_filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $user_withdraw_funds = UserWithdrawFunds::where('status',3)->whereBetween('created_at',[$start_date,$end_date])->get();
        return view('admin.withdraw_funds.withdraw_request',compact('user_withdraw_funds'));
    }









}
