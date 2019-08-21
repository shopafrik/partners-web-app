<?php 
    $user = session()->get('loggeduser')[0];
    $userRole = $user->USER_role; ?>
@extends('layouts.layoutwithside')
@section('allcontent')
    <div class="side-container">
        <div class="page-top">
            <h6>Manage Products</h6>
            @if(session()->has('loggeduser'))
                <div class="right">
                    <a href='/products'>&nbsp<b>my products&nbsp</b></a>
                    |
                    <a href='/products/create'>&nbsp<b>add product&nbsp</b></a>
                    {{-- @if(($userRole === 'b') || ($userRole === 'c') || ($userRole === 'o'))
                        |
                        <a href='/users/{{$user->USER_id}}/edit'>&nbsp<b>edit profile&nbsp</b></a>
                    @endif --}}
                </div>
            @endif
        </div>
        <hr/>
        @yield('productpagecontent')
    </div>
@endsection



