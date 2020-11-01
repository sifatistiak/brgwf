@extends('adminlte::page')

@section('title', 'BRGWF Collection List')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">লেনদেন তালিকা</h3>
                    <hr>
                    <form action="" method="post">
                        @csrf
                        <div class="row" style="display: flex; justify-content: center;">

                            <label for="bill_type">Account</label>
                            <select class="mx-2" name="bill_type" id="bill_type">
                                <option value="" selected>Select One</option>
                                <option value="Subscription Fee">Subscription Fee</option>
                                <option value="Others">Others</option>
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

                    <span class="float-right"><a class="btn btn-info" href="{{ route('collection.create') }}">Add
                            New</a></span>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>   Name of Member (Membership No)    </th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>May</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Aug</th>
                                <th>Sep</th>
                                <th>Oct</th>
                                <th>Nov</th>
                                <th>Dec</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $collection)
                            <tr>
                                <td> {{ $loop->index+1 }}</td>
                                <td> {{ $collection->name }} ( {{ $collection->membership_id }} )</td>
                                <td> {{ \App\Models\Models\Collection::where('membership_id', $collection->membership_id)->whereMonth('month', '01')->pluck('amount')->first() }}  </td>
                                <td> {{ \App\Models\Models\Collection::where('membership_id', $collection->membership_id)->whereMonth('month', '02')->pluck('amount')->first() }}  </td>
                                <td> {{ \App\Models\Models\Collection::where('membership_id', $collection->membership_id)->whereMonth('month', '03')->pluck('amount')->first() }}  </td>
                                <td> {{ \App\Models\Models\Collection::where('membership_id', $collection->membership_id)->whereMonth('month', '04')->pluck('amount')->first() }}  </td>
                                <td> {{ \App\Models\Models\Collection::where('membership_id', $collection->membership_id)->whereMonth('month', '05')->pluck('amount')->first() }}  </td>
                                <td> {{ \App\Models\Models\Collection::where('membership_id', $collection->membership_id)->whereMonth('month', '06')->pluck('amount')->first() }}  </td>
                                <td> {{ \App\Models\Models\Collection::where('membership_id', $collection->membership_id)->whereMonth('month', '07')->pluck('amount')->first() }}  </td>
                                <td> {{ \App\Models\Models\Collection::where('membership_id', $collection->membership_id)->whereMonth('month', '08')->pluck('amount')->first() }}  </td>
                                <td> {{ \App\Models\Models\Collection::where('membership_id', $collection->membership_id)->whereMonth('month', '09')->pluck('amount')->first() }}  </td>
                                <td> {{ \App\Models\Models\Collection::where('membership_id', $collection->membership_id)->whereMonth('month', '10')->pluck('amount')->first() }}  </td>
                                <td> {{ \App\Models\Models\Collection::where('membership_id', $collection->membership_id)->whereMonth('month', '11')->pluck('amount')->first() }}  </td>
                                <td> {{ \App\Models\Models\Collection::where('membership_id', $collection->membership_id)->whereMonth('month', '12')->pluck('amount')->first() }}  </td>

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
