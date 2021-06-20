<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;

use App\UnilevelTransaction;
use DB;
use Auth;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mypackages = DB::table("users_packages")->join('packages_plan', 'users_packages.packages_plan_id', '=', 'packages_plan.id')
        ->join('users_deposit_funds', 'users_packages.deposit_id', '=', 'users_deposit_funds.id')
        // ->where('users_packages.payment_status',1)
        ->where('users_packages.user_id',Auth::user()->id)
        ->select('users_packages.daily_profit as dailyprofit','users_packages.payment_status as status',
        'packages_plan.package_name','users_packages.trx_id as trx','users_packages.updated_at as date','users_deposit_funds.amount as amount')
        ->get();
        
        $page = "reports";
        return view('users.reports.index',compact('mypackages','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnilevelTransaction  $unilevelTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(UnilevelTransaction $unilevelTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnilevelTransaction  $unilevelTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(UnilevelTransaction $unilevelTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnilevelTransaction  $unilevelTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnilevelTransaction $unilevelTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnilevelTransaction  $unilevelTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnilevelTransaction $unilevelTransaction)
    {
        //
    }
}
