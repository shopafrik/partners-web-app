<?php 
    $roles = Config::get('projectconstants.user_roles'); 
    $user = session()->get('loggeduser')[0];
    $theuserdetails = App\User::find($user->USER_id); 
    $theuserrole = $theuserdetails->USER_role;
    if ($theuserrole == 'b'){
        $theuser = $theuserdetails->brand;
    }
    if ($theuserdetails->brand->BRAND_logo_pic_link == ''){
        $url = Storage::disk('s3brandbucket')->url('defaults/logo_here.png');
    }else{
        $url = Storage::disk('s3brandbucket')->url($theuserdetails->brand->BRAND_logo_pic_link);
    }
?>

@extends('userpages.layout')
@section('usercontent')
<div class="container container-profile">
        <h3>My Profile</h3>
        <div class="row profile-card">
            <div class="col-md-2">
                {{-- <i class="fa fa-user fa" style="font-size:10vw; color:#9f9f9f; margin-top:30%; margin-left:20%;"></i> --}}
                <img style="height:144px; width:144px; object-fit: fill; margin-top:16px;" src="{{$url}}" />
            </div>
            <div class="col-md-6 desc-area">
                <h2 class="name"><b>{{$theuserdetails->USER_name}}</b></h2>
                {{-- <small>Role: {{$roles[$theuser->USER_role]}}</small> --}}
                @if ($theuserrole == 'b')
                    <p style="margin-top:3%;">Description: {{$theuser->BRAND_description}}</p>
                @endif
            </div>
            <div class="col-md-4 data-area">
                <div style="border-left: 1px solid #dcdcdc; padding-left: 4%; height:100%;">
                    <i class="fa fa-envelope"></i>&nbsp&nbsp&nbsp{{$theuserdetails->USER_email}}
                    <br/>
                    @if (!is_null($theuserdetails->USER_phone))<i class="fa fa-phone"></i>&nbsp&nbsp&nbsp {{$theuserdetails->USER_phone}}
                    <br/> @endif
                    @if (!is_null($theuserdetails->DEPT_id))
                        <i class="fa fa-building"></i>&nbsp&nbsp&nbspDepartment of Department
                        {{-- {{$theuser->department->DEPT_name}} --}}
                        <br/>
                    @endif
                    <i class="fa fa-circle alert-success"></i>&nbsp&nbsp&nbspActive
                </div>
            </div>
        </div>
    </div>
@endsection