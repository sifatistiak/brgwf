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
                    <form action="{{ route('tr-report.filter') }}" method="post">
                        @csrf
                        <div class="row" style="display: flex; justify-content: center;">

                            <label for="training">Training Name</label>
                            <select class="mx-2" name="training" id="training">
                                <option value="" selected>Select One</option>
                                @foreach ($trainings as $training)
                                <option value="{{ $training->id }}"> {{ $training->name }}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="ml-4 btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Training</th>
                                <th>Member Name</th>
                                <th>Trainer</th>
                                <th>Training Date</th>
                                <th>Duration</th>
                                <th>Center Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($training_member_maps as $item)
                            <tr>
                                <td> {{ $loop->index+1 }} </td>
                                <td> {{ $item->training->name }} </td>
                                <td> {{ $item->member_name }} </td>
                                <td> {{ $item->trainer->name }} </td>
                                <td> {{ date('d/m/Y',strtotime($item->training_date)) }} </td>
                                <td> {{ $item->training->duration }} </td>
                                <td> {{ $item->center }} </td>
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
