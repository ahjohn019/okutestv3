@extends('master.marketmenu')

@section('content')
<div class="container">
  <div class="panel panel-default">
  <div class="panel-heading"><h3><strong>Edit Product </strong></h3></div>
    @include('include.messages')
    {!! Form::model($product,array('route'=>['product.update',$product->id], 'method'=>'PUT', 'files'=>true)) !!}
        <div class="form-group">
            {{Form::label('productName', 'Name')}}
            {{Form::text('productName', $product->productName,['class' => 'form-control', 'placeholder' => 'Enter Product Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('productDesc', 'Description')}}
            {{Form::textarea('productDesc', $product->productDesc,['class' => 'form-control', 'placeholder' => 'Enter Product Description', 'rows' => '5'])}}
        </div>
        <div class="form-group">
            {{Form::label('productPrice', 'Price (MYR)')}}
            {{Form::text('productPrice', $product->productPrice,['class' => 'form-control', 'placeholder' => 'Enter Product Price', 'rows' => '1'])}}
        </div>
        <div>
            {{Form::label('productImage1', 'Upload Photo 1')}}
            {{Form::file('productImage')}}
            <br>
        </div>
        <div>
            {{Form::label('productImage2', 'Upload Photo 2')}}
            {{Form::file('productImage')}}
            <br>
        </div>
        <div>
            {{Form::label('productImage3', 'Upload Photo 3')}}
            {{Form::file('productImage')}}
            <br>
        </div>
        <div class="form-group">
            {{Form::label('productQuantity', 'Quantity On Hand')}}
            {{Form::text('productQuantity', $product->productQuantity,['class' => 'form-control', 'placeholder' => 'Enter Quantity on hand'])}}
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
              {{Form::text('storeID', $product->storeID,['class' => 'hidden'])}}
        </div>
        <div class="form-group">
            {{Form::submit('Submit',['class'=> 'btn btn-primary1'])}}
        </div>
    {!! Form::close() !!}
  </div>
  </div>
@endsection
