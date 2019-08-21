@extends('layouts.mainlayout')
@section('content')
    <body class="background-pic">
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            <div class="jumbotron text-center ">
                <h1> Welcome to Shopafrik-Partner </h1>
                <br/>
                <h4> L'Afrique to the world: </h4>
                <h5> Shop goods made by Africans in Africa and Africans in the Disapora!</h5>
                <h5> Become a PARTNER with ShopAfrik and have your products sold to Billions around the world!</h5>
                <br/>
                <p>
                    <a class="btn btn-lg solid-border-back" href="#" role="button"> more... </a>
                </p>
            </div>
        </div>
    </body>
@endsection