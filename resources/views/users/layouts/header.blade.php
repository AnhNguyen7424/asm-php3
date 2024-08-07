<header class="header">
    <div class="header__top">
      <div class="header__container container">
        <div class="header__contact">
          <span> (+84) 0326477448</span>
          <span> Vĩnh phúc</span>
        </div>
        <p class="header__alert-news">
          Ưu đãi siêu giá trị - Tiết kiệm nhiều hơn với phiếu giảm giá
        </p>
        <div class="flex-equal text-end ms-1">
          @if(Auth::check())
              <div class="dropdown">
                  <a class="text-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Xin chào: {{ Auth::user()->name }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{ route('users.userInfo') }}">Thông tin</a></li>
                  @if(Auth::user()->role == '1')
                      <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Trang Admin</a></li>
                  @endif
                  <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                  </ul>
              </div>
          @else
              <a href="{{ route('login') }}" class="btn btn-success">Sign
              In</a>
          @endif
      </div>
      </div>
    </div>

    <nav class="nav container">
      <a href="{{ route('users.home') }}" class="nav__logo">
        <img src="{{ asset('assets/img/Va%20store.jpg') }}" alt="" class="nav__logo-img">
      </a>

      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="{{ route('users.home') }}" class="nav__link active-link">Trang Chủ</a>
          </li>

          <li class="nav__item">
            <a href="{{ route('users.shop') }}" class="nav__link">Shop</a>
          </li>

          <li class="nav__item">
            <a href="{{ route('users.danhmuc') }}" class="nav__link">Danh mục sản phẩm</a>
            {{-- <select name="" id="" value="Danh mục sản phẩm">
                danh mục sản phẩm
            </select> --}}
          </li>

          <li class="nav__item">
            <a href="" class="nav__link">Liên hệ</a>
          </li>

          <li class="nav__item">
            <a href="#" class="nav__link">Đăng Nhập</a>
          </li>
        </ul>

        <div class="header__search">
          <input type="text" placeholder= "Nhập đồ bạn muốn tìm..." class="form__input"
          />
          <button class="search__btn">
            <img src="{{ asset('assets/img/search.png') }}" alt="">
          </button>
        </div>
      </div>

      <div class="header__user-actions">
        <a href="#" class="header__action-btn">
          <img src="{{ asset('assets/img/icon-heart.svg') }}" alt="">
          <span class="count">3</span>
        </a>

        <a href="http://127.0.0.1:8000/users/view-cart" class="header__action-btn">
          <img src="{{ asset('assets/img/icon-cart.svg') }}" alt="">
          {{-- <span class="count">{{ $soluong = DB::table("cart_items")->count();}}</span> --}}
        </a>
      </div>
    </nav>
  </header>