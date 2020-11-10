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
                                        <label class="col-md-2" for="membership_id">Membership No</label>
                                        <select class="form-control input-group col-md-3" name="membership_id" id="membership_id">
                                            <option value="">Select Member</option>
                                            @foreach($members as $key => $value)
                                                <option value="{{ $value->membership_no }}">{{ $value->membership_no }} / {{ $value->full_name }}</option>
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
                                                <input type="date" name="from_date" id="from_date" required>
                                            </td>
                                            <td>
                                                <input type="date" name="to_date" id="to_date" required>
                                            </td>

                                            <td>
                                                <input type="number" name="amount" id="amount" value="0" min="0" required>
                                            </td>
                                            <td>
                                                <button type="submit" disabled style="display: none" aria-hidden="true"></button>
                                                <input type="submit" name="save" value="Add Item" class="btn btn-primary pull-right">
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                                </center>
                            </form>
                            {{-- <a class="btn btn-info" href="">Back to List</a> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('js')

<script>
    $('#membership_id').select2({
        'placeholder':'Select Member'
    });
$("#membership_id").on("change",function search(e) {
        var id = $(this).val();
        $.get( "/collection-ajax/"+id, function( data ) {
            console.log(data);
            $('#name').val(data.full_name);
            $('#ref_name').val(data.type);
        });
});
</script>
@stop
