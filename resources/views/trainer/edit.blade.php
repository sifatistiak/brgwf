@extends('adminlte::page')

@section('title', 'BRGWF Trainer Edit')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.swf">
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Trainer Edit</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('trainer.update',$trainer->id) }}"
                        enctype="multipart/form-data" method="post">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="unique_id">Unique ID</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="unique_id" name="unique_id" required="required"
                                            type="text" value="{{ $trainer->unique_id }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="organization">Organization</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="organization" name="organization"
                                            value="{{ $trainer->organization }}" type="text">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4" for="name">Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="name" name="name" required="required"
                                            type="text" value="{{ $trainer->name }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="gender">Gender</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="Male" {{ ($trainer->gender == "Male") ? "selected" : "" }}>
                                                Male</option>
                                            <option value="Female"
                                                {{ ($trainer->gender == "Female") ? "selected" : "" }}>Female</option>
                                            <option value="Other" {{ ($trainer->gender == "Other") ? "selected" : "" }}>
                                                Other</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="dob">Date Of Birth</label>
                                    <div class="col-md-9">
                                        <input class="form-control datepicker" id="dob" name="dob" type="date"
                                            value="{{ $trainer->dob }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="department_id">Department</label>
                                    <div class="col-md-11">
                                        <select class="form-control" id="department_id" name="department_id">
                                            <option value="">Select One</option>
                                            @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ ($department->id == $trainer->department_id)?"selected":'' }}>
                                                {{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="designation_id">Designation</label>
                                    <div class="col-md-11">
                                        <select class="form-control" id="designation_id" name="designation_id">
                                            <option value="">Select One</option>
                                            @foreach ($designations as $designation)
                                            <option value="{{ $designation->id }}"
                                                {{ ($designation->id == $trainer->designation_id)?"selected":'' }}>
                                                {{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="course_id">Main Course</label>
                                    <div class="col-md-11">
                                        <select class="form-control" id="course_id" name="course_id">
                                            <option value="">Select One</option>
                                            @foreach ($courses as $course)
                                            <option value="{{ $course->id }}"
                                                {{ ($course->id == $trainer->course_id)?"selected":'' }}>
                                                {{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="input-group input-group-sm">
                                    <label class="control-label col-md-12" for="photo">Photo</label>
                                    <input accept="image/*" class="form-control col-md-5" id="photo" name="photo"
                                        onchange="readURL(this);" type="file" style="height:auto;">
                                    <span class="input-group-btn">
                                        <a id="webcam" class="form-control btn btn-success" onclick="showCamera();"> <i
                                                class="fa fa-camera"> &nbsp; Use Camera</i> </a>
                                    </span>

                                </div>


                                <img id="blah" class="img-thumbnail" src="{{ asset('trainer_image/'.$trainer->photo) }}"
                                    style="float:left; width:250px; height:200px; margin-right:10px; margin-top: 25px;">


                                <div class="row col-md-6">

                                    <div id="my_camera" style="width:250px; height:250px;"></div>

                                </div>
                                <a id="takesnap" class="btn btn-warning" href="javascript:void(take_snapshot())">Take
                                    Snapshot</a>
                                <a id="close" class="btn btn-danger" href="javascript:void(hideCamera())">Close</a>

                                <input id="webimg" type="hidden" name="webimg" value="" />

                                <div class="clearfix"></div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="mobile">Mobile</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="mobile" name="mobile" type="text"
                                            value="{{ $trainer->mobile }}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-2" for="nid">NID No</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="nid" name="nid" type="text"
                                            value="{{ $trainer->nid }}">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5" for="present_address">Present Address</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" cols="20" id="present_address"
                                            name="present_address" rows="3">{{ $trainer->present_address }}</textarea>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2" for="is_active">
                                <input id="is_active" name="is_active" value="1" type="checkbox" class="minimal"
                                    {{ ($trainer->is_active == 1) ? 'checked' : ''}}>
                                Is Active
                            </label>
                        </div>

                        <a class="btn btn-info" href="{{ route('trainer.index') }}">Back to List</a>
                        <input type="submit" name="save" value="Save" class="btn btn-primary pull-right">

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js"
    integrity="sha512-AQMSn1qO6KN85GOfvH6BWJk46LhlvepblftLHzAv1cdIyTWPBKHX+r+NOXVVw6+XQpeW4LJk/GTmoP48FLvblQ=="
    crossorigin="anonymous"></script>
<script>
    $('#takesnap').hide();
    $('#close').hide();

    function readURL(input) {
        if (input.files && input.files[0]) {
            document.getElementById('webimg').value = '';
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });

    function showCamera() {
        Webcam.attach('#my_camera');
        Webcam.set({
            width: 250,
            height: 250
        });
        $("#webcam").attr("onclick", "hideCamera()");
        $('#takesnap').show();
        $('#close').show();
    }

    function hideCamera() {
        Webcam.reset('#my_camera');
        $("#webcam").attr("onclick", "showCamera()");
        $('#takesnap').hide();
        $('#close').hide();
    }


    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            document.getElementById('blah').src = data_uri;
            var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');

            document.getElementById('webimg').value = raw_image_data;
        });
    }
</script>
@stop
