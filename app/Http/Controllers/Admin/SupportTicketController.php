<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Commission;
use DB;
use App\SupportTicket;
use Auth;
use Mail;
use App\User;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = "support";
        $support_tickets = SupportTicket::orderBy('id', 'desc')->get();
        return view('admin.support_tickets.index',compact('support_tickets','page'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = "support";
        return view('users.support_tickets.create',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $support_ticket = new SupportTicket;
        $support_ticket->ticket_no = rand();
        $support_ticket->subject = $request->subject;
        $support_ticket->department = $request->department;
        $support_ticket->description = $request->description;
        $support_ticket->image = $request->screenshot_image;
        $support_ticket->status= 'open';
        $support_ticket->user_id = Auth::user()->id;
        if ($request->hasFile('screenshot_image')) {
            $image = $request->file('screenshot_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/suport_tickets');
            $image->move($destinationPath, $name);
            $support_ticket->image = $name;
          }
        $support_ticket->save();
        \Toastr::success('Ticket created successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('users/support_ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $support_tickets = SupportTicket::find($id);
        return view('admin.support_tickets.show',compact('support_tickets'));
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

    public function respondSupportTicket(Request $request, $id)
    {
        //  $this->validate($request,[
        //     'message' => 'required',
        // ]);
         SupportTicket::whereId($id)
        ->update([
            'status' => $request->status,
        ]);

        $support_ticket = SupportTicket::find($id);
        $user = User::find($support_ticket->user_id);

        $data = array('status'=>$request->status,'ticket_no'=>$support_ticket->ticket_no,'name'=>$user->name,'email'=>$user->email);
            $this->sendmail($data);

        \Toastr::success('Ticket Updated successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('admin/support_ticket');
    }

     public function sendmail($data)
        {
            //$data = array('desc'=>$msg,'name'=>$name);
                $email = $data['email'];
            Mail::send('emails.support_ticket', $data, function($message)use($email) {
             $message->to($email)->subject('Brit Option');
             $message->from('noreply@profitearn.io','Brit Option');
          });
        }
}
