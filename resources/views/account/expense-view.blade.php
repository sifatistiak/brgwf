@extends('adminlte::page')

@section('title', 'BRGWF Expense List')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Expense List</h3>
                    <hr>
                    <form action="{{ route('expense.filter') }}" method="post">
                        @csrf
                        <div class="row" style="display: flex; justify-content: center;">

                            <label for="bill_type">Account</label>
                            <select class="mx-2" name="bill_type" id="bill_type">
                                <option value="" selected>Select One</option>
                                <option value="Purchase">Purchase</option>
                                <option value="Salary">Salary</option>
                            </select>

                            <label for="from_date">Select Date From</label>
                            <input class="mx-2" type="date" name="from_date" id="from_date">
                            <label for="to_date">To</label>
                            <input class="mx-2" type="date" name="to_date" id="to_date">

                            <button type="submit" class="ml-4 btn btn-primary">Filter</button>
                        </div>
                    </form>

                    <br>
                    <br>

                    <span class="float-right"><a class="btn btn-info" href="{{ route('expense.create') }}">Add
                            New</a></span>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Voucher No</th>
                                <th>Voucher Date</th>
                                <th>Paid Amount</th>
                                <th>Paid Month</th>
                                <th>Paid to ID</th>
                                <th>Paid to Name</th>
                                <th>Bill Head</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $expense)
                            <tr>
                                <td> {{ $loop->index+1 }}</td>
                                <td> #E-{{ $expense->id }}</td>
                                <td> {{ $expense->transaction_date }}</td>
                                <td> {{ $expense->amount }}</td>
                                <td> {{ $expense->month }}</td>
                                <td> {{ $expense->pay_to }}</td>
                                <td> {{ $expense->member->full_name }}</td>
                                <td> {{ $expense->bill_type }}</td>
                                <td> {{ $expense->remarks }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@stop
@section('js')
<script>
    $('#example1').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true
    })
</script>
@stop
