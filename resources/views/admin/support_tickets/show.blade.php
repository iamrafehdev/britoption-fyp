@extends('admin.layouts.master')
@section('content')

    <div class="content-wrapper" style="min-height: 1923.5px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Ticket Detail
            </h1>

            <!--transaction detail-->
            <table class="table table-striped no-margin table-bordered">

                <tbody>

                <tr>
                    <th>#</th>
                    <td>{{$support_tickets->id}}</td>
                </tr>

                <tr>
                    <th>Ticket #</th>
                    <td>{{$support_tickets->ticket_no}}</td>
                </tr>

                <tr>
                    <th>Customer Name</th>
                    <td>{{$support_tickets->user->name}}</td>
                </tr>

                <tr>
                    <th>Subject</th>
                    <td>{{$support_tickets->subject}}</td>
                </tr>

                <tr>
                    <th>Department</th>
                    <td>{{$support_tickets->department}}</td>
                </tr>

                <tr>
                    <th>Description</th>
                    <td>{{$support_tickets->description}}</td>
                </tr>

                <tr>
                    <th>Image</th>
                    <td>
                        @if(isset($support_tickets->image))
                            <img src="{{asset('public/images/suport_tickets/'.$support_tickets->image)}}" width="500"
                                 height="500">
                        @endif
                    </td>
                </tr>


                <tr>
                    <th>Action</th>
                    <td>
                        @if($support_tickets->status!='Closed')
                            <form method="post" action="{{route('support_ticket.process', $support_tickets->id)}}">
                                {{csrf_field()}}

                                <button type="submit" name="status" value="Processing" class="btn btn-success btn-sm">
                                    Process
                                </button>
                                <button type="submit" name="status" value="Closed" class="btn btn-danger btn-sm">Close
                                </button>
                            </form>
                        @endif


                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <span class="badge badge-pill badge-danger">{{$support_tickets->status}}</span>
                    </td>
                </tr>


                </tbody>
            </table>
        </section>
    </div>
@endsection

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd5u1kK4p4BfLGg6HGweOHeG44ex40cgw&libraries=places,drawing&callback=initAutocomplete" async="" defer=""></script> -->
