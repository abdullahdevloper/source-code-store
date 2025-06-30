@extends('layouts.back-end.app')

@section('title', translate('software_update'))

@section('content')
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="{{dynamicAsset(path: 'public/assets/back-end/img/system-setting.png')}}" alt="">
                {{translate('system_setup')}}
            </h2>
        </div>
        @include('admin-views.business-settings.system-settings-inline-menu')
      
    </div>
    <span id="get-software-update-route" data-action="{{route('admin.system-settings.software-update')}}" data-redirect-route="{{route('home')}}"></span>
@endsection

@push('script')
    <script src="{{dynamicAsset(path: 'public/assets/back-end/js/admin/business-setting/business-setting.js')}}"></script>
@endpush
