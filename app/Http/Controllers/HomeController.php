<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PackagesPlan;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth','verified']);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $packages_list = PackagesPlan::where('home_visible',1)->get();
        return view('frontend.home.index',compact('packages_list'));
    }

    public function about_us()
    {
        return view('frontend.about_us.index');
    }

    public function our_work()
    {
        return view('frontend.our_work.index');
    }

    public function contact_us()
    {
        return view('frontend.contact_us.index');
    }
    public function package()
    {
        return view('frontend.packages.index');
    }
    public function unilevel()
    {
        return view('frontend.unilevel.index');
    }
    public function term()
    {
        return view('frontend.term.index');
    }
    public function referral()
    {
        return view('frontend.referral.index');
    }
   
    public function how_itswork()
    {
        return view('frontend.how_itswork.index');
    }
    
    public function our_services()
    {
        return view('frontend.services.index');
    }
    
    public function covid()
    {
         return view('frontend.covid.index');
    }
    
    public function faq()
    {
         return view('frontend.faq.index');
    }
    
    public function profile()
    {
         return view('frontend.media.profile');
    }
    
    public function company_profile()
    {
         return view('frontend.media.company_profle');
    }
    
    public function motivational_banner()
    {
         return view('frontend.media.motivational_banner');
    }
    
    public function promo_banner()
    {
         return view('frontend.media.promo_banner');
    }
    
    public function calculate_daily_profit(Request $request)
    {
        $amount = $request->amount;
        $packages = PackagesPlan::where('package_max_price','>=',$amount)
            ->where('package_price','<=',$amount)->first();
            $total_profit = $request->amount/100*$packages->daily_profit;
            
            $data = array('duration'=>$packages->duration,'daily_profit'=>$packages->daily_profit,'total_profit'=>round($total_profit*$packages->duration,2),'package'=>$packages->package_name);
            return $data;
    }
    
    public function check_email_available(Request $request)
    {
         if($request->email)
         {
          $email = $request->email;
          $data = DB::table("users")
           ->where('email', $email)
           ->count();
              if($data > 0)
              {
               echo 'not_unique';
              }
              else
              {
               echo 'unique';
              }
         }
    }
    
    public function check_username_available(Request $request)
    {
         if($request->username)
         {
          $username = $request->username;
          $data = DB::table("users")
           ->where('username', $username)
           ->count();
              if($data > 0)
              {
               echo 'not_unique';
              }
              else
              {
               echo 'unique';
              }
         }
    }
    
    public function maintenance_mode()
    {
        return view('maintenance_mode');
    }
}
