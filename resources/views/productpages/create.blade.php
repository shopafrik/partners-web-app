@extends('productpages.layout')
@section('productpagecontent')
{!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'name'])}}
    </div>
    <div class="form-group">
        {{Form::textarea('short_description', '', ['class' => 'form-control', 'placeholder' => 'short description'])}}
    </div>
    <div class="form-group">
            {{Form::label('lblLongDesc', 'Long Description:')}}
        {{Form::textarea('txtLongDesc', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'long description'])}}
    </div>
    <br/>
    <br/>
    <h5> Category Settings </h5>
    <hr/>
    <div class="form-group">
        {{Form::select("parent_category",['W' => 'Women', 'M' => 'Men', 'H' => 'Home'], null,
            [
               "class" => "form-group",
               "placeholder" => "select parent category..."
            ])
        }}
    </div>
    <div class="form-group">
        {{Form::select("dropC",[], null,
            [
                "class" => "form-group",
                "placeholder" => "select category..."
            ])
        }}
    </div>
    <div class="form-group">
        {{Form::select("dropSC",[], null,
            [
                "class" => "form-group",
                "placeholder" => "select sub category..."
            ])
        }}
    </div>
    <br/>
    <hr/>
    {{Form::submit('Submit', ['class' => 'btn solid-border-back'])}}
    <br/>
    <br/>
{!! Form::close() !!}
@endsection