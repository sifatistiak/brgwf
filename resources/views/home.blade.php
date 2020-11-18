@extends('adminlte::page')

@section('title', env('Site_Title', 'BRGWF'))

@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Members</span>
                <span class="info-box-number">{{ App\Models\Models\Member::count() }}</span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fas fa-users-cog"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Unions</span>
                <span class="info-box-number">{{ App\Models\Models\Union::count() }}</span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fas fa-industry"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Factories</span>
                <span class="info-box-number">{{ App\Models\Models\Factory::count() }}</span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fas fa-star"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Training</span>
                <span class="info-box-number">{{ App\Models\Models\Training::count() }}</span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
</div>
@stop
