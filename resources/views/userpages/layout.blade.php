<?php 
    $user = session()->get('loggeduser')[0];
    $userRole = $user->USER_role; ?>
@extends('layouts.layoutwithside')
@section('allcontent')
    <div class="side-container">
        <div class="page-top">
            
            @if(session()->has('loggeduser'))
                <?php $user = session()->get('loggeduser')[0];
                    $userRole = $user->USER_role; ?>
                <div class="right">
                    <a href='/userprofile'>&nbsp<b>my profile&nbsp</b></a>
                    @if(($userRole === 'b') || ($userRole === 'c') || ($userRole === 'o'))
                        |
                        <a href='/users/{{$user->USER_id}}/edit'>&nbsp<b>edit profile&nbsp</b></a>
                    @endif
                    @if($userRole === 'a')
                        |
                        <a href='/users'>&nbsp<b>all users&nbsp</b></a>
                    @endif
                </div>
            @endif
        </div>
        <hr/>
        @yield('usercontent')
    </div>
@endsection



