@extends('layouts.master')

@section('content')
<div class="container">
  <div class="space50"></div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      @if (count($errors)>0)
      <div class="alert alert-danger" style="text-align: center;">
        @foreach ($errors->all() as $err)
          {{$err}}<br>
        @endforeach
      </div>
      @endif
      @if (session('thongbao'))
        <div class="alert alert-success" style="text-align: center;">
          {{session('thongbao')}}
        </div>
        <a href="dang-nhap"class="w3-xxlarge w3-btn w3-blue" style="margin-left:30%;">Đăng nhập</a>
        <div class="space50"></div>
        <h2 style="text-align: center;color:#ff0000">WELLCOME TO</h2>
      @else
        <form class="w3-container w3-card-4" action="dang-ki" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <h2 class="w3-text-black">Đăng ký</h2>
        <p>
        <label class="w3-text-blue"><b>Họ tên</b></label>
        <input class="w3-input w3-border" name="fullname" type="text"></p>
        <p>
        <label class="w3-text-blue"><b>Email</b></label>
        <input class="w3-input w3-border" name="email" type="email"></p>
				<p>
        <label class="w3-text-blue"><b>Điện thoại</b></label>
        <input class="w3-input w3-border" name="phone" type="text"></p>
        <p>
					<p>
	        <label class="w3-text-blue"><b>Địa chỉ</b></label>
	        <input class="w3-input w3-border" name="address" type="text"></p>
        <label class="w3-text-blue"><b>Mật khẩu</b></label>
        <input class="w3-input w3-border" name="password" type="password"></p>
        <p>
        <label class="w3-text-blue"><b>Nhập lại mật khẩu</b></label>
        <input class="w3-input w3-border" name="re_password" type="password"></p>


        <p>
        <button type="submit" class="w3-btn w3-blue">Đăng ký</button></p>
      </form>
      @endif
    </div>
    <div class="col-md-3"></div>
  </div>
  <div class="space100"></div>
</div>

@endsection
