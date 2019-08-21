{{-- Getting the array of roles stored locally --}}
<?php $brand_application_status = Config::get('projectconstants.brand_application_status'); 
    $exists = Config::get('projectconstants.exists_colors');
    $currentRole = session()->get('loggeduser')[0]->USER_role;
    $brands = $data['brands'];
    $title = $data['title'];
    // $currentRole = $user->USER_role;
?>
@extends('brandpages.layout')
@section('css')
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('brandscontent')
    <br/>
    <h4 class="box-title">{{$title}}</h4>
    <div class="box container-user" style="width=90%;">
        <div class="box-header">
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover" id="table" style="width=90vw;">
                <thead class="thead-background">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Logo</th>
                        <th>Picture</th>
                        <th>Country</th>
                        <th>Currency</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Application</th>
                        @if($currentRole === 'a')
                            <th>Links</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $item)
                        <tr>
                            <td>{{$item->user->USER_name}}</td>
                            <td>{{$item->user->USER_email}}</td>
                            @if (  (!(is_null($item->user->USER_phone))) && ($item->user->USER_phone != ''))
                                <td style="background: {{$exists['true']}}" >{{$item->user->USER_phone}}</td>
                            @else 
                                <td style="background: {{$exists['false']}}" ></td>
                            @endif
                            @if ((!(is_null($item->BRAND_logo_pic_link))) && ($item->BRAND_logo_pic_link != ''))
                                <td style="background: {{$exists['true']}}" ></td>
                            @else 
                                <td style="background: {{$exists['false']}}" ></td>
                            @endif
                            @if ((!(is_null($item->user->USER_profile_link))) && ($item->user->USER_profile_link != ''))
                                <td style="background: {{$exists['true']}}" >{{$item->user->USER_profile_link}}</td>
                            @else 
                                <td style="background: {{$exists['false']}}" ></td>
                            @endif
                            @if ((!(is_null($item->user->USER_country))) && ($item->user->USER_country != ''))
                                <td style="background: {{$exists['true']}}">{{$item->user->USER_country}}</td>
                            @else 
                                <td style="background: {{$exists['false']}}"></td>
                            @endif
                            @if ((!(is_null($item->BRAND_currency))) && ($item->BRAND_currency != ''))
                                <td style="background: {{$exists['true']}}">{{$item->BRAND_currency}}</td>
                            @else 
                                <td style="background: {{$exists['false']}}"></td>
                            @endif
                            <td>{{substr($item->BRAND_description, 0, 32).' ...'}}</td>
                            <td style="color:white; background: {{$brand_application_status[$item->BRAND_application_status][1]}}">
                                {{$brand_application_status[$item->BRAND_application_status][0]}}</td>
                            <td>{{$item->created_at}}</td>
                            @if($currentRole === 'a')
                                @if($item->BRAND_application_status === 'p')
                                    <td><a href="/brands/{{$item->USER_id}}/edit" style="color:#20335d;">approve</a></td>
                                @else 
                                    <td><a href="/brands/{{$item->USER_id}}/edit" style="color:#20335d;">disable</a></td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(function() {
            $('#table').DataTable();});
    </script>
@endsection