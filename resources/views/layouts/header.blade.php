<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Trang chủ</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sản phẩm<span class="caret"></span></a>
          <ul class="dropdown-menu">
            @foreach ($type_products as $key)
              <li><a href="san-pham/{{$key->id}}">{{$key->name}}</a></li>
            @endforeach
          </ul>
        </li>
        <li><a href="#">Giới thiệu</a></li>
        <li><a href="lien-he">Liên hệ</a></li>
      </ul>
      <form class="navbar-form navbar-left" action="tim-kiem" method="get" role="search">
        <div class="form-group">
          <input style="width:300px;"type="text" name="tukhoa" class="form-control" placeholder="Tìm kiếm...">
        </div>
        <button class="btn btn-default btn-sm" type="submit">
          <span class="w3-large w3-text-blue fa fa-search"></span>
        </button>
      </form>
      <ul class="nav navbar-nav navbar-right">

        <li><a href="gio-hang"><span class="glyphicon glyphicon-shopping-cart"></span>(@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif)</a></li>
        @if (Auth::check())
          <li><a href=""><span class="glyphicon glyphicon-user"></span>{{Auth::user()->full_name}}</a></li>
          <li><a href="dang-xuat">Đăng xuất</a></li>
        @else
          <li><a href="dang-nhap"><span class="glyphicon glyphicon-log-in"></span>Đăng nhập</a></li>
          <li><a href="dang-ki"><span class="glyphicon glyphicon-user"></span>Đăng kí</a></li>
        @endif


      </ul>
    </div>
  </div>
</nav>
