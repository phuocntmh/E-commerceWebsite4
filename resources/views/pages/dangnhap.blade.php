@extends('layouts.master')

@section('content')
<div class="container">
  <div class="space60"></div>
  @if (count($errors)>0)
  <div class="alert alert-danger" style="text-align:center;width:40%;margin-left:30%">
    @foreach ($errors->all() as $err)
      {{$err}}<br>
    @endforeach
  </div>
  @endif
  @if (session('thongbao'))
    <div class="alert alert-danger" style="text-align:center;width:40%;margin-left:30%">
      {{session('thongbao')}}
    </div>
  @else
    <div class="space30"></div>
  @endif
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 w3-border"style="background-color: rgba(0,0,0,0.1);height:300px;">

      <div class="row">
        <div class="col-md-6">
          <h2 style="margin-left:15px;"> Đăng nhập</h2>
            <form class="w3-container" method="POST" action="dang-nhap">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <p>
                <label class="w3-text-blue"><b>Email</b></label>
                <input class="w3-input w3-border w3-white"  name="email_in" type="email"></p>
              <p>
                <label class="w3-text-blue"><b>Mật khẩu</b></label>
                <input class="w3-input w3-border w3-white"  name="password_in" type="password"></p>
              <p>
              <button class="w3-large w3-button w3-blue">Đăng nhập</button></p>
          </form>

        </div>
        <div class="col-md-6">
          <div class="space100">

          </div>
          <h3 class="w3-text-purple"style="margin-left:10px;">Nếu bạn chưa có tài khoản?</h3>
          <a href="dang-ki" class="w3-xlarge w3-button w3-blue" style="margin-left:25%;margin-bottom:20%;">Đăng ký</a>

        </div>
      </div>
    </div>
  </div>
  <div class="space150"></div>
</div>
@endsection
