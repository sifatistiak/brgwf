@extends('adminlte::page')

@section('title', 'BRGWF Member Add')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.swf">
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="mb-0">Membership</p>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('member.store') }}" enctype="multipart/form-data" method="post">
                       @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="union_id">Union</label>
                                    <div class="col-md-11">
                                        <select class="form-control col-md-12" id="union_id" name="union_id">
                                            <option value="">Select One</option>
                                            @foreach ($unions as $union)
                                            <option value="{{ $union->id }}">{{ $union->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="factory_id">Factory</label>
                                    <div class="col-md-11">
                                        <select class="form-control" id="factory_id" name="factory_id">
                                            <option value="">Select One</option>
                                            @foreach ($factories as $factory)
                                            <option value="{{ $factory->id }}">{{ $factory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4" for="firstname">First Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="firstname" name="firstname" required="required"
                                            type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="lastname">Last Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="lastname" name="lastname" type="text" value="">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="gender">Gender</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="date_of_birth">Date Of Birth</label>
                                    <div class="col-md-9">
                                        <input class="form-control datepicker" id="date_of_birth" name="date_of_birth"
                                            type="date">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="religion_id">Religion</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="religion_id" name="religion_id">
                                            @foreach ($religions as $religion)
                                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="reg_no">RegNo</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="reg_no" name="reg_no" type="text" value="">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="father_name">Father Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="father_name" name="father_name" type="text"
                                            value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="mother_name">Mother Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="mother_name" name="mother_name" type="text"
                                            value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="blood_group">Blood Group</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="blood_group" name="blood_group">
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4" for="spouse_name">Spouse Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="spouse_name" name="spouse_name" type="text"
                                            value="">

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


                                <img id="blah" class="img-thumbnail"
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
                                        <input class="form-control" id="mobile" name="mobile" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="education_id">Education</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="education_id" name="education_id">
                                            @foreach ($educations as $education)
                                            <option value="{{ $education->id }}">{{ $education->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-2" for="nid">NID No</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="nid" name="nid" type="text" value="">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="designation_id">Designation</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="designation_id" name="designation_id">
                                            <option value="">Select One</option>
                                            @foreach ($designations as $designation)
                                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="category_id">Member Categories</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="category_id" name="category_id">
                                            <option value="">Select One</option>
                                            @foreach ($member_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="joining_date">Joining Date</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="joining_date" name="joining_date" type="date"
                                            value="">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4" for="FactoryJoiningDate">Factory(Join)
                                        Date</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="factory_joining_date"
                                            name="factory_joining_date" type="date" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="factory_id_no">Factory Id</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="factory_id_no" name="factory_id_no" type="text"
                                            value="">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="is_wpc">
                                        <input id="is_wpc" name="is_wpc" type="checkbox" class="minimal" value="1" >
                                        Is WPC
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="is_paid">
                                        <input id="is_paid" name="is_paid" type="checkbox" class="minimal" value="1">
                                        Is Paid
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2" for="present_address">Present Address</label>
                            <div class="col-md-8">
                                <textarea class="form-control" cols="20" id="present_address" name="present_address"
                                    rows="3"></textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2" for="permanent_address">Permanent Address</label>
                            <div class="col-md-8">
                                <textarea class="form-control" cols="20" id="permanent_address" name="permanent_address"
                                    rows="3"></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2" for="is_active">
                                <input id="is_active" name="is_active" value="1" type="checkbox" class="minimal">
                                Is Active
                            </label>
                        </div>

                        <a class="btn btn-info" href="">Back to List</a>
                        <input type="submit" name="save" value="Save" class="btn btn-primary pull-right">
                        <input type="submit"name="exit" value="Save &amp; Exit"
                            class="col-lg-offset-1 btn btn-primary pull-right">
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
