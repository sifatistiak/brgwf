@extends('adminlte::page')

@section('title', 'BRGWF Designation Edit')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-9">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Designation</h3>
                    <hr>
                </div>
                <div class="clearfix"></div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('designation.update',$item->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="name">Name</label>
                                <input type="text" class="form-control input-group col-md-12" id="name" name="name" value="{{ $item->name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label class="col-md-2" for="remark">Remark</label>
                                <textarea class="form-control input-group col-md-12" id="remark" name="remark">{{ $item->remark }}</textarea>
                            </div>
                        </div>

                        <div class="ml-5 checkbox col-md-8 d-flex justify-content-between">
                            <label>
                                Is Active
                                <input type="checkbox" name="status" value="1" {{ ($item->status) ? 'checked' : '' }}>
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer mt-5">
                        <a href="{{ route('designation.index') }}" class="btn btn-info">Back to List</a>
                        <button type="submit" class="btn btn-success float-right">Update</button>
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
