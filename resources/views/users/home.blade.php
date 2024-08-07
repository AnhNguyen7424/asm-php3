@extends('users.layouts.default')

@section('content')
<section class="home section--lg">
  <div class="home__container container grid">
    <div class="home__content">
      <span class="home__subtitle">Khuyến mãi hấp dẫn</span>
      <h1 class="home__title">Xu Hướng Thời Trang <span> Bộ Sưu Tập Tuyệt Vời </span></h1>
      <p class="home__description">
        Tiết kiệm hơn với phiếu giảm giá & giảm giá tới 20%
      </p>
      <a href="" class="btn">Mua Ngay</a>
    </div>
    <img src="{{ asset('assets/img/home-img.png') }}" alt="" class="home__img">
  </div>
</section>




<section class="products section container">
    <div class="tab__btns">
      <span class="tab__btn active-tab" data-target="#featured">Nổi Bật</span>
      <span class="tab__btn" data-target="#popular">Phổ Biến</span>
      <span class="tab__btn" data-target="#new-addred">Hàng Mới</span>
    </div>

    <div class="tab__items">
      <div class="tab__item active-tab" content id="featured">
        <div class="products__container grid">
          @foreach($products as $key => $value)
            <div class="product__item">
              <div class="product__banner">
                <a href="{{ route('users.detailProduct') }}?idProduct={{ $value->id }}" class="product__images">
                  <img src="{{ asset($value->images[0]->image_url ) }}" alt="" class="product__img default">
                  <img src="{{ asset($value->images[0]->image_url ) }}" alt="" class="product__img hover">
                </a>

                <div class="product__actions">
                  <a href="#" class="action__btn" aria-label="Xem nhanh">
                    <i class="fi fi-rs-eye"></i>
                  </a>

                  <a href="#" class="action__btn" aria-label="Thêm vào danh sách yêu thích">
                    <i class="fi fi-rs-heart"></i>
                  </a>

                  <a href="#" class="action__btn" aria-label="So sánh">
                    <i class="fi fi-rs-shuffle"></i>
                  </a>
                </div>

                <div class="product__badge light-pink">Hot</div>
              </div>

              <div class="product__content">
                <span class="product__category">{{ $value->category->name }}</span>
                <a href="details.html">
                  <h3 class="product__title">{{ $value->name }}</h3>
                </a>
                <div class="product__rating">
                  <i class="fi fi-rs-star"></i>
                  <i class="fi fi-rs-star"></i>
                  <i class="fi fi-rs-star"></i>
                  <i class="fi fi-rs-star"></i>
                  <i class="fi fi-rs-star"></i>
                </div>
                <div class="product__price flex">
                  <span class="new__price">₫{{ number_format($value->price, 0, ',', '.') }}</span>
                  <span class="old__price">₫{{ number_format($value->price + 50000, 0, ',', '.') }}</span>

                </div>

                <form action="" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" min="0" class="quantity" name="quantity" value="1" />
                  <input type="hidden" name="user_id" class="form-control" value="1">
                  <input type="hidden" name="product_id" class="form-control" value="{{ $value->id }}">
                  <input type="hidden" name="price" class="form-control" value="{{ $value->gia_moi }}">
  
                  <button type="submit" class="action__btn cart__btn" aria-label="Thêm vào giỏ hàng"><i class="fi fi-rs-shopping-bag-add"></i></button>
              </form>
              </div>
            </div>
          @endforeach
    </div>
</section>






