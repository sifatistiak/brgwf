@extends('adminlte::page')

@section('title', 'BRGWF Factory Category List')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Factory Category Lists</h3>
                    <span class="float-right"><a class="btn btn-info" href="{{ route('factory-category.create') }}">Add New</a></span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Remark</th>

                                <th>Active</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($factory_cats as $fc)
                            <tr>
                                <td> {{ $loop->index+1 }} </td>
                                <td> {{ $fc->name }} </td>
                                <td> {{ $fc->remark }} </td>
                                <td>
                                    @if ($fc->status)
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>

                                <td class="d-flex justify-content-between">
                                    <a href="{{ route('factory-category.edit', $fc->id) }}" class="btn btn-outline-info">&#9998; Edit</a>

                                    {{ Form::open(['route' => ['factory-category.destroy', $fc->id], 'method' => 'delete']) }}
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
