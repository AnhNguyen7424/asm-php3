@extends('users.layouts.default')

@section('content')
<section class="checkout section--lg">
    <div class="checkout__container container grid">
      <div class="checkout__group">
        <h3 class="section__title">Hóa Đơn</h3>

        <form action="#"  class="form grid">
          <input type="text" placeholder="Tên" class="form__input">
          <input type="text" placeholder="Địa Chỉ" class="form__input">
          <input type="text" placeholder="Thành phố" class="form__input">
          <input type="text" placeholder="Địa Chỉ Cụ Thể" class="form__input">
          <input type="text" placeholder="Đơn Vị Vận Chuyển" class="form__input">
          <input type="text" placeholder="Số Điện Thoại" class="form__input">
          <input type="text" placeholder="Email" class="form__input">

          <h3 class="checkout__title">Thông Tin Bổ Sung</h3>
          <textarea name="" placeholder="Ghi Chú" id=""  cols="30" rows="10" class="form__input textarea"></textarea>
        </form>
      </div>

      <div class="checkout__group">
        <h3 class="section__title">Tổng</h3>

        <table class="order__table">
          <tr>
            <th colspan="2">Các Sản Phẩm</th>
            <th>Tổng Cộng</th>
          </tr>

          @foreach($cart->cartDetails as $key => $cartDetail)
            <tr>
                <td>
                <h3 class="table__title">{{ $cartDetail->product->name }}</h3>
                <p class="table__quantity"> x {{ $cartDetail->quantity }}</p>
                </td>
                <td>{{ $cartDetail->product->category->name }}</td>
                <td>{{ number_format( $cartDetail->product->price) }} VNĐ</td>
                
            </tr>
          @endforeach
          <tr>
            <td><span class="order__subtitle">Tổng</span></td>
            <td colspan="2"><span class="table__price">₫{{ number_format($thanhtien, 0, ',', '.') }}</span></td>
          </tr>

          <tr>
            <td><span class="order__subtitle">Ship</span></td>
            <td colspan="2"><span class="table__price">30.000</span></td>
          </tr>

          <tr>
            <td><span class="order__subtitle">Tổng</span></td>
            <td colspan="2"><span class="order__grand-total">₫{{ number_format($thanhtien + 30000, 0, ',', '.') }}</span></td>
          </tr>
        </table>

        <div class="payment__methods">
          <h3 class="checkout__title payment__title">Phương Thức Thanh Toán</h3>

          <div class="payment__option flex">
            <input type="radio" name="radio" checked class="payment__input">
            <label for="" class="payment__label">Ngân Hàng</label>
          </div>

          <div class="payment__option flex">
            <input type="radio" name="radio" class="payment__input">
            <label for="" class="payment__label">MoMo</label>
          </div>

          <div class="payment__option flex">
            <input type="radio" name="radio" class="payment__input">
            <label for="" class="payment__label">Thanh Toán Khi Nhận Hàng</label>
          </div>
        </div>

        <button onclick="return confirm('Thanh toán thành công. Vì mình quá thik cậu rồi phải làm sao phải làm sao!')" class="btn btn--md">Xác Nhận</button>
      </div>
    </div>
  </section>
@endsection