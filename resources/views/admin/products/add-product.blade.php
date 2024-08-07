@extends('admin.layouts.default')

@section('title')
    @parent
    Thêm mới sản phẩm
@endsection


@push('style')

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
                                    Thêm mới sản phẩm
                                </span>
                            </h3>
                        </div>
                    </div>

                    <div class="card-body pt-2">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                                <form action="{{ route('admin.products.addPostProduct') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name">Tên sản phẩm: </label>
                                        <input type="text" id="name" name="name" class="form-control">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="price">Giá sản phẩm: </label>
                                        <input type="text" id="price" name="price" class="form-control">
                                        @error('price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="category">Danh mục: </label>
                                        <select name="category" id="category" class="form-control">
                                            @foreach($categories as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="images">Hình ảnh: </label>
                                        <input type="file" name="images[]" id="images" multiple class="form-control">
                                        @if ($errors->has('images'))
                                            @foreach ($errors->get('images') as $messages)
                                                @foreach ($messages as $message)
                                                    <p class="text-danger">{{ $message }}</p>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="description">Mô tả sản phẩm: </label>
                                        <textarea name="description" id="description" name="description" class="form-control"></textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary" type="submit">Thêm mới</button>
                                </form>
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
