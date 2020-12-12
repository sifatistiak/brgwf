@extends('adminlte::page')

@section('title', env('Site_Title', 'BRGWF').' Member Edit')

@section('content')
<style>
    td{
        padding: 1rem;
    }
</style>
<section class="content">
    <div class="row">
        <div style="margin-left: 90%;">
            <button type="button" onclick="window.print()" class="btn btn-sm btn-outline-primary"> <i class="fas fa-print"></i> Print</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h3>Bangladesh Revolutionary Garment Workers Federation - BRGWF</h3>
            <h6>55, Ruhani Complex (1st Floor), Zoo Road, Mirpur -2, Dhaka -1216</h6>
            <h6>Telephone: +88 02 803 2546, Email: brgwf_94@yahoo.com, Fax: +88 02 803 2546</h6>
            <br>
            <h6> <u> Member Profile </u> </h6>
        </div>
    </div>
<div class="row">
    <div class="col-8">
        <table class="p-4">
            <tr>
                <td>Member No:</td>
                <td>{{ $member->membership_no }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $member->full_name }}</td>
            </tr>
            <tr>
                <td>Father Name</td>
                <td>{{ $member->father_name }}</td>
            </tr>
            <tr>
                <td>Mother Name</td>
                <td>{{ $member->mother_name }}</td>
            </tr>
            <tr>
                <td>Spouse Name</td>
                <td>{{ $member->spouse_name }}</td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>{{ $member->gender }}</td>
            </tr>
            <tr>
                <td>Date Of Birth</td>
                <td>{{ date('d/m/Y',strtotime($member->date_of_birth)) }}</td>
            </tr>
            <tr>
                <td>Blood Group</td>
                <td>{{ $member->blood_group }}</td>
            </tr>
            <tr>
                <td>Religion</td>
                <td>{{ $member->religion->name }}</td>
            </tr>
            <tr>
                <td>Education</td>
                <td>{{ $member->education }}</td>
            </tr>
            <tr>
                <td>NID</td>
                <td>{{ $member->nid }}</td>
            </tr>
            <tr>
                <td>Designation</td>
                <td>{{ $member->designation->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Categories</td>
                <td>{{ $member->category->name ?? 'N/A' }}</td>
            </tr>
             <tr>
                <td>Reg No</td>
                <td>{{ $member->reg_no }}</td>
            </tr>
            <tr>
                <td>Joining Date</td>
                <td>{{ $member->joining_date }}</td>
            </tr>
            <tr>
                <td>Factory</td>
                <td>{{ $member->factory->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Union</td>
                <td>{{ $member->union->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Contact</td>
                <td>{{ $member->mobile }}</td>
            </tr>
            <tr>
                <td>Present Address</td>
                <td>{{ $member->present_address }}</td>
            </tr>
            <tr>
                <td>Permanent Address</td>
                <td>{{ $member->permanent_address }}</td>
            </tr>
        </table>

    </div>
    <div class="col-4">
        <img src="{{ asset('member_image/'.$member->photo) }}" style="width:90px"
            onerror="this.onerror=null;this.src='{{ asset('member_image/no_photo.png') }}';">
    </div>
    </div>
</section>
@stop
@section('js')

@stop
