@extends('adminlte::page')

@section('title', 'BRGWF Member Collection')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="mb-0">Collection</p>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('collection.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="col-md-2" for="membership">Membership No</label>
                                        <input type="text" class="form-control input-group col-md-3" id="membership"
                                            name="membership">
                                        <span class="input-group-addon col-md-1"></span>
                                        <label class="col-md-2" for="trans_date">Trans Date</label>
                                        <input type="date" class="form-control input-group col-md-3"
                                            value="{{ date('Y-m-d') }}" readonly id="transaction_date"
                                            name="transaction_date">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="col-md-2" for="name">Name</label>
                                        <input type="text" class="form-control input-group col-md-3" id="name"
                                            name="name" readonly>
                                        <span class="input-group-addon col-md-1"></span>
                                        <label class="col-md-2" for="ref_name">Ref Name</label>
                                        <input type="text" class="form-control input-group col-md-3" id="ref_name"
                                            name="ref_name" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="col-md-2" for="remarks">Remarks</label>
                                        <input type="text" class="form-control input-group col-md-9" id="remarks"
                                        name="remarks">

                                    </div>
                                </div>

                                <br>
                                <br>

                                <center>
                                <table class="table table-bordered col-9 table-head-fixed">
                                    <thead>
                                        <tr>
                                            <td>Bill/Fees Head Name</td>
                                            <td>From Month</td>
                                            <td>To Month</td>
                                            <td>Amount</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="bill_type" id="bill_type">
                                                    <option value="Subscription Fee">Subscription Fee</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="month" name="from_month" id="from_month">
                                            </td>
                                            <td>
                                                <input type="month" name="to_month" id="to_month">
                                            </td>
                                            <td>
                                                <input type="number" name="amount" id="amount" value="0" min="0">
                                            </td>
                                            <td>
                                                <input type="submit" name="save" value="Add Item" class="btn btn-primary pull-right">
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                                </center>

                            </form>
                            <a class="btn btn-info" href="">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('js')

<script>
   
</script>
@stop
