<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Commission;
class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commission = DB::table('commissions')->take(1)->get();

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
    
     public function save_commission(Request $request)
    {
        
        $check = Commission::first()->id;
        
        
        if($check)
        {
            $commission =Commission::find($check);
            //$commission->direct_refferal = $request->direct_refferal;
            $commission->level_1 = $request->level_1;
            $commission->level_2 = $request->level_2;
            $commission->level_3 = $request->level_3;
            $commission->level_4 = $request->level_4;
            $commission->level_5 = $request->level_5;
            $commission->save();
        }
        
        else
        {
            $commission = new Commission;
            //$commission->direct_refferal = $request->direct_refferal;
            $commission->level_1 = $request->level_1;
            $commission->level_2 = $request->level_2;
            $commission->level_3 = $request->level_3;
            $commission->level_4 = $request->level_4;
            $commission->level_5 = $request->level_5;
            $save();
        }
            

        \Toastr::success('Commission updated successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('admin/setting');    

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $check = Commission::all();
        if($check)
        {
            $commission =Commission::find($check->id);
            //$commission->direct_refferal = $request->direct_refferal;
            $commission->level_1 = $request->level_1;
            $commission->level_2 = $request->level_2;
            $commission->level_3 = $request->level_3;
            $commission->level_4 = $request->level_4;
            $commission->level_5 = $request->level_5;
            $commission->save();
        }
        
        else
        {
            $commission = new Commission;
            //$commission->direct_refferal = $request->direct_refferal;
            $commission->level_1 = $request->level_1;
            $commission->level_2 = $request->level_2;
            $commission->level_3 = $request->level_3;
            $commission->level_4 = $request->level_4;
            $commission->level_5 = $request->level_5;
            $save();
        }
            

       // $packagesplan->six_month_profit = $request->six_month_profit;
       // $packagesplan->note = $request->note;
        $commission->save();
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
        // $packagesplan = PackagesPlan::find($id);
        // return view('admin.packages_plan.edit',compact('packagesplan'));
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
        // $packagesplan = PackagesPlan::find($id);
        // $packagesplan->delete();
        // \Toastr::success('Package deleted successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        // return redirect('/packagesplan');     
    }
}
