@extends('users.layouts.default')


@section('content')
<section class="cart section--lg container">
        <div class="table__container">
          <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            @if(count($cart->cartDetails) != 0)
                <form action="{{ route('users.updateCart') }}" method="post">
                    @method('patch')
                    @csrf
                    <tbody>
                        @php
                            $tongTien = 0;
                        @endphp
                        @foreach($cart->cartDetails as $key => $cartDetail)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $cartDetail->product->name }}</td>
                                <td>{{ $cartDetail->product->category->name }}</td>
                                <td>{{ number_format( $cartDetail->product->price) }} VNĐ</td>
                                <td>
                                    <input type="hidden" value="{{ $cartDetail->id }}" name="cartDetailId[]">
                                    <input type="number" value="{{ $cartDetail->quantity }}" name="quantity[]">
                                </td>
                                <td>
                                    @php
                                        $thanhtien = intval($cartDetail->product->price) * intval($cartDetail->quantity );
                                        $tongTien += $thanhtien;

                                        echo number_format($thanhtien) . " VNĐ";
                                    @endphp
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modelDelete" data-cartdeatil-id="{{ $cartDetail->id }}">Xóa</button>
                                    {{-- <form action="{{ route('users.deleteCart') }}" method="post" style="display:inline;">
                                      @csrf
                                      @method('delete')
                                      <input type="hidden" name="cartDetailId" value="{{ $cartDetail->id }}">
                                      <button type="submit" class="btn btn-danger">Xóa</button>
                                  </form> --}}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5"></td>
                            <td>
                                <p>
                                    Tổng tiền:
                                    {{ number_format($tongTien) }} VNĐ
                                </p>
                            </td>
                            <td>
                                <button class="btn btn-warning">Cập nhật</button>
                            </td>
                        </tr>
                    </tbody>
                </form>
            @else
                <tbody>
                    <tr>
                        <td colspan="6">Bạn chưa có sản phẩm trong giỏ hàng</td>
                        <td>
                            <a href="{{ route('users.home') }}" class="btn btn-success">Tiếp tục mua hàng</a>
                        </td>
                    </tr>
                </tbody>
            @endif
        </table>
      </div>

    <div class="divider">
      <i class="fi fi-rs-fingerprint"></i>
    </div>

    <div class="cart__group grid">
      <div>
        <div class="cart__shipping">
          <h3 class="section__title">Tính Toán Vận Chuyển</h3>

          <form action="#" class="form grid">
            <input type="text" placeholder="Quốc Gia" class="form__input">

            <div class="form__group grid">
              <input type="text" placeholder="Thành Phố" class="form__input">

              <input type="text" placeholder="Mã Bưu Điện" class="form__input">
            </div>

            <div class="form__btn">
              <button class="btn flex btn--sm">
                <i class="fi-rs-shuffle"></i> Cập Nhật
              </button>
            </div>
          </form>
        </div>

        <div class="cart__coupon">
          <h3 class="section__title">Mã Giảm Giá</h3>

          <form action="#" class="coupon__form form grid">
            <div class="form__group grid">
              <input type="text" class="form__input" placeholder="Nhập Mã Giảm Giá">

              <div class="form__btn">
                <button class="btn flex btn--sm">
                  <i class="fi-rs-label"></i> Áp Dụng
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="cart__total">
        <h3 class="section__title">Tổng Số Giỏ Hàng</h3>

        <table class="cart__total-table">
          <tr>
            <td><span class="cart__total-title">Tổng</span></td>
            <td><span class="cart__total-price">₫{{ number_format($tongTien, 0, ',', '.') }}</span></td>
          </tr>

          <tr>
            <td><span class="cart__total-title">Phí Vận Chuyển</span></td>
            <td><span class="cart__total-price">₫30.000</span></td>
          </tr>

          <tr>
            <td><span class="cart__total-title">Tổng Cộng</span></td>
            <td><span class="cart__total-price">₫{{ number_format($tongTien + 30000, 0, ',', '.') }}</span></td>
          </tr>
        </table>

        <a href="http://127.0.0.1:8000/users/view-checkout" class="btn flex btn-md">
          <i class="fi fi-rs-box-alt"></i> Tiến hành kiểm tra
        </a>
      </div>
    </div>
  </section>
@endsection
