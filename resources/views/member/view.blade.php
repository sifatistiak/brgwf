@extends('adminlte::page')

@section('title', 'BRGWF Member List')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Member Lists</h3>
                    <a style="float: right" class="btn btn-primary pull-right" href="{{ route('export.members') }}"> Export To Excel </a>
                    <br>
                    <hr>
                    <form action="{{ route('member.filter') }}" method="post">
                        @csrf
                        <div class="row" style="display: flex; justify-content: center;">
                            <select name="box_type" id="box_type">
                                <option value="membership_no" selected>MemberID</option>
                                <option value="reg_no">RegNo</option>
                                <option value="nid">NID</option>
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
                            <input class="minimal" type="checkbox" name="is_active" id="is_active" value="1" checked style="margin-top: 7px; margin-right: 5px; margin-left: 20px;">
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
                                <th>Photo</th>
                                <th>
                                    ID (Membership No) <br>
                                    Card No / NID <br>
                                    Factory ID / Reg No
                                </th>
                                <th>
                                    Name <br>
                                    Father Name <br>
                                    Mother Name
                                </th>
                                <th>
                                    DOB <br>
                                    Religion <br>
                                    Gender
                                </th>
                                <th>
                                    Mobile <br>
                                    Blood Group
                                </th>
                                <th>
                                    Union <br>
                                    Factory
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                            <tr>
                                <td>
                                    <img src="{{ asset('member_image/'.$member->photo) }}" style="width:90px" onerror="this.onerror=null;this.src='{{ asset('member_image/no_photo.png') }}';">
                                </td>
                                <td>
                                    {{ $member->membership_no }} <br>
                                    {{ $member->nid }} <br>
                                    {{ $member->reg_no }}
                                </td>
                                <td>
                                    {{ $member->full_name }} <br>
                                    {{ $member->father_name }} <br>
                                    {{ $member->mother_name }}
                                </td>
                                <td>
                                    {{ date('d-M-y',strtotime($member->dob)) }} <br>
                                    {{ $member->religion->name ?? 'N/A' }} <br>
                                    {{ $member->gender }}
                                </td>
                                <td>
                                    {{ $member->mobile ?? 'N/A' }} <br>
                                    {{ $member->blood_group ?? 'N/A' }}
                                </td>
                                <td>
                                    {{ $member->union->name ?? 'N/A' }} <br>
                                    {{ $member->factory->name ?? 'N/A' }}
                                </td>
                                <td class="d-flex justify-content-between">
                                    <a href="{{ route('member.edit', $member->id) }}" class="btn btn-outline-info">&#9998; Edit</a>
                                    <a href="{{ route('training-assign.create') }}">Training</a>
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
        dom: 'Bfrtip',
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        buttons: [{
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            }
        ]
    })
</script>
@stop
