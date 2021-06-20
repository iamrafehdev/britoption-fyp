<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PackagesPlan;
class PackagesPlanController extends Controller
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
        $packagesplan->duration = $request->duration;
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
        $packagesplan->duration = $request->duration;

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
}