<div>
  <!--=============== DEALS ===============-->
  <section class="deals section">
    <div class="deals__container container grid">
      <div class="deals__item">
        <div class="deals__group">
          <h3 class="deals__brand">Flash Sale</h3>
          <span class="deals__category">Số lượng có hạn </span>
        </div>

        <h4 class="deals__title">Bộ sưu tập mùa hè - Thiết kế hiện đại mới mẻ</h4>

        <div class="deals__price flex">
          <span class="new__price">₫139.000</span>
          <span class="old__price">₫210.000</span>
        </div>

        <div class="deals__group">
          <p class="deals__countdown-text">Nhanh nào! Chương trình sẽ kết thúc trong:</p>
          <div class="countdown">
            <div class="countdown__amount">
              <p class="countdown__period">02</p>
              <span class="unit">Ngày</span>
            </div>

            <div class="countdown__amount">
              <p class="countdown__period">22</p>
              <span class="unit">Giờ</span>
            </div>

            <div class="countdown__amount">
              <p class="countdown__period">57</p>
              <span class="unit">Phút</span>
            </div>

            <div class="countdown__amount">
              <p class="countdown__period">24</p>
              <span class="unit">Giây</span>
            </div>
          </div>
        </div>

        <div class="deals__btn">
          <a href="details.html" class="btn btn--md">Mua Ngay</a>
        </div>
      </div>

      <div class="deals__item">
        <div class="deals__group">
          <h3 class="deals__brand">Thời trang Nữ</h3>
          <span class="deals__category">Áo & túi xách</span>
        </div>

        <h4 class="deals__title">Bạn hãy thử một cái gì đó mới vào mùa hè</h4>

        <div class="deals__price flex">
          <span class="new__price">₫139.000</span>
          <span class="old__price">₫210.000</span>
        </div>

        <div class="deals__group">
          <p class="deals__countdown-text">Nhanh nào! Chương trình sẽ kết thúc trong:</p>
          <div class="countdown">
            <div class="countdown__amount">
              <p class="countdown__period">02</p>
              <span class="unit">Ngày</span>
            </div>

            <div class="countdown__amount">
              <p class="countdown__period">22</p>
              <span class="unit">Giờ</span>
            </div>

            <div class="countdown__amount">
              <p class="countdown__period">57</p>
              <span class="unit">Phút</span>
            </div>

            <div class="countdown__amount">
              <p class="countdown__period">24</p>
              <span class="unit">Giây</span>
            </div>
          </div>
        </div>

        <div class="deals__btn">
          <a href="details.html" class="btn btn--md">Mua Ngay</a>
        </div>
      </div>
    </div>
  </section>

  <!--=============== NEW ARRIVALS ===============-->
  <section class="new__arrivals container section">
    <h3 class="section__title">
      Hàng<span> Mới Về</span> 
   </h3>
  </section>

  <!--=============== SHOWCASE ===============-->
  <section class="showcase section">
    <div class="showcase__container container grid">
      <div class="showcase__wrapper">
        <h3 class="section__title">Hàng Hot</h3>

        <div class="showcase__item">
          <a href="details.html" class="showcase__img-box">
            <img src="{{ asset('assets/img/showcase-img-1.jpg') }}" alt="" class="showcase__img">
          </a>

          <div class="showcase__content">
            <a href="details.html">
              <h4 class="showcase__title">Túi Xách Nữ Đeo Chéo Chính Hãng</h4>
            </a>

            <div class="showcase__price flex">
              <span class="new__price">₫199.000</span>
              <span class="old__price">₫243.000</span>
            </div>
          </div>
        </div>

        <div class="showcase__item">
          <a href="details.html" class="showcase__img-box">
            <img src="{{ asset('assets/img/showcase-img-2.jpg') }}" alt="" class="showcase__img">
          </a>

          <div class="showcase__content">
            <a href="details.html">
              <h4 class="showcase__title">Vỏ gối nằm cotton poly</h4>
            </a>

            <div class="showcase__price flex">
              <span class="new__price">₫50.000</span>
              <span class="old__price">₫99.000</span>
            </div>
          </div>
        </div>

        <div class="showcase__item">
          <a href="details.html" class="showcase__img-box">
            <img src="{{ asset('assets/img/showcase-img-3.jpg') }}" alt="" class="showcase__img">
          </a>

          <div class="showcase__content">
            <a href="details.html">
              <h4 class="showcase__title">Túi Xách nữ đeo chéo đeo vai thời trang công sở</h4>
            </a>

            <div class="showcase__price flex">
              <span class="new__price">₫158.000</span>
              <span class="old__price">₫210.000</span>
            </div>
          </div>
        </div>

      </div>

      <div class="showcase__wrapper">
        <h3 class="section__title">Deals & Outlet</h3>

        <div class="showcase__item">
          <a href="details.html" class="showcase__img-box">
            <img src="{{ asset('assets/img/showcase-img-4.jpg') }}" alt="" class="showcase__img">
          </a>

          <div class="showcase__content">
            <a href="details.html">
              <h4 class="showcase__title">Túi Xách Nữ Đeo Chéo Chính Hãng </h4>
            </a>

            <div class="showcase__price flex">
              <span class="new__price">₫199.000</span>
              <span class="old__price">₫243.000</span>
            </div>
          </div>
        </div>

        <div class="showcase__item">
          <a href="details.html" class="showcase__img-box">
            <img src="{{ asset('assets/img/showcase-img-5.jpg') }}" alt="" class="showcase__img">
          </a>

          <div class="showcase__content">
            <a href="details.html">
              <h4 class="showcase__title">Vỏ gối nằm cotton poly</h4>
            </a>

            <div class="showcase__price flex">
              <span class="new__price">₫50.000</span>
              <span class="old__price">₫99.000</span>
            </div>
          </div>
        </div>

        <div class="showcase__item">
          <a href="details.html" class="showcase__img-box">
            <img src="{{ asset('assets/img/showcase-img-6.jpg') }}" alt="" class="showcase__img">
          </a>

          <div class="showcase__content">
            <a href="details.html">
              <h4 class="showcase__title">Túi Xách nữ đeo chéo đeo vai thời trang công sở</h4>
            </a>

            <div class="showcase__price flex">
              <span class="new__price">₫158.000</span>
              <span class="old__price">₫210.000</span>
            </div>
          </div>
        </div>
      </div>

      <div class="showcase__wrapper">
        <h3 class="section__title">Bán Chạy Nhất</h3>

        <div class="showcase__item">
          <a href="details.html" class="showcase__img-box">
            <img src="{{ asset('assets/img/showcase-img-7.jpg') }}" alt="" class="showcase__img">
          </a>

          <div class="showcase__content">
            <a href="details.html">
              <h4 class="showcase__title">Túi Xách Nữ Đeo Chéo Chính Hãng </h4>
            </a>

            <div class="showcase__price flex">
              <span class="new__price">₫199.000</span>
              <span class="old__price">₫243.000</span>
            </div>
          </div>
        </div>

        <div class="showcase__item">
          <a href="details.html" class="showcase__img-box">
            <img src="{{ asset('assets/img/showcase-img-8.jpg') }}" alt="" class="showcase__img">
          </a>

          <div class="showcase__content">
            <a href="details.html">
              <h4 class="showcase__title">Vỏ gối nằm cotton poly</h4>
            </a>

            <div class="showcase__price flex">
              <span class="new__price">₫50.000</span>
              <span class="old__price">₫99.000</span>
            </div>
          </div>
        </div>

        <div class="showcase__item">
          <a href="details.html" class="showcase__img-box">
            <img src="{{ asset('assets/img/showcase-img-9.jpg') }}" alt="" class="showcase__img">
          </a>

          <div class="showcase__content">
            <a href="details.html">
              <h4 class="showcase__title">Túi Xách nữ đeo chéo đeo vai thời trang công sở</h4>
            </a>

            <div class="showcase__price flex">
              <span class="new__price">₫158.000</span>
              <span class="old__price">₫210.000</span>
            </div>
          </div>
        </div>
      </div>

      <div class="showcase__wrapper">
        <h3 class="section__title">Xu Hướng</h3>

        <div class="showcase__item">
          <a href="details.html" class="showcase__img-box">
            <img src="{{ asset('assets/img/showcase-img-6.jpg') }}" alt="" class="showcase__img">
          </a>

          <div class="showcase__content">
            <a href="details.html">
              <h4 class="showcase__title">Túi Xách Nữ Đeo Chéo Chính Hãng </h4>
            </a>

            <div class="showcase__price flex">
              <span class="new__price">₫199.000</span>
              <span class="old__price">₫243.000</span>
            </div>
          </div>
        </div>

        <div class="showcase__item">
          <a href="details.html" class="showcase__img-box">
            <img src="{{ asset('assets/img/showcase-img-9.jpg') }}" alt="" class="showcase__img">
          </a>

          <div class="showcase__content">
            <a href="details.html">
              <h4 class="showcase__title">Vỏ gối nằm cotton poly</h4>
            </a>

            <div class="showcase__price flex">
              <span class="new__price">₫50.000</span>
              <span class="old__price">₫99.000</span>
            </div>
          </div>
        </div>

        <div class="showcase__item">
          <a href="details.html" class="showcase__img-box">
            <img src="{{ asset('assets/img/showcase-img-4.jpg') }}" alt="" class="showcase__img">
          </a>

          <div class="showcase__content">
            <a href="details.html">
              <h4 class="showcase__title">Túi Xách nữ đeo chéo đeo vai thời trang công sở</h4>
            </a>

            <div class="showcase__price flex">
              <span class="new__price">₫158.000</span>
              <span class="old__price">₫210.000</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--=============== NEWSLETTER ===============-->
  <section class="newsletter section home__newsletter">
    <div class="newsletter__container container grid">
      <h3 class="newsletter__title flex">
        <img src="assets/img/icon-email.svg" alt="" class="newsletter__icon">
        Đăng ký để nhận thêm nhiều ưu đãi
      </h3>

      <p class="newsletter__description">
        ...và nhận phiếu giảm giá 35% cho lần mua sắm đầu tiên.
      </p>

      <form action="#" class="newsletter__form">
        <input type="text" placeholder="Nhập email của bạn" class="newsletter__input">
        <button type="submit" class="newsletter__btn">ĐăngKý</button>
      </form>
    </div>
  </section>
</div>
@endsection