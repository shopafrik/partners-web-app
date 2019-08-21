@extends('layouts.layoutwithside')
@section('allcontent')
    <div class="side-container">
        <div class="page-top">
            <h6> Manage Attributes </h6>
            <div class="right">
                <a href='/attributes'>&nbsp<b>attributes&nbsp</b></a>  
            </div>
        </div>
        <hr/>
        @yield('attributecontent')
    </div>
@endsection



