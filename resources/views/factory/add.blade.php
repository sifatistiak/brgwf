@extends('adminlte::page')

@section('title', 'BRGWF Factory Add')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New Factory</h3>
                    <hr>

                </div>
                <div class="clearfix"></div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('factory.store') }}" method="post">
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="name">Union</label>
                                <select class="form-control input-group col-md-9" id="union_id" name="union_id">
                                    <option value="">Select One</option>
                                    @foreach ($unions as $union)
                                    <option value="{{ $union->id }}">{{ $union->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="name">Name</label>
                                <input type="text" class="form-control input-group col-md-9" id="name" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="phone">Phone</label>
                                <input type="text" class="form-control input-group col-md-3" id="phone" name="phone">
                                <span class="input-group-addon col-md-1"></span>
                                <label class="col-md-2" for="contact_person">Category</label>
                                <select class="form-control input-group col-md-3" id="factory_category_id"
                                    name="factory_category_id">
                                    <option value="">Select One</option>
                                    @foreach ($factory_category as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="email">Email</label>
                                <input type="email" class="form-control input-group col-md-3" id="email" name="email">
                                <span class="input-group-addon col-md-1"></span>
                                <label class="col-md-2" for="reg_no">Registration No</label>
                                <input type="text" class="form-control input-group col-md-3" id="reg_no" name="reg_no">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="contact_person">Contact Person</label>
                                <input type="text" class="form-control input-group col-md-3" id="contact_person"
                                    name="contact_person">
                                <span class="input-group-addon col-md-1"></span>
                                <label class="col-md-2" for="no_of_workers">No of Workers</label>
                                <input type="text" class="form-control input-group col-md-3" id="no_of_workers"
                                    name="no_of_workers">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="present_address">Present Address</label>
                                <textarea class="form-control input-group col-md-9" id="present_address"
                                    name="present_address">
                            </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="permanent_address">Permanent Address</label>
                                <textarea class="form-control input-group col-md-9" id="permanent_address"
                                    name="permanent_address">
                            </textarea>
                            </div>
                        </div>

                        <div class="ml-5 pl-5 checkbox col-md-8 d-flex justify-content-between">
                            <label>
                                Is Accord
                                <input type="checkbox" name="is_accord" value="1">
                            </label>
                            <span class="input-group-addon col-1"></span>
                            <label>
                                Is Alliance
                                <input type="checkbox" name="is_alliance" value="1">
                            </label>
                            <span class="input-group-addon col-1"></span>
                            <label>
                                Is Non Compliance
                                <input type="checkbox" name="is_non_compliance" value="1">
                            </label>
                            <span class="input-group-addon col-1"></span>
                            <label>
                                NAP
                                <input type="checkbox" name="is_nap" value="1">
                            </label>
                            <span class="input-group-addon col-1"></span>
                            <label>
                                Is Active
                                <input type="checkbox" name="is_active" value="1">
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer mt-5 col-md-11">
                        <a href="{{ route('factory.index') }}" class="btn btn-info">Back to List</a>
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
