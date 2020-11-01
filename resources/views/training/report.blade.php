@extends('adminlte::page')

@section('title', 'BRGWF Training List')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Training List</h3>
                    <hr>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Duration</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainings as $item)
                            <tr>
                                <td> {{ $loop->index+1 }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->code }} </td>
                                <td> {{ $item->duration }} </td>
                                <td>
                                    @if ($item->is_active)
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
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
