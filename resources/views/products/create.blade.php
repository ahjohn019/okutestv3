@extends('master.marketmenu')

@section('content')
<div class="container">
  <div class="panel panel-default">
  <div class="panel-heading"><h3><strong>Add New Product </strong></div>
    {!! Form::open(array('route'=>'product.store', 'files'=>true)) !!}
        <div class="form-group">
            {{Form::label('productName', 'Name')}}
            {{Form::text('productName', '',['class' => 'form-control', 'placeholder' => 'Enter Product Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('productDesc', 'Description')}}
            {{Form::textarea('productDesc', '',['class' => 'form-control', 'placeholder' => 'Enter Product Description', 'rows' => '5'])}}
        </div>
        <div class="form-group">
            {{Form::label('productPrice', 'Price (MYR)')}}
            {{Form::text('productPrice', '',['class' => 'form-control', 'placeholder' => 'Enter Product Price', 'rows' => '1'])}}
        </div>
        <div>
            {{Form::label('productImage1', 'Upload Photo 1')}}
            {{Form::file('productImage1')}}
            <br>
        </div>
        <div>
            {{Form::label('productImage2', 'Upload Photo 2')}}
            {{Form::file('productImage2')}}
            <br>
        </div>
        <div>
            {{Form::label('productImage3', 'Upload Photo 3')}}
            {{Form::file('productImage3')}}
            <br>
        </div>
        <div class="form-group">
            {{Form::label('productQuantity', 'Quantity On Hand')}}
            {{Form::text('productQuantity', '',['class' => 'form-control', 'placeholder' => 'Enter Quantity on hand'])}}
        </div>
        <div class="form-group">
            {{Form::label('productCategory', 'Category')}}
            {{Form::select('productCategory', ['TEXTILES' => 'TEXTILES','WOODCRAFT' => 'WOODCRAFT','PAPERCRAFT' => 'PAPERCRAFT','POTTERY/GLASSCRAFT' => 'POTTERY/GLASSCRAFT','JEWELLERY' => 'JEWELLERY','OTHERS' => 'OTHERS'])}}
        </div>
        <div class="form-group">
            {{Form::label('productStatus', 'Status')}}
            {{ Form::select('productStatus', ['ACTIVE' => 'ACTIVE','DEACTIVE' => 'DEACTIVE']) }}
        </div>
        <div class="form-group">
              {{Form::text('storeID', $storeid,['class' => 'hidden'])}}
        </div>
        <div class="form-group">
            {{Form::submit('Submit',['class'=> 'btn btn-primary1'])}}
        </div>
    {!! Form::close() !!}
  </div>
  </div>
@endsection
