@extends('admin.profile')

@section('content')
<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Create Event</h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>Create New</h3>
          <a href="{{route('event.dashboard')}}">Back To Event</a>
</div>

{{ Html::ul($errors->all()) }}
{{ Form::open(array('url' => 'event/create')) }}
<div class="form-group">
        {{ Form::label('name', 'Name :')}}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('desc', 'Description :')}}
        {{ Form::textarea('desc', Input::old('desc'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('start_date', 'Start Date :')}}
        {{ Form::text('start_date','',array('id' => 'datepicker')) }}
</div>
<div class="form-group">
        {{ Form::label('end_date', 'End Date :')}}
        {{ Form::text('end_date','',array('id' => 'datepicker2')) }}
</div>

<div class="form-group">
        {{ Form::label('place', 'Place :')}}
        {{ Form::text('place', Input::old('place'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('type', 'Type :')}}
        {{ Form::text('type', Input::old('type'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{Form::label('org_id', 'Organization :')}}
        <select  class="form-control" name="org_id">
        @foreach($organizations as $org)
        <option value='{{$org->id}}'>{{$org->name}}</option>
        @endforeach
        </select>
</div>
<div class="form-group"> 
{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
</div>
{{ Form::close() }}
@endsection