@extends('adminlte::page')

@section('title', 'BRGWF Trainer List')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Trainer List</h3>
                    <hr>
                    <span class="float-right"><a class="btn btn-info" href="{{ route('trainer.create') }}">Add
                            New</a></span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Mobile No</th>
                                <th>Email</th>
                                <th>Course No</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainers as $item)
                            <tr>
                                <td> {{ $loop->index+1 }} </td>
                                <td>
                                    <img src="{{ asset('trainer_image/'.$item->photo) }}" style="width:90px" onerror="this.onerror=null;this.src='{{ asset('member_image/no_photo.png') }}';">
                                </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->department->name }} </td>
                                <td> {{ $item->designation->name }} </td>
                                <td> {{ $item->mobile }} </td>
                                <td> {{ $item->email }} </td>
                                <td> {{ $item->course->name }} </td>
                                <td class="d-flex justify-content-between">
                                    <a href="{{ route('trainer.edit', $item->id) }}" class="btn btn-outline-info">&#9998; Edit</a>

                                    {{ Form::open(['route' => ['trainer.destroy', $item->id], 'method' => 'delete']) }}
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
