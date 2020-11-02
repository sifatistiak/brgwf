@extends('adminlte::page')

@section('title', 'BRGWF Due Collection List')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">DUE লেনদেন তালিকা ({{ $m . '/' . $year }})</h3>
                    <hr>
                    <form action="{{ route('due.filter') }}" method="post">
                        @csrf
                        <div class="row" style="display: flex; justify-content: center;">


                            <label for="filter">Select Month</label>
                            <input class="mx-2" type="month" name="filter" id="filter">

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
                                <th>Name of Member (Membership No) </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                            @php
                            $val = \App\Models\Models\Collection::where('membership_id', $member->membership_no)->whereMonth('month',$m)->whereYear('month',$year)->pluck('amount')->first();
                            @endphp
                            @if($val == null)
                            <tr>
                                <td> {{ $loop->index+1 }}</td>
                                <td> {{ $member->full_name }} ( {{ $member->membership_no }} )</td>

                            </tr>
                            @endif
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
        dom: 'Bfrtip',
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        buttons: [{
                extend: 'csvHtml5'

            },
            {
                extend: 'excelHtml5'
            },
            {
                extend: 'pdfHtml5'
            }
        ]
    })
</script>
@stop
