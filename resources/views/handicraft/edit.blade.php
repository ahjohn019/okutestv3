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
          <a href="{{route('hand.dashboard')}}">Back To Handicraft</a>
</div>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
{{ Form::model($handicrafts, array('route' => array('hand.update', $handicrafts->id), 'method' => 'PUT','files' => true)) }}

<div class="form-group">
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('description', 'Description:') }}
        {{ Form::text('description', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('price', 'Price:') }}
        {{ Form::text('price', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {!! Form::label('Product Image') !!}
    {!! Form::file('image', null) !!}
</div>
<div class="form-group">
        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
</div>
{{ Form::close() }}

@endsection