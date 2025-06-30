@extends('layouts.back-end.app')

@section('title', translate('theme_setup'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
          href="{{ dynamicAsset(path: 'public/assets/back-end/vendor/swiper/swiper-bundle.min.css')}}"/>
@endpush

@section('content')
   
    <span id="get-theme-install-route"
          data-action="{{route('admin.business-settings.web-config.theme.install')}}"></span>
    <span id="get-theme-publish-route"
          data-action="{{route('admin.business-settings.web-config.theme.publish')}}"></span>
    <span id="get-theme-delete-route" data-action="{{route('admin.business-settings.web-config.theme.delete')}}"></span>
    <span id="get-notify-all-vendor-route-and-img-src"
          data-csrf="{{csrf_token()}}"
          data-src="{{dynamicAsset(path: 'public/assets/back-end/img/notify_success.png')}}"
          data-action="{{route('admin.business-settings.web-config.theme.notify-all-the-vendors')}}">
    </span>

@endsection

@push('script')
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{dynamicAsset(path: 'public/assets/back-end/js/admin/business-setting/theme-setup.js')}}"></script>
@endpush
