@extends('adminlte::page')

@section('title', 'BRGWF Due Collection List')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">DUE লেনদেন তালিকা</h3>
                        <hr>

                        <div class="d-flex" style="justify-content: flex-end;">
                            {{ $members->links() }}
                        </div>
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
                                    <th>Last Collection Expiry</th>
                                    <th>Last Transaction Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $member->full_name }} / {{ $member->membership_no }}</td>
                                        <td>{{ $member->collection[0]->to_date ?? 'N/A' }}</td>
                                        <td>{{ $member->collection[0]->transaction_date ?? 'N/A' }}</td>
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
            dom: 'Bfrtip',
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            buttons: [{
                    extend: 'csvHtml5',
                    "charset": "utf-8"

                },
                {
                    extend: 'excelHtml5',
                    "charset": "utf-8"
                }
            ]
        })

    </script>
@stop
