<?php $i = 1; 
    $styles = $data['styles'];
    $categs = $data['categs'];
    $categIndex = 0;
?>
@extends('stylepages.layout')
@section('stylecontent')
    <div class="page-top">
        <h3>All Styles</h3> 
    </div>
    <br/>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Categories</th>
                <th scope="col">Links</th>
            </tr>
        </thead>
        <tbody>
            @if (!(count($styles) <= 0))
                @foreach($styles as $s)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$s['STYLE_name']}}</td>
                        <td>{{$categs[$categIndex]}}</td>
                        <td>
                            <a href="#">edit category</a> |
                            <a id="editstyle" href="#" data-toggle="modal" data-target="#editStyleModal" data-id={{$s->STYLE_id}} data-name={{$s->STYLE_name}}>edit name</a> |
                            <a id="deletestyle" href="#" data-toggle="modal" data-target="#deleteStyleModal" data-id={{$s->STYLE_id}} data-name={{$s->STYLE_name}}>delete</a>
                        </td>
                    </tr>
                    <?php $i = $i + 1; $categIndex = $categIndex + 1?>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection






<div class="addStyleModal modal fade" id="addStyleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Style</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addstyleform" method="POST" action="{{   action( 'StylesController@store')    }}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name" class="col-form-label">Style Name:</label>
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



<div class="editStyleModal modal fade" id="editStyleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Style</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editstyleform" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="col-form-label">Style Name:</label>
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
    $(document).on('click', '#editstyle', function () {
        var myVal = $(this).data('id');
        $('#editstyleform').attr("action", "{{ url('/styles/') }}" + "/" + myVal);
        $('#nameid').val($(this).data('name'));
    });
</script>














<div class="deleteStyleModal modal fade" id="deleteStyleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Style</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deletestyleform" method="POST" action="">
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
    $(document).on('click', '#deletestyle', function () {
        var myVal = $(this).data('id');
        $('#deletestyleform').attr("action", "{{ url('/styles/') }}" + "/" + myVal);
        //$('#question').val("Are you sure you want to delete " + $(this).data('name') + " style?");
    });
</script>