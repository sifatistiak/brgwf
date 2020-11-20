@extends('adminlte::page')

@section('title', env('Site_Title', 'BRGWF') . ' Member Collection')

@section('content')
<style>
    @media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
  #cp {
    visibility: hidden;
  }
}
</style>
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
                                            <label class="col-md-2" for="membership_id">Membership No</label>
                                            <select class="form-control input-group col-md-3" name="membership_id"
                                                id="membership_id" required>
                                                <option value="">Select Member</option>
                                                @foreach ($members as $key => $value)
                                                    <option value="{{ $value->membership_no }}">{{ $value->membership_no }}
                                                        / {{ $value->full_name }}</option>
                                                @endforeach
                                            </select>

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
                                                    <td>From Date</td>
                                                    <td>To Date</td>
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
                                                        <input type="month" name="from_date" id="from_date" value="{{ date('Y-m') }}"
                                                            onchange="getVal(value);" required>
                                                    </td>
                                                    <td>
                                                        <input type="month" name="to_date" id="to_date" min="{{ date('Y-m') }}" value="{{ date('Y-m') }}" required>
                                                    </td>

                                                    <td>
                                                        <input type="number" name="amount" id="amount" value="0" min="0"
                                                            onClick="this.select();" required>
                                                    </td>
                                                    <td>
                                                        <button type="submit" disabled style="display: none"
                                                            aria-hidden="true"></button>
                                                        <input type="button" id="myBtn" onclick="generate();" value="Add Item"
                                                            class="btn btn-primary pull-right">
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                        <br><br>
                                        <div class="col-md-6" id="section-to-print" style="border:1px solid #ccc;">
                                            <h3>Collection Slip - {{ env('Site_Title', 'BRGWF') }}</h3>
                                            <hr>
                                            <div class="row px-4" style="display: flex; justify-content: space-between;">
                                                <span><b>Name : </b><span id="member_name"></span></span>
                                                <span><b>Membership No : </b><span id="member_no"></span></span>
                                            </div>
                                            <div class="row px-4" style="display: flex; justify-content: space-between;">

                                                <span><b>Transaction Date : </b><span>{{ date('d-M-Y') }}</span></span>
                                                <span><b>Type : </b><span> Subscription Fee </span></span>
                                            </div>

                                            <div class="row p-5" style="display: flex; justify-content: center;">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Month - Year</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dataval">

                                                    </tbody>

                                                </table>
                                            </div>

                                            <input type="hidden" name="t_amount" id="t_amount" required>
                                            <input type="submit" name="save" id="cp" value="Collect & Print" onClick="window.print();" class="mb-2 btn btn-primary pull-right">
                                        </div>
                                    </center>
                        </form>
                        {{-- <a class="btn btn-info" href="">Back to List</a>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('js')

    <script>
        $('#section-to-print').hide();
        document.getElementById("myBtn").disabled = true;

        function monthDiff(dateFrom, dateTo) {
            return dateTo.getMonth() - dateFrom.getMonth() +
                (12 * (dateTo.getFullYear() - dateFrom.getFullYear()))
        }

        function addMonths(date, months) {
            var d = date.getDate();
            date.setMonth(date.getMonth() + +months);
            if (date.getDate() != d) {
                date.setDate(0);
            }
            return date;
        }

        function getVal(e) {
            document.getElementById("to_date").min = e;
            document.getElementById("to_date").value = e;
        }

        function generate() {
            $('#section-to-print').show();

            var theMonths = ["January", "February", "March", "April", "May",
                "June", "July", "August", "September", "October", "November", "December"
            ];

            var tr = '';
            var t_amount = 0;
            var f = $('#from_date').val();
            var t = $('#to_date').val();
            var monthdiff = monthDiff(new Date(f), new Date(t)) + 1;

            for (let index = 0; index < monthdiff; index++) {

                let mnt = (theMonths[addMonths(new Date(f), index).getMonth()] + " " + addMonths(new Date(f), index)
                    .getFullYear());
                console.log(theMonths[addMonths(new Date(f), index).getMonth()] + " " + addMonths(new Date(f), index)
                    .getFullYear());
                var amount = parseFloat($('#amount').val());
                t_amount += parseFloat($('#amount').val());
                tr += `
                    <tr>
                        <td>${mnt}</td>
                        <td>${amount}/=</td>
                    </tr>
                    `;


            }

            tr += `<tr>
                        <th>Total</th>
                        <th>${t_amount}/=</th>
                    </tr>`;
            $('#dataval').html(tr);

            $('#t_amount').val(t_amount);

        }


        $('#membership_id').select2({
            'placeholder': 'Select Member'
        });


        $("#membership_id").on("change", function search(e) {
            var id = $(this).val();
            $.get("/collection-ajax/" + id, function(data) {
                console.log(data);
                $('#name').val(data.full_name);
                $('#ref_name').val(data.type);
                $('#member_name').text(data.full_name);
                $('#member_no').text(id);
                document.getElementById("myBtn").disabled = false;

            });
        });

    </script>
@stop
