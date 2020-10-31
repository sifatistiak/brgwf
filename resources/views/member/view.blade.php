@extends('adminlte::page')

@section('title', 'BRGWF Member List')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Memeber Lists</h3>
                    <form action="{{ route('member.filter') }}" method="post">
                        @csrf
                        <div class="row" style="display: flex; justify-content: center;">
                            <select name="box_type" id="box_type">
                                <option value="MemberID" selected>MemberID</option>
                                <option value="RegNo">RegNo</option>
                                <option value="NID">NID</option>
                            </select>
                            <input class="mx-2" type="text" name="box_value" id="box_value">
                            <label for="union">Union</label>
                            <select class="mx-2" name="union" id="union">
                                <option value="">Select One</option>
                                @foreach ($unions as $union)
                                <option value="{{ $union->id }}">{{ $union->name }}</option>
                                @endforeach
                            </select>
                            <label for="factory">Factory</label>
                            <select class="mx-2" name="factory" id="factory">
                                <option value="">Select One</option>
                                @foreach ($factories as $factory)
                                <option value="{{ $factory->id }}">{{ $factory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mt-2" style="display: flex; justify-content: center;">

                            <label for="sort">OrderBy</label>
                            <select class="mx-2" name="sort" id="sort">
                                <option value="ASC" selected>ASC</option>
                                <option value="DESC">DESC</option>
                            </select>
                            <input class="minimal" type="checkbox" name="is_active" id="is_active" value="1" checked
                                style="margin-top: 7px; margin-right: 5px; margin-left: 20px;">
                            <label for="is_active">Is Active</label>
                            <button type="submit" class="ml-4 btn btn-primary">Filter</button>
                        </div>
                    </form>
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
