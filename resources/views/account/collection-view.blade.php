@extends('adminlte::page')

@section('title', 'BRGWF Collection List')

@section('content')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Collection List</h3>
                        <hr>
                            @csrf
                            <div class="row" style="display: flex; justify-content: center;">

                                {{-- <label for="bill_type">Account</label>
                                <select class="mx-2" name="bill_type" id="bill_type">
                                    <option value="" selected>Select One</option>
                                    <option value="Subscription Fee">Subscription Fee</option>
                                    <option value="Others">Others</option>
                                </select> --}}

                                <label for="from_date">Select Date From</label>
                                <input class="mx-2" type="text" name="from_date" id="from_date" autocomplete="off">
                                <label for="to_date">To</label>
                                <input class="mx-2" type="text" name="to_date" id="to_date" autocomplete="off">
                            </div>


                                <div class="row mt-3" style="display: flex; justify-content: center;">
                                    <label class="mr-4">Member</label>
                                    <div id="member"></div>
                                    <div id="member2"></div>
                                </div>
                                {{-- <select class="mx-2" name="member" id="member">
                                    <option value="">Select One</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->full_name }}</option>
                                    @endforeach
                                </select> --}}

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
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Receive Amount</th>
                                    <th>Receive Date</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collections as $collection)
                                    <tr>
                                        <td> {{ $loop->index + 1 }}</td>
                                        <td> {{ $collection->membership_id }}</td>
                                        <td> {{ $collection->name }}</td>
                                        <td> {{ $collection->bill_type }}</td>
                                        <td> {{ date('d-M-Y', strtotime($collection->from_date)) }}</td>
                                        <td> {{ date('d-M-Y', strtotime($collection->to_date)) }}</td>
                                        <td> {{ $collection->amount }}</td>
                                        <td> {{ date('d-M-Y', strtotime($collection->transaction_date)) }}</td>
                                        <td> {{ $collection->remarks }}</td>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous"></script>

        <script>
        $.fn.datepicker.defaults.format = "dd-M-yyyy";
        $('#example').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        });

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#from_date').datepicker("getDate");
                var max = $('#to_date').datepicker("getDate");
                var fromDate = new Date(data[4]);
                var toDate = new Date(data[5]);

                if (min == null && max == null) {
                    return true;

                }
                if (max == null && fromDate >= min) {
                    return true;
                }
                if (min == null && toDate <= max) {
                    return true;
                }
                if (fromDate >= min && toDate <= max) {
                    return true;
                }
                return false;
            }
        );


        $("#from_date").datepicker({
            // format: 'dd/mm/yyyy',
            onSelect: function() {
                table.draw();
            },
            changeMonth: true,
            changeYear: true
        });
        $("#to_date").datepicker({
            // format: 'dd/mm/yyyy',
            onSelect: function() {
                table.draw();
            },
            changeMonth: true,
            changeYear: true
        });
        // var table = $('#example1').DataTable();

        // Event listener to the two range filtering inputs to redraw on input
        $('#from_date, #to_date').change(function() {
            table.draw();
        });

        $('#example1').DataTable( {
        initComplete: function () {
            this.api().columns([1]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $('#member') )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
            this.api().columns([2]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $('#member2') )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
        $('#member>select , #member2>select').select2();

    </script>
@stop
