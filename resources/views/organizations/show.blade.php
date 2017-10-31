@extends('admin.profile')

@section('content')
<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Create Organizations</h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>View</h3>
          <a href="{{route('org.dashboard')}}">Back To Organizations</a>
</div>

<h1>Showing {{$organizations->name}}</h1>
<div class="jumbotron text-left">
        <h2>{{ $organizations->name }}</h2>
        <p>
            <strong>Address:</strong> {{ $organizations->addr }}<br>
            <strong>Region:</strong> {{ $organizations->region }}<br>
            <strong>Phone No:</strong> {{ $organizations->phone_no }}<br>
            <strong>Register Date:</strong> {{ $organizations->reg_date }}<br>
            <strong>Logo: </strong><img class ="myImg" src="{{asset('images/'.$organizations->image)}}" height="150" weight="200" ><br>
        </p>
</div>

@endsection