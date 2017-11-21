@extends('master.marketmenu')

@section('content')
<div class="container">
{!! Form::model($cartItem,array('route'=>['cartItem.update',$cartItem->id], 'method'=>'PUT')) !!}
<div class="panel panel-default">
<div class="panel-heading">
  <h3><strong><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Cart Item</strong></h3>
<div class="panel-body">

<table class="table">
  <tr><td align="center" colspan="2"><img src="/image/products/{{$product->productImage1}}" style="max-height: 200px" class="img-responsive" ></td></tr>
  <tr>
    <td><label>Name</label></td>
    <td><h4><label>{{$product->productName}}</label><h4></td>
  </tr>
  <tr>
    <td><label>Store</label></td>
    <td>{{$store->storeName}}</td>
  </tr>
  <tr>
    <td><label>Price</label></td>
    <td>RM {{$product->productPrice}}</td>
  </tr>
  <tr>
    <td><label>Quantity</label></td>
    <td>{{Form::text('Quantity', $cartItem->Quantity,['class' => 'form-control'])}}</td>
  </tr>
  <tr>
    <td><label>Delivery Method</label></td>
    <td>
      <div class="details" style="display:none">
        <div class="input-group">
              {{Form::select('DeliveryMethod', ['SELF-PICKUP' => 'Self-Pickup','DELIVERY-COURIER' => 'Delivery-Courier'])}}
          </div>
        </div>
      <a id="more" href="#" onclick="$('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'':'{{$cartItem->DeliveryMethod}}');});">
        {{$cartItem->DeliveryMethod}}
        <span class="fa fa-pencil"></span>
      </a>

  </form>
    </td>
  </tr>

</table>

</div>
</div>
</div>
{{Form::submit('Update',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}
</div>
@endsection
