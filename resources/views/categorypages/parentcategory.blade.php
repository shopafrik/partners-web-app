@if(is_null($categ))
    <script>window.location.href = "{{url('/')}}";</script>
@endif
<?php $i = 1; ?>
@extends('categorypages.layout')
@section('categorycontent')
    <div class="page-top">
        <h3>{{$categ->PC_name}}</h3>
        <button class="btn right"><a id="addlink" href="#" data-toggle="modal" data-target="#addCModal" data-id={{$categ->PC_id}}>
            <i class="fa fa-plus-circle"></i>&nbsp add category (Level 2)</a>
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
            @if (!(count($categ->categories) <= 0))
                @foreach($categ->categories as $c)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$c['C_name']}}</td>
                        <td>
                            <a href="/categorydetails/{{$c->C_id}}">details</a>
                        </td>
                    </tr>
                    <?php $i = $i + 1; ?>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection






<div class="addCModal modal fade" id="addCModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addcform" method="POST" action="">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name" class="col-form-label">Category Name:</label>
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
        $('#addcform').attr("action", "{{ url('/addcategory') }}" + "/" + myVal);
    });
</script>