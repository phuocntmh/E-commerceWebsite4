@extends('layouts.master')

@section('content')
  @include('layouts.slide')
  <div class="container">
    <h2 class="w3-border-bottom">Sản phẩm mới</h2>
    <div class="space10"></div>
    <div class="row">
      @foreach ($new as $key)
        <div class="col-md-3"style="margin-bottom:20px;">
          <div class="card w3-border" style="margin-right:5px">
              <!--Card image-->
              <div class="card-image">
                <div class="row">
                  <div class="col-md-1">

                  </div>
                  <div class="col-md-10">
                    <a href="chi-tiet/{{$key->id}}"><img class="img-fluid" src="image/product/{{$key->image}}" alt="" style="width:95%;height:300px;"></a>
                  </div>
                  <div class="col-md-1">

                  </div>
                </div>
              </div>
              <div class="space10"></div>
              <!--/.Card image-->
              <!--Card content-->
              <div class="card-block" style="margin-bottom:20px;margin-left:30px">
                  <!--Title-->
                  <h4 class="card-title" style="color:green;">{{$key->name}}</h4>
                  <!--Text-->
                  <p class="card-text"> Giá: <i style="color:blue;">{{number_format($key->unit_price)}}</i></p>
                  <p class="card-text"> Khuyến mãi: <i>{{number_format($key->promotin_price)}}</i></p>
                  <p class="card-text"> Tình trạng: <i></i></p>
                  <a href="add-cart/{{$key->id}}" style="margin-left:2%"class="btn btn-primary glyphicon glyphicon-shopping-cart"> Mua</a>
                  <a href="chi-tiet/{{$key->id}}" style="margin-left:2%" class="btn btn-primary">Chi tiết</a>
              </div>
              <!--/.Card content-->
          </div>
        </div>
      @endforeach
    </div>
    {{$new->links()}}
</div>

@endsection
