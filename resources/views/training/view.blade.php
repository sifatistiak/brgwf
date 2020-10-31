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
                    <span class="float-right"><a class="btn btn-info" href="{{ route('training.create') }}">Add New</a></span>
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
                                <th>Action</th>
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

                                <td class="d-flex justify-content-between">
                                    <a href="{{ route('training.edit', $item->id) }}" class="btn btn-outline-info">&#9998; Edit</a>

                                    {{ Form::open(['route' => ['training.destroy', $item->id], 'method' => 'delete']) }}
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                    {{ Form::close() }}
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
