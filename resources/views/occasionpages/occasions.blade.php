<?php $i = 1; ?>
@extends('occasionpages.layout')
@section('occasioncontent')
    <div class="page-top">
        <h3>All Occasions</h3>
        <button class="btn right"><a id="addocc" href="#" data-toggle="modal" data-target="#addoccModal">
            <i class="fa fa-plus-circle"></i>&nbsp add occasion</a>
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
            @if (!(count($occasions) <= 0))
                @foreach($occasions as $occ)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$occ['OCCASION_name']}}</td>
                        <td>
                            <a id="editocc" href="#" data-toggle="modal" data-target="#editoccModal" data-id={{$occ->OCCASION_id}} data-name={{$occ->OCCASION_name}}>edit</a> |
                            <a id="deleteocc" href="#" data-toggle="modal" data-target="#deleteoccModal" data-id={{$occ->OCCASION_id}} data-name={{$occ->OCCASION_name}}>delete</a>
                        </td>
                    </tr>
                    <?php $i = $i + 1; ?>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection






<div class="addoccModal modal fade" id="addoccModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Occasion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addoccform" method="POST" action="{{   action( 'OccasionsController@store')    }}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name" class="col-form-label">Occasion Name:</label>
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



<div class="editoccModal modal fade" id="editoccModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Occasion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editoccform" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="col-form-label">Occasion Name:</label>
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
    $(document).on('click', '#editocc', function () {
        var myVal = $(this).data('id');
        $('#editoccform').attr("action", "{{ url('/occasions') }}" + "/" + myVal);
        $('#nameid').val($(this).data('name'));
    });
</script>














<div class="deleteoccModal modal fade" id="deleteoccModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Occasion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteoccform" method="POST" action="">
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
    $(document).on('click', '#deleteocc', function () {
        var myVal = $(this).data('id');
        $('#deleteoccform').attr("action", "{{ url('/occasions') }}" + "/" + myVal);
    });
</script>