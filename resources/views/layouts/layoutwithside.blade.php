@extends('layouts.mainlayout')
@section('content')
    <body style="background:white;">
        @include('inc.navbar')
        <div class="container-fluid">
            <div class="row">
                @if(session()->has('loggeduser'))
                    <div class="col-md-2 sidebar">
                        @include('inc.brandsidenav')
                    </div>
                    <div class="col-md-10 " style="padding-top:10px;">
                        <div class="container">
                            @include('inc.messages')
                            @yield('allcontent')
                        </div>
                    </div>
                @else
                    <script>window.location.href = "{{url('/')}}";</script>
                @endif
            </div>
        </div> 
         <!-- Scripts -->
         <script src="{{ asset('js/app.js') }}" defer></script>
         <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" defer></script>
         <script  type="text/javascript" src="{{ asset('js/bootstrap.js') }}" defer></script>
    </body>
@endsection