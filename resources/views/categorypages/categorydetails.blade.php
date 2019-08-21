@if(is_null($categ))
    <script>window.location.href = "{{url('/')}}";</script>
@endif
<?php $i = 1; ?>
@extends('categorypages.layout')
@section('categorycontent')
    <div class="page-top">
        <h3>{{$categ->parentcategory->PC_name}} -> {{$categ->C_name}}</h3>
        <button class="btn right"><a id="addlink" href="#" data-toggle="modal" data-target="#addSCModal" data-id={{$categ->C_id}}>
            <i class="fa fa-plus-circle"></i>&nbsp add subcategory (level 3)</a>
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
                @if (!(count($categ->subcategories) <= 0))
                    @foreach($categ->subcategories as $sc)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$sc['SC_name']}}</td>
                            <td>
                                <a id="editsc" href="#" data-toggle="modal" data-target="#editSCModal" data-id={{$sc->SC_id}} data-name={{$sc->SC_name}}>edit</a>
                            </td>
                        </tr>
                        <?php $i = $i + 1; ?>
                    @endforeach
                @endif
            </tbody>
        </table>
       
@endsection






<div class="addSCModal modal fade" id="addSCModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add subcategory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addscform" method="POST" action="">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name" class="col-form-label">Subcategory Name:</label>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(document).on('click', '#addlink', function () {
        var myVal = $(this).data('id');
        $('#addscform').attr("action", "{{ url('/addsubcateg') }}" + "/" + myVal);
    });
</script>








<div class="editSCModal modal fade" id="editSCModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editscform" method="POST" action="">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="col-form-label">Subcategory Name:</label>
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
        $(document).on('click', '#editsc', function () {
            var myVal = $(this).data('id');
            $('#editscform').attr("action", "{{ url('/categories') }}" + "/" + myVal);
            $('#nameid').val($(this).data('name'));
        });
    </script>
    













<div class="addclassModal modal fade" id="addclassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addclassform" method="POST" action="">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name" class="col-form-label">Subcategory Name:</label>
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).on('click', '#adclasslink', function () {
            var myVal = $(this).data('id');
            $('#addclassform').attr("action", "{{ url('/addclass') }}" + "/" + myVal);
        });
    </script>