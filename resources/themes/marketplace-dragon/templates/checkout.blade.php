@extends('layouts.public')

@section('css')
    <style type="text/css">
        .sw-theme-arrows > ul.step-anchor {
            display: flex !important;
        }

        .shipping-options label {
            padding-left: 0;
            display: block;
        }

        .sw-btn-group .btn {
            background-color: #f5f5f5;
            border-color: #e1e7ec;
        }

        .sw-btn-group .btn:hover {
            background-color: #dcdbdb;
        }

        .btn-group .btn:first-child:not(:last-child):not(.dropdown-toggle).btn-secondary, .btn-group .btn:first-child:not(:last-child):not(.dropdown-toggle).btn-outline-secondary {
            border-right: 1px solid #e1e7ec;
        }

        .btn-group .btn:first-child:not(:last-child):not(.dropdown-toggle) {
            margin-right: 10px;
            padding-right: 22px;

        }

        body {
            line-height: normal !important;
        }

        label {
            display: inline-block;
        }

    </style>
    {!! Theme::css('css/custom_checkout.css') !!}
    {!! Theme::css('css/vendor/bootstrap-grid.css') !!}
@endsection

@section('content')

    @include('partials.page_header',['title'=>  trans('Marketplace::labels.checkout.title_checkout')  ,'featured_image'=>null])

    @php \Actions::do_action('pre_content', null, null) @endphp

    <div class="section-warp">
        <div class="section">
            @component('components.box')
                <div id="checkoutWizard">
                    <ul>
                        @guest
                            <li><a href="#checkout-method"
                                   data-content-url="{{url('checkout/step/checkout-method')}}">
                                    @lang('corals-marketplace-dragon::labels.template.checkout.checkout_method') <br/>
                                    <small></small>
                                </a>
                            </li>
                        @endguest
                        <li><a href="#cart-details" data-content-url="{{url('checkout/step/cart-details')}}">
                                @lang('corals-marketplace-dragon::labels.template.checkout.detail')<br/>
                                <small></small>
                            </a></li>

                        <li><a href="#billing-shipping-address"
                               data-content-url="{{url('checkout/step/billing-shipping-address')}}">
                                @lang('corals-marketplace-dragon::labels.template.checkout.address')<br/>
                                <small></small>
                            </a></li>
                        @if($enable_shipping)
                            <li><a href="#shipping-method"
                                   data-content-url="{{url('checkout/step/shipping-method')}}">
                                    @lang('corals-marketplace-dragon::labels.template.checkout.select_shipping')<br/>
                                    <small></small>
                                </a></li>
                        @endif
                        @if($hasPaymentStep)
                            <li><a href="#select-payment" data-content-url="{{url('checkout/step/select-payment')}}">
                                    @lang('corals-marketplace-dragon::labels.template.checkout.select_payment')<br/>
                                    <small></small>
                                </a></li>
                        @endif
                        <li><a href="#order-review" data-content-url="{{url('checkout/step/order-review')}}">
                                @lang('corals-marketplace-dragon::labels.template.checkout.order_review')<br/>
                                <small></small>
                            </a></li>
                    </ul>

                    <div class="mt-3 box-body" id="checkoutSteps">
                        @guest
                            <div id="checkout-method" class="checkoutStep">
                            </div>
                        @endguest
                        <div id="cart-details" class="checkoutStep">
                        </div>
                        <div id="billing-shipping-address" class="checkoutStep">
                        </div>
                        @if($enable_shipping)
                            <div id="shipping-method" class="checkoutStep">
                            </div>
                        @endif
                        @if($hasPaymentStep)
                            <div id="select-payment" class="checkoutStep">
                            </div>
                        @endif
                        <div id="order-review" class="checkoutStep">
                        </div>
                    </div>
                </div>
            @endcomponent
        </div>
    </div>

@stop

@component('partials.components.modal',['id'=>'term','header'=>\Settings::get('site_name').' Terms and policy'])
    {!! \Settings::get('terms_and_policy') !!}
@endcomponent


@section('js')
    @include('Marketplace::checkout.checkout_script')
@endsection
