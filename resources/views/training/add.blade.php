@extends('adminlte::page')

@section('title', 'BRGWF Training Add')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Training</h3>
                    <hr>
                </div>
                <div class="clearfix"></div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('training.store') }}" method="post">
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="name">Name</label>
                                <input type="text" class="form-control input-group col-md-4" id="name" name="name">
                                <span class="input-group-addon col-md-1"></span>
                                <label class="col-md-2" for="code">Code</label>
                                <input type="text" class="form-control input-group col-md-3" id="code" name="code">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="duration">Duration</label>
                                <input type="text" class="form-control input-group col-md-4" id="duration" name="duration">
                                <span class="input-group-addon col-md-1"></span>
                                <label class="col-md-2" for="serial_no">Serial No</label>
                                <input type="text" class="form-control input-group col-md-3" id="serial_no" name="serial_no">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="start_date">Start Date</label>
                                <input type="date" class="form-control input-group col-md-4" id="start_date" name="start_date">
                                <span class="input-group-addon col-md-1"></span>
                                <label class="col-md-2" for="end_date">End Date</label>
                                <input type="date" class="form-control input-group col-md-3" id="end_date" name="end_date">
                            </div>
                        </div>


                        <div class="ml-5 checkbox col-md-8 d-flex justify-content-between">
                            <label>
                                Is Active
                                <input type="checkbox" name="is_active" value="1">
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer mt-5">
                        <a href="{{ route('training.index') }}" class="btn btn-info">Back to List</a>
                        <button type="submit" class="btn btn-success float-right">Submit Create</button>
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
