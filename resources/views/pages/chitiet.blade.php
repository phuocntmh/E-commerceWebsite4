@extends('layouts.master')
@section('content')
  <div class="container w3-border">

    <div class="row">
      <div class="col-md-2">
        <img src="image/product/{{$details->img1}}" style="width:100%;height:200px;" alt="">
        <div class="space10"></div>
        <img src="image/product/{{$details->img2}}" style="width:100%;height:200px;" alt="">
        <a style="margin-top:40px;"href="add-cart/{{$details->id}}" class="w3-button w3-xlarge w3-green glyphicon glyphicon-shopping-cart"><span style="font-size:17px;">Thêm vào giỏ hàng</span></a>
      </div>
      <div class="col-md-4" style="text-align: center;">
        <img src="image/product/{{$details->image}}" alt="" style="width:100%;height:400px;">
      </div>

      <div class="col-md-6">
        <h1 style="text-align: center;color:blue;">{{$details->name}}</h1>
        <h4 style="color:blue;">Tác giả: {{$details->author}} </h4>
        <h4 style="color:red;">Giá: {{$details->unit_price}} </h4>
        <h4 style="color:blue;">Mô tả:</h4>
        <p> {{$details->description}} </p>
      </div>
    </div>
    <div class="space20"></div>
    </div>
@endsection
