@extends('layouts.layoutwithside')
@section('allcontent')
    <div class="side-container">
        <div class="page-top">
            <h6> Manage Occasions </h6>
            <div class="right">
                <a href='/occasions'>&nbsp<b>occasions&nbsp</b></a>  
            </div>
        </div>
        <hr/>
        @yield('occasioncontent')
    </div>
@endsection
