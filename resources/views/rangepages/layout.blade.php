@extends('layouts.layoutwithside')
@section('allcontent')
    <div class="side-container">
        <div class="page-top">
            <h6> Manage Ranges </h6>
            <div class="right">
                <a href='/styles'>&nbsp<b>ranges&nbsp</b></a>  
            </div>
        </div>
        <hr/>
        @yield('rangecontent')
    </div>
@endsection