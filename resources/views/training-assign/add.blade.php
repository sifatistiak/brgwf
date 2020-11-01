@extends('adminlte::page')

@section('title', 'BRGWF Training Add')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Assign Training</h3>
                    <hr>
                </div>
                <div class="clearfix"></div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('training-assign.store') }}" method="post">
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="training_id">Training Name</label>

                                <select name="training_id" id="training_id" class="form-control input-group col-md-10">
                                    <option></option>
                                    @foreach ($trainings as $training)
                                    <option value="{{ $training->id }}">{{ $training->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="ml-5 checkbox col-md-8 d-flex justify-content-between">
                            <label>
                                Is For Non Member ?
                                <input type="checkbox" name="is_for_non_member" value="1" onchange="ShowHideDiv(this)">
                            </label>
                        </div>
                        <br>

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="union">Unions</label>

                                <select name="union" id="union" class="form-control input-group col-md-4">
                                    <option></option>
                                    @foreach ($unions as $union)
                                    <option value="{{ $union->id }}">{{ $union->name }}</option>
                                    @endforeach
                                </select>

                                <span class="input-group-addon col-md-1"></span>

                                <label class="col-md-2" for="factory">Factory</label>
                                <select name="factory" id="factory" class="form-control input-group col-md-4">
                                    <option></option>
                                    @foreach ($factories as $factory)
                                    <option value="{{ $factory->id }}">{{ $factory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="member_name">Member Name</label>
                                <div id="for_member">
                                    <select name="member_name[]" id="member_name" multiple="multiple"
                                        class="input-group col-md-12 js-example-basic-multiple">
                                        <option></option>
                                        @foreach ($members as $member_name)
                                        <option value="{{ $member_name->full_name }}">{{ $member_name->full_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <span class="input-group-addon col-md-1"></span>

                                <label class="col-md-2" for="training_date">Training Date</label>
                                <input type="date" class="form-control input-group col-md-4" id="training_date"
                                    name="training_date">

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="trainer_id">Trainer Name</label>
                                <select name="trainer_id" id="trainer_id" class="form-control input-group col-md-4">
                                    <option></option>
                                    @foreach ($trainers as $trainer)
                                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                    @endforeach
                                </select>

                                <span class="input-group-addon col-md-1"></span>

                                <label class="col-md-2" for="organized_by">Organized By</label>
                                <input type="text" class="form-control input-group col-md-4" id="organized_by"
                                    name="organized_by">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="center_name">Center Name</label>
                                <input type="text" class="form-control input-group col-md-10" id="center_name"
                                    name="center_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="remarks">Remarks</label>
                                <input type="text" class="form-control input-group col-md-10" id="remarks"
                                    name="remarks">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                </form>

                <div class="box-footer mt-5">
                    <a href="{{ route('training.index') }}" class="btn btn-info">Back to List</a>
                    <button type="submit" class="btn btn-success float-right">Submit Create</button>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@stop
@section('js')
<script>
    $('#member_name').select2();
    $('#non_member_name').select2();
    $('#for_non_member').hide();

    function ShowHideDiv(chk) {
        var member_name = document.getElementById("member_name");
        var non_member_name = document.getElementById("non_member_name");
        if($(chk).is(":checked")){
            // $('#for_member').hide();
            var data = `<select name="member_name[]" id="member_name" multiple="multiple" class="js-example-basic-multiple input-group col-md-12">
                <option></option>
                @foreach ($nonmembers as $member_name)
                <option value="{{ $member_name->full_name }}">{{ $member_name->full_name }}
                </option>
                @endforeach
            </select>`;
            $('#for_member').html(data);
            $('#member_name').select2();

        }else{
           var data = `<select name="member_name[]" id="member_name" multiple="multiple" class="js-example-basic-multiple input-group col-md-12">
            <option></option>
            @foreach ($members as $member_name)
            <option value="{{ $member_name->full_name }}">{{ $member_name->full_name }}
            </option>
            @endforeach
        </select>`;
        $('#for_member').html(data);
        $('#member_name').select2();
        }
    }
</script>
@stop
