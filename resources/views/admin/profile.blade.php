@extends('master.marketmenu')

@section('content')

<div class="container">

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>Menu</h3>
          <a href="{{route('org.dashboard')}}">Organization</a>
          <a href="{{route('usertype.dashboard')}}">UserTypes</a>
          <a href="{{route('hand.dashboard')}}">Handicraft</a>
          <a href="{{route('event.dashboard')}}">Event</a>
          <a href="{{route('service.dashboard')}}">Service</a>
          <a href="{{route('feedback.dashboard')}}">Feedback</a>
        </div>
    <span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a> {{Auth::check() ? Auth::user()->name : 'Account'}} DASHBOARD </span>


 <div class="row">   
    <div class="col-md-4 col-md-offset-4">
        
        <div class="panel-body">
         @component('components.who')
         @endcomponent
        </div>
    </div>
  </div>
</div>
@endsection