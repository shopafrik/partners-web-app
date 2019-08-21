<?php 
    $subcategs = $data['subcategs'];
    // $selectedCategsIds = array_map(function($sc) {
    //     return $sc->SC_id;
    // }, $subcategs);
?>
@extends('stylepages.layout')
@section('stylecontent')
    <div class="page-top">
        <h3>Create Style</h3>
    </div>
    <br/>
    {!! Form::open(['action' => 'StylesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'name'])}}
        </div>
        
            {{-- {!! Form::checkbox($subcategs->SC_name, $subcategs->SC_id, (in_array($subcategs->SC_id, $subcategs)), ['class' => 'field']) !!}
            {!! $subcategs->SC_name !!} --}}
            @foreach ($subcategs as $sc)
                <div class="form-group">
                    {!! Form::checkbox('subcategs[]', $sc->SC_id, null, ['class' => 'field']) !!}
                    {!! $sc->SC_name.' -> '.$sc->category->C_name.' -> '.$sc->category->parentcategory->PC_name !!}
                    {{-- {!! Form::checkbox($sc->SC_name, $sc->SC_id, (in_array($sc->SC_id, $selectedCategsIds)), ['class' => 'field']) !!}{!! $subcategs->SC_name !!} --}}
                </div>
            @endforeach
            {{-- @foreach ($subcategsSelect as $scSelect)

                {!! $scSelect->SC_id !!}

            @endforeach  --}}
        <hr/>
        {{Form::submit('Submit', ['class' => 'btn solid-border-back'])}}
        <br/>
        <br/>
    {!! Form::close() !!}
@endsection