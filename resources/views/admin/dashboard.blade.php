@extends('admin.layouts.default')

@section('title')
    @parent
    Dashboard
@endsection


@push('style')

@endpush

@section('content')
    <div class="d-flex">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="col-xl-12 mb-5 mb-xl-10">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>

    </script>
@endpush
