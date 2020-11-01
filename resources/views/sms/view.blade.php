@extends('adminlte::page')

@section('title', 'BRGWF SMS List')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">SMS List</h3>
                    <br>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                        Push SMS
                    </button>
                    <br>
                    <hr>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Number</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td> {{ $loop->index+1 }} </td>
                                <td> {{ $item->number }} </td>
                                <td> {{ $item->message }} </td>
                                <td> {{ date('Y-m-d h:i:s a',strtotime($item->created_at)) }}</td> </td>
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

<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Send SMS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('sms.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <label for="number">Send To (BD Cell No)</label>
                    <input type="text" name="number" id="number" class="form-control">
                    <label for="message">Send Message</label>
                    <input type="text" name="message" id="message" class="form-control">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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
