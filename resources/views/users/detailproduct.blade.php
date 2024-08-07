@extends('users.layouts.default')

@section('content')
<section class="details section--lg">
    <div class="details__container container grid">
      <div class="details__group">
        <img src="{{ asset($product->images[0]->image_url) }}" alt="" class="details__img">

        <div class="details__small-images grid">
          <img src="{{ asset('assets/img/product-8-2.jpg') }}" class="details__small-img" alt="">

          <img src="{{ asset('assets/img/product-8-1.jpg') }}" class="details__small-img" alt="">
          
          <img src="{{ asset('assets/img/product-8-2.jpg') }}" class="details__small-img" alt="">
          
            {{-- @foreach($product->images as $value)
              <img src="{{ asset($value->image_url) }}" alt="" class="second-image">
            @endforeach --}}

        </div>
      </div>

      <div class="details__group">
        <div class="h3 details__title">{{ $product->name }}</div>
        <p class="details__brand">Thương hiệu: adidas</span></p>
        <p class="details__brand">Danh mục: {{ $product->category->name }}</p>

        <div class="details__price flex">
            <span class="new__price">₫{{ number_format($product->price, 0, ',', '.') }}</span>
            <span class="old__price">₫{{ number_format($product->price + 50000, 0, ',', '.') }}</span>
          <span class="save__price">Giảm 20%</span>
        </div>

        <p class="short__description">
          {{ $product->description }}.
        </p>

        <ul class="product__list">
          <li class="list_item flex">
            <i class="fi-rs-crown"></i> Bảo hành thương hiệu AL Jazeera 1 năm
          </li>

          <li class="list_item flex">
            <i class="fi-rs-refresh"></i> Chính sách hoàn trả trong 30 ngày
          </li>
          
          <li class="list_item flex">
            <i class="fi-rs-credit-card"></i> Tiền mặt khi giao hàng có sẵn
          </li>
        </ul>

        <div class="details__color flex">
          <span class="details__color-title">Màu</span>

          <ul class="color__list">
            <li>
              <a href="#" class="color__link" style="background-color: hsl(37, 100%, 65%);"></a>
            </li>

            <li>
              <a href="#" class="color__link" style="background-color: hsl(353, 100%, 67%);"></a>
            </li>

            <li>
              <a href="#" class="color__link" style="background-color: hsl(49, 100%, 60%);"></a>
            </li>

            <li>
              <a href="#" class="color__link" style="background-color: hsl(304, 100%, 78%);"></a>
            </li>

            <li>
              <a href="#" class="color__link" style="background-color: hsl(126, 61%, 52%);"></a>
            </li>
          </ul>
        </div>

        <div class="details__size flex">
          <span class="details__size-title">Size</span>

          <ul class="size__list">
            <li>
              <a href="#" class="size__link size-active">M</a>
            </li>
            
            <li>
              <a href="#" class="size__link">L</a>
            </li>

            <li>
              <a href="#" class="size__link">XL</a>
            </li>

            <li>
              <a href="#" class="size__link">XXL</a>
            </li>
          </ul>
        </div>

        <div class="details__action">
            <form action="{{ route('users.addToCart') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" min="0" value="1"> <br>

                <button type="submit" class="btn btn--sm">Thêm vào giỏ hàng</button>
            </form>
            <a href="#" class="details__action-btn">
                <i class="fi fi-rs-heart"></i>
            </a>
        </div>

        <ul class="details__meta">
          <li class="meta__list flex"><span>Mã:</span> FWM15VKT</li>
          <li class="meta__list flex"><span>Loại:</span> Vải</li>
          <li class="meta__list flex"><span>Sẵn Có:</span> Các mặt hàng còn hàng</li>
        </ul>
      </div>
    </div>
  </section>

@endsection