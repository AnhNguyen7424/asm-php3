@extends('admin.layouts.default')

@section('title')
    @parent
    Chỉnh sửa danh mục
@endsection


@push('style')

@endpush

@section('content')
    <div class="d-flex">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="col-xl-12 mb-5 mb-xl-10">
                <div class="d-flex justify-content-between mb-10 w-100">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">
                            Chỉnh sửa danh mục
                        </span>
                    </h3>
                </div>

            </div>
            <div class="col-xl-12">
                <form action="{{ route('admin.category.updatePatchCategory') }}" method="post">
                    @method('Patch')
                    @csrf
                    <input type="hidden" value="{{ $category->id }}" name="idCategory">
                    <div class="mb-4">
                        <label for="name">Tên danh mục</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @error('idCategory')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-warning" type="submit">Chỉnh sửa</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>

    </script>
@endpush
