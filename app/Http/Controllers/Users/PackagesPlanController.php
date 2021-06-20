<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserPackagesPlan;
use App\PackagesPlan;
use App\UserDepositFunds;
use Auth;
class PackagesPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function confirm_package($id)
    {
        $package = PackagesPlan::find($id);
        $page='packages';
        return view('users.packages_plan.confirm_package_plan',compact('package','page'));
    }


    public function buy_packageplan($id)
    {
        $user_id = Auth::user()->id;
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
        $page = 'dashboard';
        return redirect('/users-dashboard',compact('page'));


        //return view('users.packages_plan.confirm_package_plan',compact('package'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packages_plan.create');
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
}
