@extends('layouts.layoutwithside')
@section('allcontent')
    <div class="side-container">
        <div class="page-top">
            <h6> Manage Brands </h6>
            <div class="right">
                <a href='/brands'>&nbsp<b>all brands&nbsp</b></a>
                |&nbsp <a href='/pendingbrands'>&nbsp<b>pending &nbsp</b></a>  
            </div>
        </div>
        <hr/>
        @yield('brandscontent')
    </div>
@endsection



