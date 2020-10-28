@extends('adminlte::page')

@section('title', 'BRGWF Union Add')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New Union</h3>
                </div>
                <div class="clearfix"></div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('union.store') }}" method="post">
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="name">Name</label>
                                <input type="text" class="form-control input-group col-md-3" id="name" name="name">
                                <span class="input-group-addon col-md-1"></span>
                                <label class="col-md-2" for="contact_person">Contact Person</label>
                                <input type="text" class="form-control input-group col-md-3" id="contact_person"
                                    name="contact_person">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="location">Location</label>
                                <input type="text" class="form-control input-group col-md-3" id="location"
                                    name="location">
                                <span class="input-group-addon col-md-1"></span>
                                <label class="col-md-2" for="total_member">Total Member</label>
                                <input type="text" class="form-control input-group col-md-3" id="total_member"
                                    name="total_member">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="reg_no">Registration No</label>
                                <input type="text" class="form-control input-group col-md-3" id="reg_no" name="reg_no">
                                <span class="input-group-addon col-md-1"></span>
                                <label class="col-md-2" for="est_year">EST Year</label>
                                <input type="text" class="form-control input-group col-md-3" id="est_year"
                                    name="est_year">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="phone">Phone</label>
                                <input type="text" class="form-control input-group col-md-3" id="phone" name="phone">
                                <span class="input-group-addon col-md-1"></span>
                                <label class="col-md-2" for="email">Email</label>
                                <input type="email" class="form-control input-group col-md-3" id="email" name="email">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="present_address">Present Address</label>
                                <textarea class="form-control input-group col-md-9" id="present_address"
                                    name="present_address"></textarea>
                            </div>
                        </div>

                        <div class="ml-5 checkbox col-md-8 d-flex justify-content-between">
                            <label>
                                Is Active
                                <input type="checkbox" name="is_active" value="1">
                            </label>
                            <span class="input-group-addon col-md-3"></span>
                            <label>
                                Is CBA
                                <input type="checkbox" name="is_cba" value="1">
                            </label>
                            <span class="input-group-addon col-md-3"></span>
                            <label>
                                Is OSH Committee
                                <input type="checkbox" name="is_osh" value="1">
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->

                   <div class="box-footer mt-5">
                    <a href="{{ route('union.index') }}" class="btn btn-info">Back to List</a>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@stop
@section('js')

@stop
