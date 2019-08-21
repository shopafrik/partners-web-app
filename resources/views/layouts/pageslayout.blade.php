@extends('layouts.mainlayout')
@section('content')
    <body style="background:white;">
        <div id="app">
            @include('inc.navbar')
            <main class="py-4">
                <div class="container">
                    @include('inc.messages')
                    @yield('allcontent')
                </div>
            </main>
        </div>
        @yield('javascript')
    </body>
@endsection