@extends('adminlte::page')

@section('title', 'BRGWF Member List')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Memeber Lists</h3>
                    <div class="d-flex" style="justify-content: flex-end;">
                        {{ $members->links() }}
                    </div>
                    <span class="float-right"><a class="btn btn-info" href="{{ route('member.create') }}">Add
                            New</a></span>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Member Name</th>
                                <th>No</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                            <tr>
                                <td> {{  $loop->index+1 }}</td>
                                <td> {{  $member->full_name }}</td>
                                <td> {{  $member->reg_no }}</td>
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
