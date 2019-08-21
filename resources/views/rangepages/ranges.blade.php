<?php $i = 1; ?>
@extends('rangepages.layout')
@section('rangecontent')
    <div class="page-top">
        <h3>All Ranges</h3>
        <button class="btn right"><a id="addrange" href="#" data-toggle="modal" data-target="#addRangeModal">
            <i class="fa fa-plus-circle"></i>&nbsp add range</a>
        </button>
    </div>
    <br/>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">Links</th>
            </tr>
        </thead>
        <tbody>
            @if (!(count($ranges) <= 0))
                @foreach($ranges as $r)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$r['RANGES_name']}}</td>
                        <td>
                            <a id="editRange" href="#" data-toggle="modal" data-target="#editRangeModal" data-id={{$r->RANGES_id}} data-name={{$r->RANGES_name}}>edit</a> |
                            <a id="deleteRange" href="#" data-toggle="modal" data-target="#deleteRangeModal" data-id={{$r->RANGES_id}} data-name={{$r->RANGES_name}}>delete</a>
                        </td>
                    </tr>
                    <?php $i = $i + 1; ?>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection






{{-- ADD ================================== --}}
<div class="addRangeModal modal fade" id="addRangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Range</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addrangeform" method="POST" action="{{   action( 'RangesController@store')    }}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name" class="col-form-label">Range Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">add</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>




{{-- EDIT ================================= --}}
<div class="editRangeModal modal fade" id="editRangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Style</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editRangeform" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="col-form-label">Range Name:</label>
                        <input type="text" class="form-control" id="nameid" name="name">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">edit</button>
                    </div>
                </form>
            </div>
                
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(document).on('click', '#editRange', function () {
        var myVal = $(this).data('id');
        $('#editRangeform').attr("action", "{{ url('/ranges/') }}" + "/" + myVal);
        $('#nameid').val($(this).data('name'));
    });
</script>



{{-- DELETE =============================== --}}
<div class="deleteRangeModal modal fade" id="deleteRangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Range</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteRangeform" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="form-group">
                        <p id="question"></p>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(document).on('click', '#deleteRange', function () {
        var myVal = $(this).data('id');
        $('#deleteRangeform').attr("action", "{{ url('/ranges/') }}" + "/" + myVal);
    });
</script>