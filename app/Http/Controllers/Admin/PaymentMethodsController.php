<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentMethods;
class PaymentMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_methods = PaymentMethods::all();
        return view('admin.payment_methods.index',compact('payment_methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment_methods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $PaymentMethods = new PaymentMethods;
        $PaymentMethods->payment_method_name = $request->payment_method_name;
        $PaymentMethods->fee_percentage = $request->fee_percentage;

        if ($request->hasFile('payment_method_logo')) {
            $image = $request->file('payment_method_logo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/admin-theme/payment_method_logo');
            $image->move($destinationPath, $name);
            $PaymentMethods->payment_method_logo =$name; 
        }


        // $PaymentMethods->status = $request->status;
        $PaymentMethods->save();
        \Toastr::success('Payment methods created successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('/paymentmethods');    
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
        $PaymentMethods = PaymentMethods::find($id);
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
        $PaymentMethods = PaymentMethods::find($id);
        $PaymentMethods->payment_method_name = $request->payment_method_name;
        $PaymentMethods->fee_percentage = $request->fee_percentage;
        $PaymentMethods->status = $request->status;
        $PaymentMethods->save();
        \Toastr::success('Payment method updated successfully!', 'Complete', ["positionClass" => "toast-top-right"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PaymentMethods = PaymentMethods::find($id);
        $PaymentMethods->delete();
        \Toastr::success('Payment Method deleted successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('/paymentmethods');     }
}
