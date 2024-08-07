@extends('admin.layouts.default')

@section('title')
    @parent
    Danh sách sản phẩm
@endsection


@push('style')
    <style>
        .img-small{
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>
@endpush

@section('content')
    <div class="d-flex">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="col-xl-12 mb-5 mb-xl-10">
                <div class="card card-flush h-xl-100">
                    <div class="card-header pt-5 w-100">
                        <div class="d-flex justify-content-between mb-10 w-100">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">
                                    Danh sách sản phẩm
                                </span>
                            </h3>
                            <a href="{{ route('admin.products.addProduct') }}" class="btn btn-sm fw-bold btn-primary">Thêm mới</a>
                        </div>
                    </div>

                    <div class="card-body pt-2">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                                <div class="table-responsive">
                                    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá sản phẩm</th>
                                                <th>Danh mục</th>
                                                <th>Hình ảnh</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach($products as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $value->name }}</td>
                                                        <td>{{ $value->price }}</td>
                                                        <td>{{ $value->category->name }}</td>
                                                        <td>
                                                            @foreach($value->images as $image)
                                                                <img src="{{ asset($image->image_url) }}" alt="" class="img-small">
                                                            @endforeach
                                                        </td>
                                                        <td class="d-flex">
                                                            <a href="{{ route('admin.products.updateProduct', $value->id) }}" class="btn btn-warning">Sửa</a>
                                                            <form action="{{ route('admin.products.deleteProduct') }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <input type="hidden" value="{{ $value->id }}" name="idProduct">
                                                                <button type="submit" onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger">Xóa</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')

@endpush
