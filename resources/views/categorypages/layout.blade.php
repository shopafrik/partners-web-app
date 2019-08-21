@extends('layouts.layoutwithside')
@section('allcontent')
    <div class="side-container">
        <div class="page-top">
            <h6> Manage Categories </h6>
            <div class="right">
                <a href='/categories'>&nbsp<b>parent categories (level 1)&nbsp</b></a>  
            </div>
        </div>
        <hr/>
        @yield('categorycontent')
    </div>
@endsection



