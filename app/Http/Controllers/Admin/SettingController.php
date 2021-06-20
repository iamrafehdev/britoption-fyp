<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PackagesPlan;
use DB;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commission = DB::table('commissions')->take(1)->first();

        return view('admin.setting.index',compact('commission'));
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
        $packagesplan = new PackagesPlan;
        $packagesplan->package_name = $request->package_name;
        $packagesplan->package_price = $request->package_price;
        $packagesplan->package_max_price = $request->package_max_price;
        $packagesplan->daily_profit = $request->daily_profit;
        $packagesplan->activation_charge = $request->activation_charge;
       // $packagesplan->six_month_profit = $request->six_month_profit;
       // $packagesplan->note = $request->note;
        $packagesplan->save();
        \Toastr::success('Package created successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('/packagesplan');    
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
        $packagesplan = PackagesPlan::find($id);
        return view('admin.packages_plan.edit',compact('packagesplan'));
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
        $request->package_name;
        $packagesplan = PackagesPlan::find($id);
        $packagesplan->package_name = $request->package_name;
        $packagesplan->package_price = $request->package_price;
        $packagesplan->package_max_price = $request->package_max_price;
        $packagesplan->daily_profit = $request->daily_profit;
        $packagesplan->activation_charge = $request->activation_charge;
        $packagesplan->status = $request->status;
        
        $packagesplan->home_visible = $request->home_visible;
        $packagesplan->save();
        \Toastr::success('Package updated successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('/packagesplan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $packagesplan = PackagesPlan::find($id);
        $packagesplan->delete();
        \Toastr::success('Package deleted successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('/packagesplan');     
    }
    
    public function ChangeWithdrawStatus(Request $request)
    {
        DB::table('settings')->update(['withdraw_status' => $request->status]);
    }

    public function ChangeRoiStatus(Request $request)
    {
        DB::table('settings')->update(['roi_status' => $request->status]);
    }
    
    public function ChangeMaintenanceStatus(Request $request)
    {
        DB::table('settings')->update(['maintenance_status' => $request->status]);
    }
    
    public function withdarw_limit(Request $request)
    {
      DB::table('settings')->update(['withdraw_limit' => $request->withdraw_limit]);
      \Toastr::success('Withdraw limit updated successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('admin/setting');   

    }
}
