<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentMethods;
use App\PackagesPlan;
use App\User;
use App\UserDepositFunds;
use App\UserPackagesPlan;
use App\UnilevelTransaction;
use DB;
use Auth;
class UnilevelController extends Controller
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
     
        $tree='<ul id="browser" class="filetree"><li class="tree-view"></li>';
        $Categorys = User::where('ref_id',Auth::user()->id)->get();
       
        foreach ($Categorys as $Category) {
            
            
            if($Category->user_type=="paid")
            {
            
                $getuerPackage = UserPackagesPlan::where('user_id',$Category->id)->first();

                if($getuerPackage)
                {   
                    //$deposit = UserDepositFunds::where('id',$getuerPackage->deposit_id)->first();
                    $deposit = UserDepositFunds::where('user_id',$Category->id)->where('status',1)->sum('amount');

                    $getPackage = PackagesPlan::where('id',$getuerPackage->packages_plan_id)->first();
                    $package_status = $getPackage->package_name.'  &emsp; ($ '.$deposit.')';
                    //  $package_status = $getPackage->package_name.'  &emsp; ($ '.$deposit->amount.')';/
                }
            }
            
            else
            {
                $package_status = "Free user";
            }
            
             $tree .='<li class="tree-view closed"<a class="tree-name" id="test"></a><img src="https://profitearn.io/public/images/avatar-png-1.png" class="rounded-circle" alt="User Image" width="20" height="20">' .' <a onclick="getUserDetail('.$Category->id.')"> '. $Category->name .' ('. $package_status .')'. '</a>';

             if(count($Category->childs)) {
                $tree .=$this->childView($Category);
            }
        }
        $tree .='<ul>';
        $page = "unilevel-tree";
       return view('users.unilevel.index',compact('tree','page'));
    }
    
    
    
    
    
    
    public function admin_view_tree($id)
    {
     
        $tree='<ul id="browser" class="filetree"><li class="tree-view"></li>';
        $Categorys = User::where('ref_id',$id)->get();
       
        foreach ($Categorys as $Category) {
            $getuerPackage = UserPackagesPlan::where('user_id',$Category->id)->first();
            if($getuerPackage)
            {
                // $deposit = UserDepositFunds::where('id',$getuerPackage->deposit_id)->first();
                $deposit = UserDepositFunds::where('user_id',$Category->id)->where('status',1)->sum('amount');


                $getPackage = PackagesPlan::where('id',$getuerPackage->packages_plan_id)->first();
                $package_status = $getPackage->package_name.'  &emsp; ($ '.$deposit.')';
            }
            else
            {
                $package_status = "Free user";
            }
            
             $tree .='<li class="tree-view closed"<a class="tree-name" id="test" onclick="getUserDetail('.$Category->id.')"><img src="https://profitearn.io/public/images/avatar-png-1.png" class="rounded-circle" alt="User Image" width="20" height="20">' .' '. $Category->name .' ('. $package_status .')'. '</a>';
             if(count($Category->childs)) {
                $tree .=$this->childView($Category);
            }
        }
        $tree .='<ul>';
        $page = "unilevel-tree";
       return view('admin.users.unilevel',compact('tree','page'));
    }
    
    
    
    
    
    
    
    
    public function childView($Category){                 
            $html ='<ul>';
            foreach ($Category->childs as $arr) {
                
                
                $package_status="Free User";
                
                    
                    
                        $getuerPackage = UserPackagesPlan::where('user_id',$arr->id)->first();
                        if($arr->user_type=="paid")
                        {
                            //$deposit = UserDepositFunds::where('id',$getuerPackage->deposit_id)->first();
                            $deposit = UserDepositFunds::where('user_id',$arr->id)->where('status',1)->sum('amount');

                            $getPackage = PackagesPlan::where('id',$getuerPackage->packages_plan_id)->first();
                            $package_status = $getPackage->package_name.'  &emsp; ($ '.$deposit.')';
                            
                            
                            $html .='<li class="tree-view closed"><a class="tree-name" id="test"></a><img src="https://profitearn.io/public/images/user.png" class="rounded-circle" alt="User Image" width="20" height="20">' .' <a onclick="getUserDetail('.$arr->id.')"> '. $arr->name .' ('. $package_status .')'. '</a>';                 

                            $html.= $this->childView($arr);
                        }
                        else
                        {
                            $package_status = "Free user";
                             $html .='<li class="tree-view"><a class="tree-name" id="test"></a><img src="https://profitearn.io/public/images/avatar2.jpg" class="rounded-circle" alt="User Image" width="20" height="20">' .'<a onclick="getUserDetail('.$arr->id.')"> '. $arr->name .' ('. $package_status .')'. '</a>';                                
                             $html .="</li>";
                        }
                
                                   
            }
            
            $html .="</ul>";
            return $html;
    }    
    
    public function my_package()
    {

        $mypackages = DB::table("users_packages")->join('packages_plan', 'users_packages.packages_plan_id', '=', 'packages_plan.id')
        // ->where('users_packages.payment_status',1)
        ->where('users_packages.user_id',Auth::user()->id)
        ->select('users_packages.daily_profit as dailyprofit','users_packages.payment_status as paystatus','packages_plan.package_name','packages_plan.package_price','packages_plan.package_max_price','packages_plan.activation_charge')
        ->get();
        $page='packages';
        return view('users.packages_plan.my_packages',compact('mypackages','page'));
    }
    public function referralbounus()
    {

        // $mypackages = DB::table("users_packages")->join('packages_plan', 'users_packages.packages_plan_id', '=', 'packages_plan.id')
        // // ->where('users_packages.payment_status',1)
        // ->where('users_packages.user_id',Auth::user()->id)
        // ->select('users_packages.daily_profit as dailyprofit','users_packages.payment_status as paystatus','packages_plan.package_name','packages_plan.package_price','packages_plan.package_max_price','packages_plan.activation_charge')
        // ->get();
        $page='referral';
        $referrals_free = User::where('ref_id',Auth::user()->id)->where('user_type','free')->get();
        $referrals_paid = User::where('ref_id',Auth::user()->id)->where('user_type','paid')->get();

        return view('users.referrals.referral_bonus',compact('referrals_free','page','referrals_paid'));
    }
    
    public function buy_package()
    {

        $packages_plan = DB::table("packages_plan")->where('packages_plan.status',1)->select('*')
        ->get();
        $page='packages';
        return view('users.packages_plan.packages_plan',compact('packages_plan','page'));
    }
    
    public function preview_gateway_deposit_amount(Request $request)
    {
        $payment_method =PaymentMethods::find($request->paymentmethod); 
        $amount = $request->amount;
        $w_add = $request->w_address;
        $packages_plan_id = $request->package_id;
        $page='packages';
        return view('users.deposit_funds.preview_gateway_deposit_amount',compact('amount','payment_method','packages_plan_id','w_add','page'));
    }
    
    public function unilevel_profit()
    {
        $bonus = UnilevelTransaction::where('user_id',Auth::user()->id)->where('type','L')->get();
        $page = "unilevel-tree";
        return view('users.unilevel.level_profit',compact('bonus','page'));
    }
    
    
    
}
