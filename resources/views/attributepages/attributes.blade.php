<?php $i = 1; ?>
@extends('attributepages.layout')
@section('attributecontent')
    <div class="page-top">
        <h3>All Attributes</h3>
        <button class="btn right"><a id="addattr" href="#" data-toggle="modal" data-target="#addattrModal">
            <i class="fa fa-plus-circle"></i>&nbsp add attribute</a>
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
            @if (!(count($attrs) <= 0))
                @foreach($attrs as $a)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$a['ATTRIBUTE_name']}}</td>
                        <td>
                            <a id="editattr" href="#" data-toggle="modal" data-target="#editAttrModal" data-id={{$a->ATTRIBUTE_id}} data-name={{$a->ATTRIBUTE_name}}>edit</a> |
                            <a id="deleteattr" href="#" data-toggle="modal" data-target="#deleteAttrModal" data-id={{$a->ATTRIBUTE_id}} data-name={{$a->ATTRIBUTE_name}}>delete</a>
                        </td>
                    </tr>
                    <?php $i = $i + 1; ?>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection






<div class="addattrModal modal fade" id="addattrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Attribute</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addattrform" method="POST" action="{{   action( 'AttributesController@store')    }}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name" class="col-form-label">Attribute Name:</label>
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



<div class="editAttrModal modal fade" id="editAttrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Attribute</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editattrform" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="col-form-label">Attribute Name:</label>
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
    $(document).on('click', '#editattr', function () {
        var myVal = $(this).data('id');
        $('#editattrform').attr("action", "{{ url('/attributes') }}" + "/" + myVal);
        $('#nameid').val($(this).data('name'));
    });
</script>














<div class="deleteAttrModal modal fade" id="deleteAttrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Attribute</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteattrform" method="POST" action="">
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
    $(document).on('click', '#deleteattr', function () {
        var myVal = $(this).data('id');
        $('#deleteattrform').attr("action", "{{ url('/attributes') }}" + "/" + myVal);
    });
</script>