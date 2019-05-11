@extends('layouts.master')
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-sm-12 col-md-10 col-md-offset-1">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>Sản phẩm</th>
                          <th>Số lượng</th>
                          <th class="text-center">Giá</th>
                          <th class="text-center">Thành tiền</th>
                          <th> </th>
                      </tr>
                  </thead>
                  <tbody>
                    @if(Session::has('cart'))
      							@foreach($product_cart as $product)
                      <tr>
                          <td class="col-sm-8 col-md-6">
                          <div class="media">
                              <a class="thumbnail pull-left" href="#"> <img class="media-object" src="image/product/{{$product['item']['image']}}" style="width: 72px; height: 72px;"> </a>
                              <div class="media-body">
                                  <h4 class="media-heading"><a href="chi-tiet/{{$product['item']['id']}}">{{$product['item']['name']}}</a></h4>
                                  <?php
                                      $temp=DB::table('products')->where('id',$product['item']['id'])->first();
                                      $name_type=DB::table('type_products')->where('id',$temp->id_type)->first();
                                   ?>
                                  <h5 class="media-heading">Thể loại:<a href="san-pham/{{$name_type->id}}">{{$name_type->name}}</a></h5>
                                  <span>Tác giả: </span><span class="text-success"><strong>{{$temp->author}}</strong></span>
                              </div>
                          </div></td>
                          <td class="col-sm-1 col-md-1" style="text-align: center">
                            <label>{{$product['qty']}}</label>
                          </td>
                          @if($product['item']['promotion_price']==0)
                            <?php
                                $gia=number_format($product['item']['unit_price']);
                            ?>
                          @else
                            <?php
                              $gia= number_format($product['item']['promotion_price']);
                             ?>
                          @endif
                          <td class="col-sm-1 col-md-1 text-center">
                            <strong>
                              {{$gia}}
                            </strong></td>
                            <?php
                              $tien=$product['qty']*$gia*1000;
                             ?>
                          <td class="col-sm-1 col-md-1 text-center"><strong>{{number_format($tien)}}</strong></td>
                          <td class="col-sm-1 col-md-1">
                            <a href="del-cart/{{$product['item']['id']}}">
                              <button type="button" class="btn btn-danger">
                                  <span class="glyphicon glyphicon-remove"></span>Xóa
                              </button>
                            </a>
                          </td>
                      </tr>
                    @endforeach
                      <tr>
                          <td>   </td>
                          <td>   </td>
                          <td>   </td>
                          <td><h3>Tổng tiền</h3></td>
                          <td class="text-right"><h3>
                            <strong>
                            @if(Session::has('cart'))
                              {{number_format($totalPrice)}}
                            @else
                              0
                            @endif đồng
                          </strong></h3></td>
                      </tr>
                      <tr>
                          <td>   </td>
                          <td>   </td>
                          <td>   </td>
                          <td>
                            <a href=""><button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span>Tiếp tục mua hàng
                            </button></a>
                          </td>
                          <td>
                            <a href="dat-hang"><button type="button" class="btn btn-success">
                                Đặt hàng<span class="glyphicon glyphicon-play"></span>
                            </button></a>
                          </td>
                      </tr>
                    @else
                      <div class="space20">

                      </div>
                      <h1 style="color:red;">Giỏ hàng bạn đang trống </h1>
                      <a href=""class="w3-button w3-blue">Quay lại trang chủ</a>
                    @endif
                  </tbody>
              </table>
          </div>
      </div>
      <div class="space150">

      </div>
  </div>
@endsection
