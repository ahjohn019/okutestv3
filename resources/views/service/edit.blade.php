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
          <a href="{{route('service.dashboard')}}">Back To Service</a>
</div>

{{ Html::ul($errors->all()) }}
{{ Form::model($services, array('route' => array('service.update', $services->id), 'method' => 'PUT')) }}
<div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('desc', 'Description') }}
        {{ Form::textarea('desc', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('type', 'Type') }}
        {{ Form::text('type', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::label('price', 'Price') }}
        {{ Form::text('price', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
</div>
{{ Form::close() }}

@endsection