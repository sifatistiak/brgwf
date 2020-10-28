@extends('adminlte::page')

@section('title', 'BRGWF Union List')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Union Lists</h3>
                    <span class="float-right"><a class="btn btn-info" href="{{ route('union.create') }}">Add New</a></span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Union Name</th>
                                <th>Contact Person</th>
                                <th>Phone</th>
                                <th>Active</th>
                                <th>CBA</th>
                                <th>OSH Committee</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unions as $union)
                            <tr>
                                <td> {{ $loop->index+1 }} </td>
                                <td> {{ $union->name }} </td>
                                <td> {{ $union->contact_person }} </td>
                                <td> {{ $union->phone }} </td>
                                <td>
                                    @if ($union->is_active)
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($union->is_cba)
                                    <span class="badge bg-success">&#10003;</span>
                                    @else
                                    <span class="badge bg-danger">&#10005;</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($union->is_osh)
                                    <span class="badge bg-success">&#10003;</span>
                                    @else
                                    <span class="badge bg-danger">&#10005;</span>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-between">
                                    <a href="{{ route('union.edit', $union->id) }}" class="btn btn-outline-info">&#9998; Edit</a>

                                    {{ Form::open(['route' => ['union.destroy', $union->id], 'method' => 'delete']) }}
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
        'paging' : true,
        'lengthChange': true,
        'searching' : true,
        'ordering' : true,
        'info' : true,
        'autoWidth' : true
        })
</script>
@stop
