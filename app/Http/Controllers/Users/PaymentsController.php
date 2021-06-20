<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentMethods;
use App\UserPackagesPlan;
use App\PackagesPlan;
use App\UserDepositFunds;
use App\User;
use Auth;
use Mail;
use Config;
use URL;
use DB;

class PaymentsController extends Controller
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
        $payment_methods = PaymentMethods::all();
        return view('users.deposit_funds.index',compact('payment_methods'));
    }

    public function deposit_funds(Request $request)
    {
        $payment_method =PaymentMethods::find($request->payment_method);
        $package_plan_id = $request->package_plan_id;
        $guid = $request->guid;
        $user_id = $request->user_id;
        $amount = $request->amount;
        $amountinbtc = $request->btc_amount;
        $order_number = $request->order_number;
        $main_password = 'Acmehub007!@';

        if ($payment_method->id==1)
        {

            $btc = $amount/5570;
            $btc = round($btc, 8);

            $package_plan_detail = PackagesPlan::where('id',$package_plan_id)->first();

            $profit_amount = ($amount / 100) *$package_plan_detail->daily_profit;



                $user_deposit_fund = new UserDepositFunds;
                $user_deposit_fund->package_plan_id =$package_plan_id;
                $user_deposit_fund->amount = $amount;
                $user_deposit_fund->sender = $request->guid;
                $user_deposit_fund->reciever = $payment_method->w_address;
                $user_deposit_fund->order_number = $order_number;
                $user_deposit_fund->btc_amount = $amountinbtc;
                $user_deposit_fund->btc_rate = '5570';
                $user_deposit_fund->user_id = $user_id;
                $user_deposit_fund->status = '2';
                if($user_deposit_fund->save())
                {
                $user_packages = new UserPackagesPlan;
            $user_packages->user_id = $user_id;
            $user_packages->packages_plan_id = $package_plan_id;
            $user_packages->deposit_id = $user_deposit_fund->id;
            $user_packages->daily_profit = $profit_amount;
            $user_packages->trx_id ='PKG-ON#-'.rand();
            $user_packages->payment_status = "2";
            $user_packages->save();

                $user = User::find($user_id);

                $msg = "Congrats! Your Request for buying the ".$package_plan_detail->package_name." package has been recieved. Please wait for the Admin Confirmation. Thank You.";


                $this->sendmail($user->email,$msg,$user->name);
                }

           \Toastr::success('Fund Deposit successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
            return redirect()->route('users-dashboard');
        }


        // 3 = perfect money payment gateway
        if($payment_method->id==3){

            //$amount = $data->amount;
            $amount = $request->amount;;
            // $perfect['value1'] = $gatewayData->val1;
            // $perfect['value2'] = $gatewayData->val2;
            // $perfect['track'] = $track;
            return view('users.payment_gateways.perfect', compact('amount','package_plan_id'));
        }


        // 3 = perfect money payment gateway
        if($payment_method->id==5){

            $payment_method = PaymentMethods::find(5);
            //$amount = $data->amount;
           $all = file_get_contents("https://blockchain.info/ticker");
            $res = json_decode($all);

            $btcrate = $res->USD->last;

            $amount = $request->amount;
            $usd = $amount;
            $btcamount = $usd/$btcrate;
            $btc = round($btcamount, 8);
            // $perfect['value1'] = $gatewayData->val1;
            // $perfect['value2'] = $gatewayData->val2;
            // $perfect['track'] = $track;
            $page = "deposit-funds";
            $qrcode = "https://blockchain.info/qr?data=bitcoin:".$payment_method->w_address."?amount=".$btc;

            return view('users.payment_gateways.bitcoin', compact('amount','package_plan_id','page','qrcode','payment_method','btc'));
        }

        if($payment_method->id==4){

            $user_id = Auth::user()->id;
            $id = $request->package_plan_id;
            $package_plan_detail = PackagesPlan::find($id);
            $user_packages = new UserPackagesPlan;
            $user_packages->user_id = $user_id;
            $user_packages->packages_plan_id = $id;
            $user_packages->daily_profit = $package_plan_detail->daily_profit;
            $user_packages->payment_status = "1";
            if($user_packages->save())
            {
                $user_deposit_fund = new UserDepositFunds;
                $user_deposit_fund->package_plan_id =$id;
                $user_deposit_fund->amount =$package_plan_detail->package_price;
                $user_deposit_fund->user_id = $user_id;
                $user_deposit_fund->save();


            }
            \Toastr::success('Package activated successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
            return redirect('users/buy-package')->with('message',"Your package has been activated. Please contact with the administrator");
        }
    }

    public function perfect_money_success_deposit(Request $request){
        echo "<pre>";
        print_r($request->all());

    }

    public function perfect_money_unsuccess_deposit(){

        return view('users.deposit_funds.index',compact('payment_methods'));
    }




    public function unilevel_profit()
    {
        // first level of parent user parent user will get level one commission
        $user = User::where('id',Auth::user()->id)->first();
        if($user->ref_id)
        {
            $parent_user = User::where('id',$user->ref_id)->first();
        }
    }

    public function childView(){
    }

    public function package_expiry()
    {
        $getlevel_amount= DB::table('unilevel_transactions')->where('user_id',Auth::user()->id)->sum('amount');
        $getdaily_roi_amount = DB::table('users_payments')->where('user_id',Auth::user()->id)->sum('amount');
        $total_amount =  $getlevel_amount + $getdaily_roi_amount;

        $user = User::find(Auth::user()->id);
        $get_user_active_packages = $user->packages;
        foreach($user->userpackages as $packages)
        {
            $package = PackagesPlan::find($packages->packages_plan_id);
            $package_total_amount = $package->package_price*2;
        }

        // echo "<pre>";
        // print_r(); die;
    }

    public function deposit_amount(Request $request)
    {
        $payment_method =PaymentMethods::find($request->payment_method);
        $package_plan_id = $request->package_plan_id;
        $guid = $request->guid;
        $user_id = $request->user_id;
        $amount = $request->amount;
        $amountinbtc = $request->btc_amount;
        $order_number = $request->order_number;
        $main_password = 'Acmehub007!@';

        if ($payment_method->id==5)
        {

            $btc = $amount/5570;
            $btc = round($btc, 8);

            $package_plan_detail = PackagesPlan::where('id',$package_plan_id)->first();

            $profit_amount = ($amount / 100) *$package_plan_detail->daily_profit;



                $user_deposit_fund = new UserDepositFunds;
                $user_deposit_fund->package_plan_id =$package_plan_id;
                $user_deposit_fund->amount = $amount;
                $user_deposit_fund->sender = $request->guid;
                $user_deposit_fund->reciever = $payment_method->w_address;
                $user_deposit_fund->order_number = $order_number;
                $user_deposit_fund->btc_amount = $amountinbtc;
                $user_deposit_fund->btc_rate = '5570';
                $user_deposit_fund->user_id = $user_id;
                $user_deposit_fund->status = '2';
                if($user_deposit_fund->save())
                {
                    $user_packages = new UserPackagesPlan;
                    $user_packages->user_id = $user_id;
                    $user_packages->packages_plan_id = $package_plan_id;
                    $user_packages->deposit_id = $user_deposit_fund->id;
                    $user_packages->daily_profit = $profit_amount;
                    $user_packages->trx_id ='PKG-ON#-'.rand();
                    $user_packages->payment_status = "2";
                    $user_packages->save();

                        $user = User::find($user_id);

                        $msg = "Congrats! Your Request for buying the ".$package_plan_detail->package_name." package has been recieved. Please wait for the Admin Confirmation. Thank You.";


                    $this->sendmail($user->email,$msg,$user->name);
                }
                 return redirect('users/my-package')->with('message',"Your Package has been recieved.Please wait for the Admin Confirmatioin. Thank you.");
        }


    }


    public function sendmail($email,$msg,$name)
        {
                $data = array('desc'=>$msg,'name'=>$name);

            Mail::send('emails.email_template', $data, function($message)use($email) {
             $message->to($email)->subject('Brit Option');
             $message->from('noreply@profitearn.io','Brit Option');
          });
        }


    public function send_bitcoin_payment()
    {
        $secret = "f8fe526080ec3366eddbb498c6df4e1a";   //md5 hash a unui cuvant
$address = "1jr1jDMAVVHoVFpQKgEkCMHgzyy56URiC";

        $all = file_get_contents("https://blockchain.info/ticker");
            $res = json_decode($all);

            $btcrate = $res->USD->last;

            $amount = 100;
            $usd = $amount;
            $btcamount = $usd/$btcrate;
            $btc = round($btcamount, 8);




            $price_in_btc = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=" . $amount);
            $invoice = "-" . rand();
            $callback = "http://gobets.pw/purchase/callback.php?invoice=".$invoice."&secret=".$secret."&mainaddress=".$address ."&btc=" . $price_in_btc;
            $result = json_decode(file_get_contents("https://blockchain.info/api/receive?method=create&address=".$address."&callback=" .urlencode($callback)), true);
            print_r($result);die;

                        $qrcode = "https://blockchain.info/qr?data=bitcoin:". $result["input_address"]. "?amount=" . $price_in_btc;

            echo '<div align="center">';
            echo '<img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl='.$qrcode.'">';
            // echo '<img src="'.$qrcode.'"' . 'height="125" width="125"/>' . "</br>";
            echo "Invoice #: " . $invoice . "<br>";
            echo "Please send <b>" . $price_in_btc ."</b> BTC to <b>".  $result["input_address"] . "</b></br>";
            echo "</div>";

//                 $blockchain_root = "https://blockchain.info/";
//                 $blockchain_receive_root = "https://api.blockchain.info/";
//                 $mysite_root = url('/');
//                 $secret = "ABIR";
//                 $my_xpub = $gatewayData->val2;
//                 $my_api_key = $gatewayData->val1;

//                 $invoice_id = $track;
//                 $callback_url = $mysite_root . "/ipnbtc?invoice_id=" . $invoice_id . "&secret=" . $secret;


//                 $resp = @file_get_contents($blockchain_receive_root . "v2/receive?key=" . $my_api_key . "&callback=" . urlencode($callback_url) . "&xpub=" . $my_xpub);

//                 if (!$resp) {

// //BITCOIN API HAVING ISSUE. PLEASE TRY LATER
//                     return redirect()->route('home')->with('alert', 'BLOCKCHAIN API HAVING ISSUE. PLEASE TRY LATER');
//                     exit;
//                 }

//                 $response = json_decode($resp);
//                 $sendto = $response->address;

// // $sendto = "1HoPiJqnHoqwM8NthJu86hhADR5oWN8qG7";

//                 $data['bcid'] = $sendto;
//                 $data['bcam'] = $btc;
//                 $data->save();

//
//             $DepositData = Deposit::where('trx',$track)->orderBy('id', 'DESC')->first();
// /////UPDATE THE SEND TO ID

//             $bitcoin['amount'] = $DepositData->bcam;
//             $bitcoin['sendto'] = $DepositData->bcid;

//             $var = "bitcoin:$DepositData->bcid?amount=$DepositData->bcam";
//             $bitcoin['code'] =  "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$var&choe=UTF-8\" title='' style='width:300px;' />";

//             return view('fonts.payment.bitcoin', compact('bitcoin'));
    }






}
