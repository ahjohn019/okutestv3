@extends('admin.profile')


@section('content')
<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Edit</h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>Edit</h3>
          <a href="{{route('event.dashboard')}}">Back To Event</a>
</div>
@if(auth()->user()->id==$events->admin_id)
{{ Html::ul($errors->all()) }}
{{ Form::model($events, array('route' => array('event.update', $events->id), 'method' => 'PUT')) }}
<div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('desc', 'Description') }}
        {{ Form::textarea('desc', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('start_date', 'Start Date:') }}
        {{ Form::text('start_date', null, array('id' => 'datepicker')) }}
</div>
<div class="form-group">
        {{ Form::label('end_date', 'End Date:') }}
        {{ Form::text('end_date', null, array('id' => 'datepicker2')) }}
</div>
<div class="form-group">
        {{ Form::label('place', 'Place:') }}
        {{ Form::text('place', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('type', 'Type:') }}
        {{ Form::text('type', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{Form::label('org_id',"Organization: ")}}
        {{Form::select('org_id', $organizations , null , ['class'=>'form-control']) }}
</div>
<div class="form-group">
        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
</div>
{{ Form::close() }}
@else
<div class="alert alert-danger">
  <strong>Sorry! </strong> You are unavailable to edit other user content
</div>

@endif
@endsection