@extends('users.layouts.master')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption uppercase bold"><i class="fa fa-plus"></i> Perfect Money Payment</div>
                        </div>
                        <div class="portlet-body">
                           <form action="https://perfectmoney.is/api/step1.asp" method="POST" id="myform">
                            <input type="hidden" name="PAYEE_ACCOUNT" value="U19558310">
                            <input type="hidden" name="PAYEE_NAME" value="Capital Investment Plan">
                            <input type="hidden" name="PAYMENT_ID" value="{{$package_plan_id}}">
                            <input type="text"   name="PAYMENT_AMOUNT" value="{{$amount}}"><BR>
                            <input type="hidden" name="PAYMENT_UNITS" value="USD">
                            <input type="hidden" name="STATUS_URL" value="">
                            <input type="hidden" name="PAYMENT_URL" value="http://capitalinvests.us/users/perfect-money-success-deposit">
                            <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
                            <input type="hidden" name="NOPAYMENT_URL" value="http://capitalinvests.us/users/perfect-money-unsuccess-deposit">
                            <input type="hidden" name="NOPAYMENT_URL_METHOD" value="GET">
                            <input type="hidden" name="SUGGESTED_MEMO" value="{{Auth::user()->username}}">
                            <input type="hidden" name="BAGGAGE_FIELDS" value="">
                            <input type="submit" name="PAYMENT_METHOD" value="Pay Now!">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
document.getElementById("myform").submit();
</script>
@endsection

