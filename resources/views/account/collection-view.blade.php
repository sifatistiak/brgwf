@extends('adminlte::page')

@section('title', 'BRGWF Collection List')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Collection List</h3>
                    <hr>
                    <form action="{{ route('collection.filter') }}" method="post">
                        @csrf
                        <div class="row" style="display: flex; justify-content: center;">

                            <label for="bill_type">Account</label>
                            <select class="mx-2" name="bill_type" id="bill_type">
                                <option selected>Select One</option>
                                <option value="Subscription Fee">Subscription Fee</option>
                                <option value="Others">Others</option>
                            </select>

                            <label for="from_date">Select Date From</label>
                            <input class="mx-2" type="date" name="from_date" id="from_date">
                            <label for="to_date">To</label>
                            <input class="mx-2" type="date" name="to_date" id="to_date">

                            <label for="member">Member</label>
                            <select class="mx-2" name="member" id="member">
                                <option value="">Select One</option>
                                @foreach ($members as $member)
                                <option value="{{ $member->id }}">{{ $member->full_name }}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="ml-4 btn btn-primary">Filter</button>
                        </div>
                    </form>

                    <br>
                    <br>

                    <span class="float-right"><a class="btn btn-info" href="{{ route('collection.create') }}">Add
                            New</a></span>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Membership No</th>
                                <th>Name of Member</th>
                                <th>Receive No</th>
                                <th>Receive Amount</th>
                                <th>Receive Date</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $collection)
                            <tr>
                                <td> {{  $loop->index+1 }}</td>
                                <td> {{  $collection->membership_id }}</td>
                                <td> {{  $collection->name }}</td>
                                <td> {{  $collection->bill_type }}</td>
                                <td> {{  $collection->amount }}</td>
                                <td> {{  $collection->transaction_date}}</td>
                                <td> {{  $collection->remarks }}</td>
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
