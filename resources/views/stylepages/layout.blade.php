@extends('layouts.layoutwithside')
@section('allcontent')
    <div class="side-container">
        <div class="page-top">
            <h6> Manage Styles </h6>
            <div class="right">
                <a href='/styles'>&nbsp<b>all styles&nbsp|</b></a> 
                <a href='/styles/create'>&nbsp<b>add styles&nbsp</b></a>  
            </div>
        </div>
        <hr/>
        @yield('stylecontent')
    </div>
@endsection



