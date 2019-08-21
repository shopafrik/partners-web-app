<?php $i = 1; ?>
@extends('categorypages.layout')
@section('categorycontent')
    <div class="page-top">
        <h3>Parent Categories</h3>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">Links</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categs as $categ)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$categ['PC_name']}}</td>
                    <td>
                        <a href="/categories/{{$categ->PC_id}}">details</a>
                    </td>
                </tr>
                <?php $i = $i + 1; ?>
            @endforeach
        </tbody>
    </table>
@endsection