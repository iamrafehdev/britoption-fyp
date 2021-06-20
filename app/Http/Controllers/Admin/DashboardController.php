<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Commission;
use App\UserDepositFunds;
use App\UnilevelTransaction;

use App\PackagesPlan;
use App\UserPackagesPlan;
use App\UserWithdrawFunds;

use DB;
use Mail;
class DashboardController extends Controller
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
        $users = User::where('status',0)->get();
        $activated_packages_total = UserPackagesPlan::count();
        $packages_total = PackagesPlan::count();
        $active_users_total = User::where('status',1)->count();
        $pending_users_total = User::where('user_type','free')->count();
        $user_packagesplan = PackagesPlan::Join('users_packages','packages_plan.id','=','users_packages.packages_plan_id')
        ->join('users','users_packages.user_id','=','users.id')
        ->select('packages_plan.*','users.id as u_id','users.name')
        ->get();
        // $user_withdraw_funds = UserWithdrawFunds::Join('payment_methods','users_withdraw_funds.payment_method_id','=','payment_methods.id')
        // ->join('users','users_withdraw_funds.user_id','=','users.id')
        // ->select('payment_methods.*','users_withdraw_funds.amount','users_withdraw_funds.withdraw_date')
        // ->get();
        $total_withdraw_request = DB::table('users_withdraw_funds')->where('status',0)->count();
        $total_users_balance = DB::table('users')->sum('balance');
        $total_deposit = DB::table('users_deposit_funds')->where('status',1)->sum('amount');
        $total_withdraw_funds = DB::table('users_withdraw_funds')->where('status',1)->sum('amount');
        $total_unilevel_funds = DB::table('unilevel_transactions')->sum('amount');

        return view('admin.dashboard.index',compact('users','activated_packages_total','packages_total','active_users_total','pending_users_total','user_packagesplan','total_withdraw_request','total_users_balance','total_deposit','total_withdraw_funds','total_unilevel_funds'));
    }



    public function packages_requests()
    {
        $all_requests = DB::table("users_packages")->join('users_deposit_funds', 'users_packages.deposit_id', '=', 'users_deposit_funds.id')
        ->where('users_packages.payment_status','2')
        ->select('users_packages.id as upkgid','users_deposit_funds.order_number as order_number','users_deposit_funds.amount as dollaramount',
        'users_deposit_funds.btc_amount as btcamount','users_deposit_funds.user_id as userid',
        'users_deposit_funds.package_plan_id as pkg_id','users_packages.trx_id as trx')
        ->get();
        return view('admin.packages_requests.pending',compact('all_requests'));

    }


    public function approved_packages_requests()
    {
        $all_requests = DB::table("users_packages")->join('users_deposit_funds', 'users_packages.deposit_id', '=', 'users_deposit_funds.id')
        ->where('users_packages.payment_status','1')
        ->select('users_packages.id as upkgid','users_deposit_funds.order_number as order_number','users_deposit_funds.amount as dollaramount',
        'users_deposit_funds.btc_amount as btcamount','users_deposit_funds.user_id as userid',
        'users_deposit_funds.package_plan_id as pkg_id','users_deposit_funds.updated_at as udate','users_packages.trx_id as trx')
        ->get();
        return view('admin.packages_requests.approved',compact('all_requests'));

    }



    public function rejected_packages_requests()
    {
        $all_requests = DB::table("users_packages")->join('users_deposit_funds', 'users_packages.deposit_id', '=', 'users_deposit_funds.id')
        ->where('users_packages.payment_status','3')
        ->select('users_packages.id as upkgid','users_deposit_funds.order_number as order_number','users_deposit_funds.amount as dollaramount',
        'users_deposit_funds.btc_amount as btcamount',
        'users_deposit_funds.user_id as userid','users_deposit_funds.package_plan_id as pkg_id','users_deposit_funds.updated_at as udate','users_packages.trx_id as trx')
        ->get();
        return view('admin.packages_requests.rejected',compact('all_requests'));

    }


    public function accept_request($id)
    {
        $comm = Commission::where('id','1')->first();
       $up_pkg = UserPackagesPlan::find($id);

            $up_pkg->payment_status = '1';
            $up_pkg->save();

        UserDepositFunds::where('id',$up_pkg->deposit_id)->update(['status' => 1,]);

        $package_plan_detail = PackagesPlan::find($up_pkg->packages_plan_id);
        $user = User::find($up_pkg->user_id);
         $user->user_type = 'paid';
         $user->save();

         $dep = UserDepositFunds::where('id',$up_pkg->deposit_id)->first();

         $ref_id = $user->ref_id;
         if($ref_id)
         {
         $r_user1 = User::find($ref_id);
         if($r_user1)
         {
            $comm_amount_1 = ($dep->amount / 100) * $comm->level_1;

            $r_user1->balance = $r_user1->balance + $comm_amount_1;
            if($r_user1->user_type=="paid")
            {
                $r_user1->save();
            }

            $u_trans = new UnilevelTransaction();

            $u_trans->user_id = $r_user1->id;
            $u_trans->ref_id  = $user->id;
            $u_trans->amount  = $comm_amount_1;
            $u_trans->date    = date('d-m-Y');
            $u_trans->type    = 'L';
            $u_trans->level    = '1';

            if($r_user1->user_type=="paid")
            {
                $u_trans->save();
            }

            $ref_2 = $r_user1->ref_id;

            if($ref_2)
            {
                $r_user2 = User::find($ref_2);
                $comm_amount_2 = ($dep->amount / 100) * $comm->level_2;
                $r_user2->balance = $r_user2->balance + $comm_amount_2;
                if($r_user2->user_type=="paid")
                {
                    $r_user2->save();
                }

                $u_trans = new UnilevelTransaction();

            $u_trans->user_id = $r_user2->id;
            $u_trans->ref_id  = $user->id;
            $u_trans->amount  = $comm_amount_2;
            $u_trans->date    = date('d-m-Y');
            $u_trans->type    = 'L';
            $u_trans->level    = '2';

             if($r_user2->user_type=="paid")
             {
                $u_trans->save();
             }

                $ref_3 = $r_user2->ref_id;

                if($ref_3)
                {
                    $r_user3 = User::find($ref_3);
                    $comm_amount_3 = ($dep->amount / 100) * $comm->level_3;
                    $r_user3->balance = $r_user3->balance + $comm_amount_3;

                    if($r_user3->user_type=="paid")
                    {
                        $r_user3->save();
                    }

                    $u_trans = new UnilevelTransaction();

                    $u_trans->user_id = $r_user3->id;
                    $u_trans->ref_id  = $user->id;
                    $u_trans->amount  = $comm_amount_3;
                    $u_trans->date    = date('d-m-Y');
                    $u_trans->type    = 'L';
                    $u_trans->level    = '3';
                     if($r_user3->user_type=="paid")
                     {
                        $u_trans->save();
                     }

                    $ref_4 = $r_user3->ref_id;

                if($ref_4)
                    {
                    $r_user4 = User::find($ref_4);
                    $comm_amount_4 = ($dep->amount / 100) * $comm->level_4;
                    $r_user4->balance = $r_user4->balance + $comm_amount_4;

                    if($r_user4->user_type=="paid")
                    {
                        $r_user4->save();
                    }

                    $u_trans = new UnilevelTransaction();

                    $u_trans->user_id = $r_user4->id;
                    $u_trans->ref_id  = $user->id;
                    $u_trans->amount  = $comm_amount_4;
                    $u_trans->date    = date('d-m-Y');
                    $u_trans->type    = 'L';
                    $u_trans->level    = '4';

                    if($r_user4->user_type=="paid")
                    {
                        $u_trans->save();
                    }

                    $ref_5 = $r_user4->ref_id;

                    if($ref_5)
                    {
                    $r_user5 = User::find($ref_5);
                    $comm_amount_5 = ($dep->amount / 100) * $comm->level_5;
                    $r_user5->balance = $r_user5->balance + $comm_amount_5;
                     if($r_user5->user_type=="paid")
                     {
                        $r_user5->save();
                     }

                    $u_trans = new UnilevelTransaction();

                    $u_trans->user_id = $r_user5->id;
                    $u_trans->ref_id  = $user->id;
                    $u_trans->amount  = $comm_amount_5;
                    $u_trans->date    = date('d-m-Y');
                    $u_trans->type    = 'L';
                    $u_trans->level    = '5';
                        if($r_user5->user_type=="paid")
                        {
                            $u_trans->save();
                        }

                    }

                    }
                }

            }


         }
         }
        // $first_entry = UserPackagesPlan::where('user_id',$user->id)->get();

        // if(count($first_entry)<2)
        // {

        //     $ref_id = $user->ref_id;

        //     if($ref_id)
        //     {
        //         $ref_user = User::find($ref_id);


        //         //echo $ref_user->name;
        //     //die();
        //         if($ref_user)
        //         {
        //             $comm = Commission::where('id','1')->first();
        //             // echo $comm->direct_refferal;
        //             // die();

        //             $dep = UserDepositFunds::where('id',$up_pkg->deposit_id)->first();

        //             $comm_amount = ($dep->amount / 100) * $comm->level_1;

        //             $ref_user->balance = $ref_user->balance + $comm_amount;
        //             $ref_user->save();

        //             $u_trans = new UnilevelTransaction();

        //             $u_trans->user_id = $ref_user->id;
        //             $u_trans->ref_id  = $user->id;
        //             $u_trans->amount  = $comm_amount;
        //             $u_trans->date    = date('d-m-Y');
        //             $u_trans->type    = 'D';
        //             $u_trans->save();

        //         }
        //     }
        // }



        $msg = "Congrats! Your Request for buying the ".$package_plan_detail->package_name." package has been Approved. Thank You for Buying our Services.";


                $this->sendmail($user->email,$msg,$user->name);

        return redirect()->back();
    }


    public function reject_request($id)
    {
       $up_pkg = UserPackagesPlan::find($id);
        $up_pkg->payment_status= '3';
        $up_pkg->save();
        UserDepositFunds::where('id',$up_pkg->deposit_id)->update(['status' => 3,]);

        $package_plan_detail = PackagesPlan::find($up_pkg->packages_plan_id);
        $user = User::find($up_pkg->user_id);

        $msg = "Sorry! Your Request for buying the ".$package_plan_detail->package_name." package can't be Processed due to some issues. Please Try Again Later.";


                $this->sendmail($user->email,$msg,$user->name);

        \Toastr::success('Request Rejected successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

        public function sendmail($email,$msg,$name)
    {
            $data = array('desc'=>$msg,'name'=>$name);

        Mail::send('emails.email_template', $data, function($message)use($email) {
         $message->to($email)->subject('Brit Option');
         $message->from('support@profitearn.io','Brit Option');
      });
    }


}
