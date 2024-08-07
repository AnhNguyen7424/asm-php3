@extends('users.layouts.default')

@section('content')
<section class="products section--lg container">

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
                <span class="product__category">Quần áo</span>
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
                {{-- <form action="{{ route("cart.add") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" min="0" class="quantity" name="quantity" value="1" />
                    <input type="hidden" name="user_id" class="form-control" value="1">
                    <input type="hidden" name="product_id" class="form-control" value="{{ $value->id }}">
                    <input type="hidden" name="price" class="form-control" value="{{ $value->gia_moi }}">
    
                    <button type="submit" class="action__btn cart__btn" aria-label="Thêm vào giỏ hàng"><i class="fi fi-rs-shopping-bag-add"></i></button>
                </form> --}}
                </div>
            </div>
        @endforeach

    

      
    </div>
    <ul class="pagination">
        <li><a href="#" class="pagination__link active">01</a></li>
        <li><a href="#" class="pagination__link">02</a></li>
        <li><a href="#" class="pagination__link">03</a></li>
        <li><a href="#" class="pagination__link">...</a></li>
        <li><a href="#" class="pagination__link">16</a></li>
        <li><a href="#" class="pagination__link icon">
          >>
        </a></li>
    </ul>
  </section>
@endsection