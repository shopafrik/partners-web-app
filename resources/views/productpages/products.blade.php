@extends('productpages.layout')
@section('productpagecontent')
    {{$products}}
    @if(count($products) > 0)
        <ul class="list-group">
            @foreach($products as $prod)
                <li class="list-group-item" style="color:black;"> 
                    <h3><a href="/products/{{$prod->PRODUCT_id}}">{{$prod->PRODUCT_name}}</a></h3>
                    {{-- <p>Category ID: {{$prod->SC_id}}</p> --}}
                    <small>Created on: {{$prod->created_at}}</small>
                    <small>Created by: {{$prod->PRODUCT_creator}}</small>
                    <small>Brand name: {{$prod->brand->USER_name}}</small>
                    <br/>
                    <br/>
                    {{-- <p>
                        <a href="/products/{{$prod->PRODUCT_id}}/edit" style="padding-right: 16px;">edit</a>
                        <a>{!! Form::open([
                                'action' => ['ProductsController@destroy', $prod->PRODUCT_id], 
                                'method' => 'POST' ]) !!}  
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}</a>
                    </p> --}}
                </li>
                <br/>
            @endforeach
        </ul>
        {{$products->links()}}
    @else 
        <p> No Products </p>
    @endif
@endsection