<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PackagesPlan;
use App\User;
use App\UserDepositFunds;
use App\UserWithdrawFunds;
use App\UserPayments;
use App\UnilevelTransaction;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('users');
    }

    public function index()
    {
        
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

    
    public function user_profile($id)
    {   
        // echo $id; die;
        $users = User::find($id);
        $user_packagesplan = PackagesPlan::Join('users_packages','packages_plan.id','=','users_packages.packages_plan_id')
        ->join('users','users_packages.user_id','=','users.id')
        ->select('packages_plan.*','users.id as u_id','users.name')
        ->where('users_packages.user_id',$id)
        ->get();

        $user_deposit_funds = UserDepositFunds::Join('packages_plan','users_deposit_funds.package_plan_id','=','packages_plan.id')
        ->join('users','users_deposit_funds.user_id','=','users.id')
        ->select('packages_plan.*','users_deposit_funds.amount','users_deposit_funds.created_at as created_date')
        ->where('users_deposit_funds.user_id',$id)
        ->get();

        $user_withdraw_funds = UserWithdrawFunds::where('users_withdraw_funds.user_id',$id)
        ->orderBy('id', 'desc')
        ->get();

        $user_daily_earning = UserPayments::where('users_payments.user_id',$id)
        ->orderBy('id', 'desc')
        ->get();
        
        $bonus = UnilevelTransaction::where('user_id',$id)->where('type','L')->get();

        
        $page='profile';

        return view('users.users.user_profile',compact('users','user_packagesplan','user_deposit_funds','user_daily_earning','user_withdraw_funds','page','bonus'));
    }
    
    public function free_users()
    {
       $users = User::where('user_type','free')->where('role','0')->get(); 
       return view('admin.users.free_users',compact('users'));
    }
    
    public function paid_users()
    {
        $users = User::where('user_type','paid')->where('role','0')->get(); 
       return view('admin.users.paid_users',compact('users'));
    }
    
    public function banned_users()
    {
        $users = User::where('status','2')->where('role','0')->get(); 
       return view('admin.users.banned_users',compact('users'));
    }
    
    public function edit_user_profile()
    { 
        $page='profile';
        $user = Auth::user();
        return view('users.users.user_edit_profile',compact('page','user'));
    }
    

    
    public function save_user_profile_info(Request $request)
    {  
        
         $user = User::find(Auth::user()->id);
         
          if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/profile_pictures');
            $image->move($destinationPath, $name);
            $user = User::find(Auth::user()->id);
            $user->profile_image = $name;
          }
         $user->dob = $request->dob;
         $user->name = $request->name;
         $user->gender = $request->gender;
         $user->phone = $request->phone;
         $user->country = $request->country;
         $user->city = $request->city;
         $user->zip_code = $request->zip_code;
         $user->street_address = $request->street_address;
         $user->save();
        
        \Toastr::success('Profile Updated successfully!', 'Complete', ["positionClass" => "toast-top-right"]);

         return redirect('users/edit-user-profile');
    }
    
    public function save_user_profile_verification_info(Request $request)
    {  
        
         $user = User::find(Auth::user()->id);
         
          if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/profile_pictures');
            $image->move($destinationPath, $name);
            $user = User::find(Auth::user()->id);
            $user->profile_image = $name;
          }
         $user->dob = $request->dob;
         $user->name = $request->name;
         $user->gender = $request->gender;
         $user->phone = $request->phone;
         $user->country = $request->country;
         $user->city = $request->city;
         $user->zip_code = $request->zip_code;
         $user->street_address = $request->street_address;
         $user->save();
        \Toastr::success('Profile Updated successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
         return redirect('users-dashboard');
    }
    
    public function get_profile()
    {
        return view('users.users.user_profile_verification');
    }
    
    public function getTreeUserDetail(Request $request)
    {   
        $id = $request->userID;
        $users = User::find($id);
        $deposit = UserDepositFunds::where('user_id',$id)->sum('amount');
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
        ->orderBy('id', 'desc')
        ->paginate(10);

        $user_daily_earning = UserPayments::where('users_payments.user_id',$id)
        ->orderBy('id', 'desc')
        ->paginate(10);
        
        $bonus = UnilevelTransaction::where('user_id',$id)->where('type','L')->sum('amount');
        $data = array('user'=>$users,'deposit'=>$deposit,'level_amount'=>$bonus);
        return $data;
    }
    
}
