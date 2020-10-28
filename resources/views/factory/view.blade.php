@extends('adminlte::page')

@section('title', 'BRGWF Factory List')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Factory Lists</h3>
                    <span class="float-right"><a class="btn btn-info" href="{{ route('factory.create') }}">Add New</a></span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Factory Name</th>
                                <th>Phone</th>
                                <th>Permanent Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($factories as $factory)
                            <tr>
                                <td> {{ $loop->index+1 }} </td>
                                <td> {{ $factory->name }} </td>
                                <td> {{ $factory->phone }} </td>
                                <td> {{ $factory->permanent_address }} </td>

                                <td class="d-flex justify-content-between">
                                    <a href="{{ route('factory.edit', $factory->id) }}"class="btn btn-outline-info">&#9998; Edit </a>
                                    {{ Form::open(['route' => ['factory.destroy', $factory->id], 'method' => 'delete']) }}
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
