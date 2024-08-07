@extends('admin.layouts.default')

@section('title')
    @parent
    Danh mục sản phẩm
@endsection


@push('style')

@endpush

@section('content')
    <div class="d-flex">
        <div id="kt_app_content_container" class="app-container container-fluid">
            @if(session('message'))
                <div class="alert alert-primary" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="col-xl-12 mb-5 mb-xl-10">
                <div class="d-flex justify-content-between mb-10 w-100">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">
                            Danh sách danh mục
                        </span>
                    </h3>
                    <a href="{{ route('admin.category.addCategory') }}" class="btn btn-sm fw-bold btn-primary">Thêm mới</a>
                </div>
                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                    <thead>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Hành động</th>
                    </thead>
                    <tbody>
                        @if(count($category) == 0)
                            <tr>
                               <td colspan="3">Không có dữ liệu</td>
                            </tr>
                        @endif
                        @foreach($category as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-warning" href="{{ route('admin.category.updateCategory', $value->id) }}">Sửa</a>

                                    <form action="{{ route('admin.category.deleteCategory') }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" value="{{ $value->id }}" name="id">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>

    </script>
@endpush
