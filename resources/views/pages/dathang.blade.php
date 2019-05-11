@extends('layouts.master')
@section('content')
<div class="container">

		<form action="" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			@if(Session::has('thongbao'))
        <div class="alert alert-info">
          {{Session::get('thongbao')}}
        </div>
      @endif
			<div class="row">
				<div class="col-md-6">
					<h4>Đặt hàng</h4>
					<div class="space20">&nbsp;</div>



					@if (Auth::check())
						<div class="form-block">
							<label for="name">Họ tên*</label><br>
							<input type="text" name="name" value="{{Auth::user()->full_name}}"readonly="" required>
						</div>
						<div class="form-block">
							<label for="email">Email*</label><br>
							<input type="email" name="email" value="{{Auth::user()->email}}"readonly="">
						</div>
					@else
					<div class="form-block">
							<label for="name">Họ tên*</label><br>
							<input type="text" name="name" placeholder="Họ tên" required>
					</div>
					<div class="form-block">
						<label for="email">Email*</label><br>
						<input type="email" name="email" required placeholder="expample@gmail.com">
					</div>
					@endif
					<div class="form-block">
						<label>Giới tính </label><br>
						<input  type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input  type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
					</div>
					<div class="form-block">
						<label for="adress">Địa chỉ*</label><br>
						<input type="text" name="address" placeholder="Địa chỉ nhận hàng..." required>
					</div>


					<div class="form-block">
						<label for="phone">Điện thoại*</label><br>
						<input type="text" name="phone" required>
					</div>

					<div class="form-block">
						<label for="notes">Ghi chú</label><br>
						<textarea name="notes"></textarea>
					</div>
				</div>
				<div class="col-md-6">
					<div class="your-order">
						<div class="your-order-head"><h3 style="color:blue;">Đơn hàng của bạn</h3></div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
								@if(Session::has('cart'))
								@foreach($product_cart as $cart)
								<!--  one item	 -->
									<div class="media">
										<img width="50px" height="70px" src="image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
										<div class="media-body">
											<p class="font-large">{{$cart['item']['name']}}</p>
											<span class="color-gray your-order-info">Đơn giá: {{number_format($cart['price'])}} đồng</span>
											<span class="color-gray your-order-info">Số lượng: {{$cart['qty']}}</span>
										</div>
									</div>
								<!-- end one item -->
								@endforeach
								@endif
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="space20">

							</div>
							<div class="your-order-item">
								<div class="pull-left" style="color:blue;"><h4 class="your-order-f18">Tổng tiền:</h4></div>
								<div class="pull-right"><h4 style="color:red">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif đồng</h4></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head"><h5 style="font-weight:bold; color:purple;">Hình thức thanh toán</h5></div>

						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input  type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
									<div class="payment_box" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>
								</li>

								<li>
									<input type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản </label>
                  <div class="payment_box" style="display: block;">
										Tài khoản:
                    <br> Chu Thị Khuyên
                    <br> Ngân hàng Viettinbank
										<br> Số tài khoản: 711A5461123
									</div>
								</li>

							</ul>
						</div>

						<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
</div> <!-- .container -->
@endsection
