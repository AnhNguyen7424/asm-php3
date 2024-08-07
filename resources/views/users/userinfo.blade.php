@extends('users.layouts.default')

@section('content')
    <!--end::Header Section-->
    <div class="mb-n10 mb-10 z-index-2">
        <div class="container mb-10">
            <div class="text-center mb-17">
                <h3 class="fs-2hx text-gray-900 mb-5" id="how-it-works"
                    data-kt-scroll-offset="{default: 100, lg: 150}">Thông tin users</h3>

            </div>
            <div class="row w-100 gy-10 mb-md-20">
                <form action="{{ route('users.updateUser') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Name: </label>
                        <input type="text" placeholder="Name" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
                        @error('name')
                            <span class="text-damger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-success">Chỉnh sửa</button>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#changePass">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::How It Works Section-->


<!-- Modal -->
<div class="modal fade" id="changePass" tabindex="-1" aria-labelledby="changePassLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changePassLabel">Đổi mật khẩu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('users.changePassUser') }}" method="post">
            @csrf
            <div class="modal-body">
                <input type="password" class="form-control mb-3" placeholder="Old Password" name="old_password">
                <input type="password" class="form-control mb-3" placeholder="New Password" name="new_password">
                <input type="password" class="form-control mb-3" placeholder="Confirm Password" name="password_confirmation">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-warning">Xác nhận</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
