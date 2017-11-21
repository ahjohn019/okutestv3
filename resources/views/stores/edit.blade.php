@extends('master.marketmenu')

@section('content')
    <div class="container">
      <div class="panel panel-default">
      <div class="panel-heading"><h3><strong>Edit Store</strong></h3></div>
      @include('include.messages')
      {!! Form::model($store,array('route'=>['store.update',$store->id], 'method'=>'PUT', 'files'=>true)) !!}
          <div class="form-group">
              {{Form::label('storeName', 'Store Name')}}
              {{Form::text('storeName', $store->storeName,['class' => 'form-control', 'placeholder' => 'Enter Store Name'])}}
          </div>
          <div class="form-group">
              {{Form::label('storeDesc', 'Description')}}
              {{Form::textarea('storeDesc', $store->storeDesc,['class' => 'form-control', 'placeholder' => 'Enter Store Description', 'rows' => '5'])}}
          </div>
          <div class="form-group">
              {{Form::label('storeAddress', 'Address')}}
              {{Form::textarea('storeAddress', $store->storeAddress,['class' => 'form-control', 'placeholder' => 'Enter Store Address', 'rows' => '5'])}}
          </div>
          <div>
              {{Form::label('storeImage', 'Upload Store Photo')}}
              {{Form::file('storeImage')}}
              <br>
          </div>
          <table class="table">
          <tr><td>
          <div class="form-group">
              {{Form::label('storeRepresentative1', 'Store Representative 1')}}
              {{Form::text('storeRepresentative1', $store->storeRepresentative1,['class' => 'form-control', 'placeholder' => 'Enter Representative Name'])}}
          </div>
          <div class="form-group">
              {{Form::label('representativeNum1', 'Representative 1 Contact No.')}}
              {{Form::text('representativeNum1', $store->representativeNum1,['class' => 'form-control', 'placeholder' => 'Enter Contact Number'])}}
          </div>
          <div class="form-group">
              {{Form::label('representativeEmail1', 'Representative 1 Email')}}
              {{Form::text('representativeEmail1', $store->representativeEmail1,['class' => 'form-control', 'placeholder' => 'Enter Email'])}}
          </div>
        </td>
        <td>
        <div class="form-group">
            {{Form::label('storeRepresentative2', 'Store Representative 2')}}
            {{Form::text('storeRepresentative2', $store->storeRepresentative2,['class' => 'form-control', 'placeholder' => 'Enter Representative Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('representativeNum2', 'Representative 2 Contact No.')}}
            {{Form::text('representativeNum2', $store->representativeNum2,['class' => 'form-control', 'placeholder' => 'Enter Contact Number'])}}
        </div>
        <div class="form-group">
            {{Form::label('representativeEmail2', 'Representative 2 Email')}}
            {{Form::text('representativeEmail2', $store->representativeEmail2,['class' => 'form-control', 'placeholder' => 'Enter Email'])}}
        </div>
      </td>
      </tr>
        </table>
          <div class="form-group">
              {{Form::text('orgID', $store->orgID,['class' => 'hidden'])}}
              {{Form::submit('Update',['class'=> 'btn btn-primary'])}}
          </div>
      {!! Form::close() !!}
    </div>
    </div>
@endsection
