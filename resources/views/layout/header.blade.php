<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}"><i class="fa-solid fa-house"> </i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}"><i class="fa-solid fa-money-check"> </i> MANAGER</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('store.index') }}"><i class="fa-solid fa-store"> </i> STORE</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                MORE <i class="fa-solid fa-angles-right"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          @guest
          <button type="button" class="btn"><a href="{{ route('user.login') }}" class="nav-item text-dark" style="text-decoration-line: none">Đăng nhập</a></button>
          <button type="button" class="btn" style="margin-left:10px"><a href="{{ route('user.signin') }}" class="nav-item text-dark" style="text-decoration-line: none">Đăng ký</a></button>
          @else
          <p class="mt-3">Xin chào, {{ Auth::user()->name }}</p>
          <button type="button" class="btn"><a href="{{ route('user.logout') }}" class="nav-item text-dark" style="text-decoration-line: none"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></button>              
          @endguest         
        </form>
      </div>
    </div>
  </nav>