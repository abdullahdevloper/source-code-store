@extends('layouts.front-end.app')

@section('title', translate('my_Wallet'))

@push('css_or_js')
    <link rel="stylesheet" href="{{theme_asset(path: 'public/assets/front-end/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{theme_asset(path: 'public/assets/front-end/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset(path: 'public/assets/front-end/css/daterangepicker.css')}}">
@endpush

@section('content')
    <div class="container py-2 py-md-4 p-0 p-md-2 user-profile-container px-5px">
        <div class="row">
            @include('web-views.partials._profile-aside')

            <section class="col-lg-9 __customer-profile px-0">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                            <h5 class="font-bold m-0 fs-16">{{ translate('wallet') }}</h5>

                            <button class="profile-aside-btn btn btn--primary px-2 rounded px-2 py-1 d-lg-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                                     fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M7 9.81219C7 9.41419 6.842 9.03269 6.5605 8.75169C6.2795 8.47019 5.898 8.31219 5.5 8.31219C4.507 8.31219 2.993 8.31219 2 8.31219C1.602 8.31219 1.2205 8.47019 0.939499 8.75169C0.657999 9.03269 0.5 9.41419 0.5 9.81219V13.3122C0.5 13.7102 0.657999 14.0917 0.939499 14.3727C1.2205 14.6542 1.602 14.8122 2 14.8122H5.5C5.898 14.8122 6.2795 14.6542 6.5605 14.3727C6.842 14.0917 7 13.7102 7 13.3122V9.81219ZM14.5 9.81219C14.5 9.41419 14.342 9.03269 14.0605 8.75169C13.7795 8.47019 13.398 8.31219 13 8.31219C12.007 8.31219 10.493 8.31219 9.5 8.31219C9.102 8.31219 8.7205 8.47019 8.4395 8.75169C8.158 9.03269 8 9.41419 8 9.81219V13.3122C8 13.7102 8.158 14.0917 8.4395 14.3727C8.7205 14.6542 9.102 14.8122 9.5 14.8122H13C13.398 14.8122 13.7795 14.6542 14.0605 14.3727C14.342 14.0917 14.5 13.7102 14.5 13.3122V9.81219ZM12.3105 7.20869L14.3965 5.12269C14.982 4.53719 14.982 3.58719 14.3965 3.00169L12.3105 0.915687C11.725 0.330188 10.775 0.330188 10.1895 0.915687L8.1035 3.00169C7.518 3.58719 7.518 4.53719 8.1035 5.12269L10.1895 7.20869C10.775 7.79419 11.725 7.79419 12.3105 7.20869ZM7 2.31219C7 1.91419 6.842 1.53269 6.5605 1.25169C6.2795 0.970186 5.898 0.812187 5.5 0.812187C4.507 0.812187 2.993 0.812187 2 0.812187C1.602 0.812187 1.2205 0.970186 0.939499 1.25169C0.657999 1.53269 0.5 1.91419 0.5 2.31219V5.81219C0.5 6.21019 0.657999 6.59169 0.939499 6.87269C1.2205 7.15419 1.602 7.31219 2 7.31219H5.5C5.898 7.31219 6.2795 7.15419 6.5605 6.87269C6.842 6.59169 7 6.21019 7 5.81219V2.31219Z"
                                          fill="white"/>
                                </svg>
                            </button>
                        </div>

                        <div class="row g-0 g-md-3 gap-3 h-100">

                            @php($addFundsToWallet = getWebConfig(name: 'add_funds_to_wallet'))

                            <div class="col-md-12">
                                <div class="row  g-3">
                                    @if(!$addFundsToWallet || count($addFundBonusList) <= 0)
                                        <div class="col-12">
                                            <div class="card btn--primary h-100 position-relative mx-h-200">
                                                <div class="card-body d-flex align-items-center z-2">
                                                    <div
                                                        class="align-items-center d-flex flex-wrap gap-2 justify-content-between py-3 w-100">
                                                        <div class="text-white">
                                                            <p class="mb-0">{{ translate('wallet') }}</p>
                                                            <p class="mb-2">{{ translate('amount') }}</p>
                                                        </div>
                                                        <h2 class="align-items-center d-flex fs-36 m-0 text-white">
                                                            {{ webCurrencyConverter(amount: $totalWalletBalance ?? 0) }}

                                                            @if ($addFundsToWallet)
                                                                <span class="ml-2 fs-18">
                                                                    <i class="tio-info-outined" data-toggle="tooltip"
                                                                       data-placement="bottom" title=""
                                                                       data-original-title="{{ translate('If_you_want_to_add_fund_to_your_wallet_then_click_add_fund_button') }}"></i>
                                                                </span>
                                                            @endif
                                                        </h2>
                                                        @if ($addFundsToWallet)
                                                            <div>
                                                                <button
                                                                    class="btn btn-light align-items-center fs-14 font-semi-bold py-2 px-4"
                                                                    data-toggle="modal" data-target="#addFundToWallet">
                                                                    <span><i
                                                                            class="tio-add-circle text-accent"></i></span>
                                                                    <span
                                                                        class="text-primary">{{ translate('add_Fund') }}</span>
                                                                </button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <img class="wallet-card-bg z-1"
                                                     src="{{ theme_asset(path: 'public/assets/front-end/img/icons/wallet-card.png') }}"
                                                     alt="">
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-5">
                                            <div class="card btn--primary h-100 position-relative mx-h-200">
                                                <div class="card-body d-flex align-items-center z-2">
                                                    <div
                                                        class="d-flex flex-wrap justify-content-between align-items-center w-100 py-3">
                                                        <div class="text-white">
                                                            <p class="mb-0">{{ translate('wallet') }}</p>
                                                            <p class="mb-2">{{ translate('amount') }}</p>
                                                        </div>
                                                        @if ($addFundsToWallet)
                                                            <div class="mx-3">
                                                                <button
                                                                    class="btn btn-light align-items-center fs-14 font-semi-bold py-2 px-4"
                                                                    data-toggle="modal" data-target="#addFundToWallet">
                                                                    <span><i
                                                                            class="tio-add-circle text-accent"></i></span>
                                                                    <span
                                                                        class="text-primary">{{ translate('add_Fund') }}</span>
                                                                </button>
                                                            </div>
                                                        @endif

                                                        <h2 class="fs-36 text-white d-flex align-items-center m-0 w-100">
                                                            {{ webCurrencyConverter(amount: $totalWalletBalance ?? 0) }}

                                                            @if ($addFundsToWallet)
                                                                <span class="ml-2 fs-18">
                                                                <i class="tio-info-outined" data-toggle="tooltip"
                                                                   data-placement="bottom"
                                                                   title="{{ translate('if_you_want_to_add_fund_to_your_wallet_then_click_add_fund_button') }}"></i>
                                                            </span>
                                                            @endif

                                                        </h2>
                                                    </div>
                                                </div>
                                                <img class="wallet-card-bg z-1"
                                                     src="{{ theme_asset(path: 'public/assets/front-end/img/icons/wallet-card.png') }}"
                                                     alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            @if($addFundsToWallet)
                                                <div
                                                    class="{{ count($addFundBonusList) > 1 ? 'owl-carousel add-fund-carousel' : '' }}">
                                                    @foreach ($addFundBonusList as $bonus)
                                                        <div class="item">

                                                            <div
                                                                class="add-fund-carousel-card z-1 w-100 border rounded-10 p-4 ml-1">
                                                                <div>
                                                                    <h4 class="mb-2 text-accent">{{ $bonus->title }}</h4>
                                                                    <p class="mb-2 text-dark">{{ translate('valid_till') }} {{ date('d M, Y',strtotime($bonus->end_date_time)) }}</p>
                                                                </div>
                                                                <div>
                                                                    @if ($bonus->bonus_type == 'percentage')
                                                                        <p>{{ translate('add_fund_to_wallet') }} {{ webCurrencyConverter(amount: $bonus->min_add_money_amount) }} {{ translate('and_enjoy') }} {{ $bonus->bonus_amount }}
                                                                            % {{ translate('bonus') }}</p>
                                                                    @else
                                                                        <p>{{ translate('add_fund_to_wallet') }} {{ webCurrencyConverter(amount: $bonus->min_add_money_amount) }} {{ translate('and_enjoy') }} {{ webCurrencyConverter(amount: $bonus->bonus_amount) }} {{ translate('bonus') }}</p>
                                                                    @endif
                                                                    <p class="fw-bold text-accent mb-0">{{ $bonus->description ? Str::limit($bonus->description, 40):'' }}</p>
                                                                </div>
                                                                <img
                                                                    class="slider-card-bg-img add-fund-carousel-slider-card-bg"
                                                                    width="50"
                                                                    src="{{ theme_asset(path: 'public/assets/front-end/img/icons/add_fund_vector.png') }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="modal fade" id="addFundToWallet" tabindex="-1"
                                 aria-labelledby="addFundToWalletModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md">
                                    <div class="modal-content">

                                        <div class="modal-header border-0">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body px-5">

                                            <form action="{{ route('customer.add-fund-request') }}" method="post">
                                                @csrf
                                                <div class="pb-4">
                                                    <h4 class="text-center">{{ translate('add_Fund_to_Wallet') }}</h4>
                                                    <p class="text-center">{{ translate('add_fund_by_from_secured_digital_payment_gateways') }}</p>
                                                    <input type="number"
                                                           class="h-70 form-control text-center text-24 rounded-10 fs-25-important light-placeholder"
                                                           id="add-fund-amount-input" name="amount"
                                                           required
                                                           placeholder="{{ translate('ex') }}: {{ webCurrencyConverter(amount: 500) }}">
                                                    <input type="hidden" value="web" name="payment_platform" required>
                                                    <input type="hidden" value="{{ request()->url() }}"
                                                           name="external_redirect_link" required>
                                                </div>

                                                <div id="add-fund-list-area">
                                                    @if(count($paymentGatewayList) > 0)
                                                        <h6 class="mb-2">{{ translate('payment_Methods') }}
                                                            <small>({{ translate('faster_&_secure_way_to_pay_bill') }}
                                                                )</small></h6>
                                                        <div class="gateways_list">

                                                            @forelse ($paymentGatewayList as $gateway)
                                                                <label class="form-check form--check rounded">
                                                                    <input type="radio" class="form-check-input d-none"
                                                                           name="payment_method"
                                                                           value="{{ $gateway->key_name }}" required>
                                                                    <div class="check-icon">
                                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                                             fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <circle cx="8" cy="8" r="8" fill="#1455AC"/>
                                                                            <path
                                                                                d="M9.18475 6.49574C10.0715 5.45157 11.4612 4.98049 12.8001 5.27019L7.05943 11.1996L3.7334 7.91114C4.68634 7.27184 5.98266 7.59088 6.53004 8.59942L6.86856 9.22314L9.18475 6.49574Z"
                                                                                fill="white"/>
                                                                        </svg>
                                                                    </div>
                                                                    @php( $payment_method_title = !empty($gateway->additional_data) ? (json_decode($gateway->additional_data)->gateway_title ?? ucwords(str_replace('_',' ', $gateway->key_name))) : ucwords(str_replace('_',' ', $gateway->key_name)) )
                                                                    @php( $payment_method_img = !empty($gateway->additional_data) ? json_decode($gateway->additional_data)->gateway_image : '' )
                                                                    <div
                                                                        class="form-check-label d-flex align-items-center">
                                                                        <img width="60" alt="{{ translate('payment') }}"
                                                                             src="{{ getValidImage(path: 'storage/app/public/payment_modules/gateway_image/'.$payment_method_img, type:'banner') }}">
                                                                        <span
                                                                            class="ml-3">{{ $payment_method_title }}</span>
                                                                    </div>
                                                                </label>
                                                            @empty

                                                            @endforelse
                                                        </div>
                                                        <div class="d-flex justify-content-center pt-2 pb-3">
                                                            <button type="submit" class="btn btn--primary w-75 mx-3"
                                                                    id="add_fund_to_wallet_form_btn">{{ translate('add_Fund') }}</button>
                                                        </div>
                                                    @else
                                                        <h6 class="small text-center">{{ translate('no_Payment_Methods_Gateway_found') }}</h6>
                                                    @endif
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="">
                                    <div
                                        class="d-flex flex-column flex-md-row gap-8 justify-content-between p-2 align-items-md-center">
                                        <h6 class="mb-0 font-bold fs-16 flex-grow-1 w-100">{{ translate('Transaction_History') }}</h6>

                                        <div class="d-flex justify-content-end">
                                            <div class="dropdown flex-grow-1 w-100 d-flex justify-content-end">
                                                <form action="{{ route('wallet') }}" method="get">
                                                    <button type="button"
                                                            id="transactionFilterBtn"
                                                            class="btn border rounded px-3 py-1 text-dark fs-14 d-flex align-items-center gap-10"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                        {{ translate('filter') }}

                                                        <span class="position-relative">
                                                            <i class="fa fa-filter text--primary {{ $filterCount > 0 ? 'fs-25' : '' }}"></i>
                                                            @if($filterCount > 0)
                                                            <span class="count bg-danger top-0">
                                                                {{ $filterCount }}
                                                            </span>
                                                            @endif
                                                        </span>

                                                    </button>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-end shadow transaction-filter_dropdown dropdown-menu-end-0">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center p-3 border-bottom">
                                                            <h5 class="font-bold fs-16 text-capitalize m-0">
                                                                {{ translate('filter_data') }}
                                                            </h5>
                                                            <button id="filterCloseBtn" type="button"
                                                                    class="btn text-absolute-white border-0 rounded-circle lh-1 p-0 m-0 pt-1 d-flex justify-content-center align-items-center">
                                                                <i class="fa fa-close"></i>
                                                            </button>
                                                        </div>
                                                        <div class="p-3 overflow-auto max-h-290px">
                                                            <div class="mb-4">
                                                                <h6 class="mb-3 text-capitalize font-bold fs-16">
                                                                    {{ translate('filter_by') }}
                                                                </h6>
                                                                <div class="d-flex gap-3 transaction_filter_by">
                                                                    <label type="button"
                                                                           class="btn p-2 min-w-60px {{ $filterBy == '' || $filterBy == 'all' ? 'btn-outline-primary' : 'btn-outline-secondary' }}">
                                                                        {{ translate('all') }}
                                                                        <input type="radio" name="filter_by"
                                                                               value="all" {{ $filterBy == '' || $filterBy == 'all' ? 'checked' : '' }}>
                                                                    </label>
                                                                    <label type="button"
                                                                           class="btn p-2 min-w-60px {{ $filterBy == 'debit' ? 'btn-outline-primary' : 'btn-outline-secondary' }}">
                                                                        {{ translate('debit') }}
                                                                        <input type="radio" name="filter_by"
                                                                               value="debit" {{ $filterBy == 'debit' ? 'checked' : '' }}>
                                                                    </label>
                                                                    <label type="button"
                                                                           class="btn p-2 min-w-60px {{ $filterBy == 'credit' ? 'btn-outline-primary' : 'btn-outline-secondary' }}">
                                                                        {{ translate('credit') }}
                                                                        <input type="radio" name="filter_by"
                                                                               value="credit" {{ $filterBy == 'credit' ? 'checked' : '' }}>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <h6 class="mb-3 text-capitalize font-bold fs-16">
                                                                    {{ translate('date_range') }}
                                                                </h6>
                                                                <div class="position-relative">
                                                                    <span
                                                                        class="fa fa-calendar icon-absolute-on-right"></span>
                                                                    <input type="text" id="dateRangeInput"
                                                                           name="transaction_range" class="form-control"
                                                                           placeholder="{{ translate('Select_Date') }}"
                                                                           value="{{ $transactionRange ?? '' }}"/>
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <h6 class="mb-3 text-capitalize font-bold fs-16">
                                                                    {{ translate('earn_by') }}
                                                                </h6>
                                                                <div class="d-flex flex-column gap-3 transaction_earn_by">
                                                                    <label
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <span>{{ translate('Order_Transactions') }}</span>
                                                                        <input type="checkbox" class="earn-checkbox"
                                                                               name="types[]" value="order_place"
                                                                            {{ in_array('order_place', $transactionTypes) ? 'checked' : '' }}>
                                                                    </label>
                                                                    <label
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <span>{{ translate('Order_Refund') }}</span>
                                                                        <input type="checkbox"
                                                                               class="earn-checkbox border-dark"
                                                                               name="types[]" value="order_refund"
                                                                            {{ in_array('order_refund', $transactionTypes) ? 'checked' : '' }}>
                                                                    </label>
                                                                    <label
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <span>{{ translate('Converted_from_Loyalty_Point') }}</span>
                                                                        <input type="checkbox"
                                                                               class="earn-checkbox border-dark"
                                                                               name="types[]" value="loyalty_point"
                                                                            {{ in_array('loyalty_point', $transactionTypes) ? 'checked' : '' }}>
                                                                    </label>
                                                                    <label
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <span>{{ translate('Added_via_Payment_Method') }}</span>
                                                                        <input type="checkbox"
                                                                               class="earn-checkbox border-dark"
                                                                               name="types[]" value="add_fund"
                                                                            {{ in_array('add_fund', $transactionTypes) ? 'checked' : '' }}>
                                                                    </label>
                                                                    <label
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <span>{{ translate('add_fund_by_admin') }}</span>
                                                                        <input type="checkbox"
                                                                               class="earn-checkbox border-dark"
                                                                               name="types[]" value="add_fund_by_admin"
                                                                            {{ in_array('add_fund_by_admin', $transactionTypes) ? 'checked' : '' }}>
                                                                    </label>
                                                                    <label
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <span>{{ translate('earned_by_referral') }}</span>
                                                                        <input type="checkbox"
                                                                               class="earn-checkbox border-dark"
                                                                               name="types[]" value="earned_by_referral"
                                                                            {{ in_array('earned_by_referral', $transactionTypes) ? 'checked' : '' }}>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card shadow-lg p-3 d-flex flex-row gap-3">
                                                            <a href="{{ route('wallet') }}"
                                                               class="btn btn-outline-secondary w-100">
                                                                {{ translate('clear_filter') }}
                                                            </a>
                                                            <button type="submit" class="btn btn--primary w-100">
                                                                {{ translate('filter') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="max-height-500">
                                        <div class="d-flex flex-column gap-2">
                                            @foreach($walletTransactionList as $key=>$item)
                                                @if ($item['admin_bonus'] > 0)
                                                    <div
                                                        class="bg-light my-1 p-3 p-sm-3 rounded d-flex justify-content-between g-2">
                                                        <div class="">
                                                            <h6 class="mb-2 d-flex align-items-center gap-8">
                                                                <img
                                                                    src="{{ theme_asset(path: 'public/assets/front-end/img/icons/coin-success.png') }}"
                                                                    width="25" alt="">
                                                                <span class="absolute-ltr font-bold fs-18">
                                                                    + {{ webCurrencyConverter(amount: $item['admin_bonus']) }}
                                                                </span>
                                                            </h6>
                                                            <h6 class="text-muted mb-0 small text-capitalize fs-13 font-semibold">
                                                                {{ ucwords(str_replace('_', ' ', translate('admin_bonus'))) }}
                                                            </h6>
                                                        </div>
                                                        <div class="text-end small">
                                                            <div
                                                                class="text-muted mb-1 text-nowrap text-capitalize font-semibold">
                                                                {{ date('d M, Y H:i A', strtotime($item['created_at'])) }}
                                                            </div>
                                                            @if($item['debit'] != 0)
                                                                <p class="text-danger fs-12">{{ translate('debit') }}</p>
                                                            @else
                                                                <p class="text-info fs-12 m-0">{{ translate('credit') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                                <div
                                                    class="bg-light my-1 p-3 rounded d-flex justify-content-between g-2">
                                                    <div class="w-100">
                                                        <h6 class="mb-2 d-flex align-items-center gap-8">
                                                            @if($item['debit'] != 0)
                                                                <img
                                                                    src="{{ theme_asset(path: 'public/assets/front-end/img/icons/coin-danger.png') }}"
                                                                    width="25" alt="">
                                                            @else
                                                                <img
                                                                    src="{{ theme_asset(path: 'public/assets/front-end/img/icons/coin-success.png') }}"
                                                                    width="25" alt="">
                                                            @endif

                                                            <span class="absolute-ltr font-bold fs-18">
                                                                {{ $item['debit'] != 0 ? ' - '.webCurrencyConverter(amount: $item['debit']): ' + '.webCurrencyConverter(amount: $item['credit']) }}
                                                            </span>

                                                        </h6>
                                                        <h6 class="text-muted mb-0 small text-capitalize fs-13 font-semibold">
                                                            @if ($item['transaction_type'] == 'add_fund_by_admin')
                                                                {{ translate('add_fund_by_admin') }} {{ $item['reference'] =='earned_by_referral' ? '('.translate($item['reference']).')' : '' }}
                                                            @elseif($item['transaction_type'] == 'order_place')
                                                                {{ translate('order_place') }}
                                                            @elseif($item['transaction_type'] == 'loyalty_point')
                                                                {{ translate('converted_from_loyalty_point') }}
                                                            @elseif($item['transaction_type'] == 'add_fund')
                                                                {{ translate('added_via_payment_method') }}
                                                            @else
                                                                {{str_replace('_',' ',translate($item['transaction_type']))}}
                                                            @endif
                                                        </h6>
                                                    </div>
                                                    <div class="text-end small">
                                                        <div
                                                            class="text-muted mb-1 text-nowrap text-capitalize font-semibold">{{date('d M, Y H:i A',strtotime($item['created_at']))}}</div>
                                                        @if($item['debit'] != 0)
                                                            <p class="text-danger fs-12 m-0">{{ translate('debit') }}</p>
                                                        @else
                                                            <p class="text-info fs-12 m-0">{{ translate('credit') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    @if($walletTransactionList->count()==0)
                                        <div class="d-flex flex-column gap-3 align-items-center text-center my-5">
                                            <img width="72"
                                                 src="{{ theme_asset(path: 'public/assets/front-end/img/icons/empty-transaction-history.png') }}"
                                                 class="dark-support" alt="">
                                            <h6 class="text-muted mt-3">{{ translate('you_do_not_have_any') }}
                                                <br> {{ request('type') != 'all' ? ucwords(translate(request('type'))) : '' }} {{ translate('transaction_yet') }}
                                            </h6>
                                        </div>
                                    @endif

                                    <div class="card-footer bg-transparent border-0 p-0 mt-3">
                                        @if (request()->has('type'))
                                            @php($paginationLinks = $walletTransactionList->links())
                                            @php($modifiedLinks = preg_replace('/href="([^"]*)"/', 'href="$1&type='.request('type').'"', $paginationLinks))
                                        @else
                                            @php($modifiedLinks = $walletTransactionList->links())
                                        @endif
                                        {!! $modifiedLinks !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/owl.carousel.min.js') }}"></script>
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/moment.min.js') }}"></script>
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/daterangepicker.min.js') }}"></script>
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/user-wallet.js') }}"></script>
@endpush
