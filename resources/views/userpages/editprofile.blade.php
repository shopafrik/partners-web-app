@extends('userpages.layout')
@section('usercontent')
    <br/>
    <h4 class="box-title">Edit Profile: {{$user->USER_name}}</h4>
    {{-- <h5 style="margin-top:1%; margin-left:4%;"><b>Add a New User</b></h5> --}}
    {{-- @if($user->USER_role === 'a')
        <div class= "container-user">
            {!! Form::open(['action' => ['UsersController@update', $user->USER_id], 'method' => 'POST']) !!}
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">
                            {{Form::text('name', $user->USER_name, ['class' => 'form-control', 'placeholder' => 'name'])}}
                        </div>
                    </div>
                </div>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Update User', ['class' => 'btn solid-border-back'])}}
            {!! Form::close() !!}
        </div>
    @else 
    @endif --}}
    <div class= "container-user">
        {!! Form::open(['action' => ['UsersController@update', $user->USER_id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group">
                        {{Form::text('name', $user->USER_name, ['class' => 'form-control', 'placeholder' => 'name'])}}
                    </div>
                    <div class="form-group">
                        {{Form::text('phone', $user->USER_phone, ['class' => 'form-control', 'placeholder' => 'phone'])}}
                    </div>
                    <div class="form-group">
                        {{Form::text('email', $user->USER_email, ['class' => 'form-control', 'placeholder' => 'email'])}}
                    </div>
                    <hr/>
                    <div class="form-group">
                        <label for="logoinput">Edit Logo: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                        <input type="file" name="logo_image" id="logoinput">
                    </div>
                    {{-- <div class="form-group">
                        <label for="profilepicinput">Edit Profile Picture</label>
                        <input type="file" name="profile_image" id="profilepicinput">
                    </div> --}}
                    {{ csrf_field() }}
                   
                    {{-- <div class="form-group">
                        {{Form::select("role", $role_dropdowns[$loggedUser->USER_role] , null,
                            [
                                "class" => "form-group",
                                "placeholder" => "Edit current role: ",
                                "style" => "width:100%; margin-bottom:0px;"
                            ])
                        }}
                    </div>           --}}
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::textarea('description', $user->brand->BRAND_description, ['class' => 'form-control', 'placeholder' => 'description (optional)'])}}
                    </div>
                </div>
            </div>
            <hr style="margin-bottom:0px;"/>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Update User', ['class' => 'btn solid-border-back'])}}
        {!! Form::close() !!}
    </div>
    {{-- <a href="/users" style="color:#20335d;">Back</a> --}}
    <br/>
    <br/>
@endsection