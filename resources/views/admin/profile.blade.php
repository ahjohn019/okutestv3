@extends('master.marketmenu')

@section('content')

<div class="container">
@if (Auth::guard('admin')->check())
<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>Menu</h3>
          <a href="{{route('org.dashboard')}}">Organization</a>
          <a href="{{route('usertype.dashboard')}}">UserTypes</a>
          <a href="{{route('event.dashboard')}}">Event</a>
          <a href="{{route('service.dashboard')}}">Service</a>
          <a href="{{route('artist.dashboard')}}">Artist</a>
          <a href="{{route('feedback.dashboard')}}">Feedback</a>
        </div>
    <span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a> {{Auth::check() ? Auth::user()->name : 'Account'}} DASHBOARD </span>
    @endif



 <div class="row">   
    <div class="col-md-4 col-md-offset-4">
        
        <div class="panel-body">
         @component('components.who')
         @endcomponent
        </div>
    </div><!-- end of col-md-4 -->
  </div><!-- end of row -->
 
  <div class="col-sm-6 col-md-4">
  <div class="thumbnail">
  <img class ="myImg" src="#" height="150" weight="200" >
    <div class="caption">
      <h3>Organization</h3>
      
    </div>
  </div>
</div> 

<div class="col-sm-6 col-md-4">
  <div class="thumbnail">
  <img class ="myImg" src="#" height="150" weight="200" >
    <div class="caption">
      <h3>UserType</h3>
      
    </div>
  </div>
</div> 


<div class="col-sm-6 col-md-4">
  <div class="thumbnail">
  <img class ="myImg" src="#" height="150" weight="200" >
    <div class="caption">
      <h3>Event</h3>
      
    </div>
  </div>
</div> 

<div class="col-sm-6 col-md-4">
  <div class="thumbnail">
  <img class ="myImg" src="#" height="150" weight="200" >
    <div class="caption">
      <h3>Service</h3>
      
    </div>
  </div>
</div> 

<div class="col-sm-6 col-md-4">
  <div class="thumbnail">
  <img class ="myImg" src="#" height="150" weight="200" >
    <div class="caption">
      <h3>Artist</h3>
      
    </div>
  </div>
</div>

<div class="col-sm-6 col-md-4">
  <div class="thumbnail">
  <img class ="myImg" src="#" height="150" weight="200" >
    <div class="caption">
      <h3>Feedback</h3>
      
    </div>
  </div>
</div>

</div>
@endsection