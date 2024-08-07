<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" style="padding-left:10px" href="{{ route('home') }}"><i class="fa-solid fa-house"> </i> DMStore</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @auth
              @if (Auth::user()['user_catalogues_id']==1)
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}"><i class="fa-solid fa-money-check" > </i> Quản lý</a>
              </li>
              @endif
          @endauth

          <li class="nav-item">
            <a class="nav-link" href="{{ route('store.index') }}"><i class="fa-solid fa-store"> </i> Sản phẩm</a>
          </li>

          <li class="nav-item">
            <div class="dropdown">
              <a class="btn dropdown-toggle nav-link" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-phone"></i> Liên hệ
              </a>
            
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="https://www.facebook.com/duongxo37"><i class="fa-brands fa-facebook"></i> Facebook</a></li>
                <li><a class="dropdown-item" href="#"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </div>
          </li>

        </ul>
        <form class="d-flex">
          @guest
          <button type="button" class="btn btn-warning"><a href="{{ route('user.login') }}" class="nav-item text-dark" style="text-decoration-line: none">Đăng nhập</a></button>
          <button type="button" class="btn btn-warning" style="margin-left:10px"><a href="{{ route('user.signin') }}" class="nav-item text-dark" style="text-decoration-line: none">Đăng ký</a></button>
          @else
          @php
          $totalQuantity = 0;
          @endphp

          @if (session('cart'))
              @foreach (session('cart') as $item)
                  @php
                      $totalQuantity += 1;
                  @endphp
              @endforeach
          @endif

          <div class="dropdown" style="margin-right:10px">
            <a class="btn btn-outline-danger" href="{{ route('store.cart') }}">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng <span class=" text-bg-danger" id="cart-quantity">{{ $totalQuantity }}</span>
           </a>
           <ul class="dropdown-menu" aria-labelledby="aria-labelledby">
            @if (session('cart'))
              @foreach (session('cart') as $item)
                  <li>
                    <div class="d-flex m-1">
                      <div id="image_frame">
                        @php
                          $images = json_decode($item['images'], true);
                        @endphp
                          <a href="{{ route('store.review',$item['product_id']) }}"><img src="{{ isset($images) ? asset("$images[0]") : 'N/A' }}"  class="card-img-top" style="width:60px;height:90px;" /></a>
                      </div>

                      <div id="info_frame" style="width:280px">
                        <span>{{ $item['name'] }}</span>
                      </div>
                    </div>
                  </li>
              @endforeach  
            @else
            <img src="{{ asset('images/empty-cart.webp') }}" alt="" srcset="" style="width:100%;height:100%;">
            {{-- <span class="justify-center">Không có sản phẩm trong giỏ hàng</span> --}}
            @endif
           </ul>
          </div>

          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Xin chào , {{ Auth::user()['name'] }} 
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li ><button type="button" class="btn dropdown-item"><a href="{{ route('user.info') }}" class="nav-item text-dark" style="text-decoration-line: none"><i class="fa-solid fa-user me-2"></i> Tài khoản</a></button></li>
              <li ><button type="button" class="btn dropdown-item"><a href="{{ route('order.ps_order') }}" class="nav-item text-dark" style="text-decoration-line: none"><i class="fa-regular fa-star me-2"></i> Đơn hàng </a></button></li>
              <li ><button type="button" class="btn dropdown-item"><a href="#" class="nav-item text-dark" style="text-decoration-line: none"><i class="fa-solid fa-gear"></i> Cài đặt</a></button></li>
              <li ><button type="button" class="btn dropdown-item"><a href="{{ route('user.logout') }}" class="nav-item text-dark" style="text-decoration-line: none"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></button></li>
            </ul>
          </div>
          
          @endguest         
        </form>
      </div>
    </div>
  </nav>