@extends('adminlte::page')

@section('title', env('Site_Title', 'BRGWF').' Expense')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="mb-0">Expense Entry</p>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('expense.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="col-md-2" for="pay_to">Pay To</label>
                                        <select name="pay_to" id="pay_to">
                                            <option>Select One</option>
                                            @foreach ($members as $member)
                                            <option value="{{ $member->membership_no }}">{{ $member->full_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-addon col-md-1"></span>
                                        <label class="col-md-2" for="trans_date">Trans Date</label>
                                        <input type="date" class="form-control input-group col-md-2" value="{{ date('Y-m-d') }}" readonly id="transaction_date" name="transaction_date">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="col-md-2" for="remarks">Remarks</label>
                                        <input type="text" class="form-control input-group col-md-7" id="remarks" name="remarks">

                                    </div>
                                </div>

                                <br>
                                <br>

                                <center>
                                    <table class="table table-bordered col-md-10 table-head-fixed">
                                        <thead>
                                            <tr>
                                                <td>Bill/Fees Head Name</td>
                                                <td>Month (Optional)</td>
                                                <td>Amount</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="bill_type" id="bill_type">
                                                        <option value="Purchase">Purchase</option>
                                                        <option value="Salary">Salary</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="month" name="month" id="month">
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
    $('#pay_to').select2();
</script>
@stop
