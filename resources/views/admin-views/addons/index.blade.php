@extends('layouts.back-end.app')

@section('title', translate('system_Addons'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
          href="{{ dynamicAsset(path: 'public/assets/back-end/vendor/swiper/swiper-bundle.min.css')}}"/>
@endpush

@section('content')
  
    <span id="get-addon-upload-route" data-action="{{route('admin.addon.upload')}}"></span>
    <span id="get-addon-publish-route" data-action="{{route('admin.addon.publish')}}"></span>
    <span id="get-addon-delete-route" data-action="{{route('admin.addon.delete')}}"></span>
@endsection

@push('script')
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/js/admin/addon.js')}}"></script>
@endpush
