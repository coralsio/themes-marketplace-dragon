@extends('layouts.public')

@section('content')
    @include('partials.page_header',['content' => '<h1><i class="fa fa-shopping-cart fa-fw"></i> Cart</h1>'])
    @php \Actions::do_action('pre_content', null, null) @endphp
    <div class="section-wrap">
        <div class="section">
            <div class="content right" id="custom-width">
                <!-- CART -->
                @if (count(ShoppingCart::getAllInstanceItems()) > 0)
                    <div class="cart">
                        <!-- CART HEADER -->
                        <div class="cart-header custom-flex">
                            <div class="cart-header-product">
                                <p class="text-header small">@lang('corals-marketplace-dragon::labels.template.cart.product')</p>
                            </div>
                            <div class="cart-header-category">
                                <p class="text-header small">@lang('corals-marketplace-dragon::labels.template.cart.quantity')</p>
                            </div>
                            <div class="cart-header-price">
                                <p class="text-header small">@lang('corals-marketplace-dragon::labels.template.cart.price')</p>
                            </div>
                            <div class="cart-header-actions">
                                <p class="text-header small">@lang('corals-marketplace-dragon::labels.template.cart.clear_cart')</p>
                            </div>
                        </div>
                        @foreach (\ShoppingCart::getAllInstanceItems() as $item)
                            <div class="cart-item custom-flex" id="item-{{$item->getHash()}}">
                                <!-- CART ITEM PRODUCT -->
                                <div class="cart-item-product">
                                    <!-- ITEM PREVIEW -->
                                    <div class="item-preview">
                                        <a href="{{ url('shop', [$item->id->product->slug]) }}">
                                            <figure class="product-preview-image small liquid">
                                                <img src="{{ $item->id->image }}" alt="SKU Image">
                                            </figure>
                                        </a>
                                        <a href="{{ url('shop', [$item->id->product->slug]) }}"><p
                                                    class="text-header small">{!! $item->id->product->name !!}
                                                [{{$item->id->code }}]</p></a>
                                        <p class="description">
                                            {!!  $item->id->presenter()['options']  !!}
                                            {!! formatArrayAsLabels(\OrderManager::mapSelectedAttributes($item->product_options), 'success',null,true)    !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="cart-item-category">
                                    <div class="">
                                        @if(!$item->id->isAvailable($item->qty))
                                            @lang('Marketplace::labels.shop.out_stock')
                                        @else
                                            @if($item->id->allowed_quantity != 1)
                                                <form action="{{ url('cart/quantity', [$item->getHash()]) }}"
                                                      method="POST"
                                                      class="ajax-form form-inline" data-page_action="updateCart">
                                                    {{ csrf_field() }}
                                                    <a href="{{ url('cart/quantity', [$item->getHash()]) }}"
                                                       class="btn btn-sm text-header item-button"
                                                       title="Remove One" data-action="post" data-style="zoom-in"
                                                       data-request_data='@json(["action"=>"decreaseQuantity"])'
                                                       data-page_action="updateCart">
                                                        <i class="fa fa-fw fa-minus"></i>
                                                    </a>
                                                    <input step="1" min="1"
                                                           class="form-control form-control-sm cart-quantity"
                                                           style="width:60px;display: inline;text-align:center"
                                                           type="number"
                                                           name="quantity"
                                                           data-id="{{ $item->rowId }}"
                                                           {!! $item->id->allowed_quantity>0?('max="'.$item->id->allowed_quantity.'"'):'' !!} value="{{ $item->qty }}"/>
                                                    <a href="{{ url('cart/quantity', [$item->getHash()]) }}"
                                                       class="btn btn-sm text-header item-button" data-style="zoom-in"
                                                       title="Add One" data-action="post" data-page_action="updateCart"
                                                       data-request_data='@json(["action"=>"increaseQuantity"])'>
                                                        <i class="fa fa-fw fa-plus"></i>
                                                    </a>
                                                </form>
                                            @else
                                                <input style="width:40px;text-align: center;"
                                                       value="1"
                                                       disabled/>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="cart-item-price">
                                    <p class="price"
                                       id="item-total-{{$item->getHash()}}">{{ $item->subtotal() }}</p>
                                </div>
                                <div class="cart-item-actions">
                                    <a href="{{ url('cart/quantity', [$item->getHash()]) }}" data-action="post"
                                       data-style="zoom-in" data-request_data='@json(["action"=>"removeItem"])'
                                       data-page_action="updateCart"
                                       data-toggle="tooltip"
                                       title="Remove item" class="button dark-light rmv">
                                        <svg class="svg-plus" id="custom-svg">
                                            <use xlink:href="#svg-plus"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="cart-total">
                            <p class="price medium" id="total">{{ ShoppingCart::subTotalAllInstances() }}</p>
                            @if(Settings::get('marketplace_tax_tax_included_in_price'))
                                <small style="font-size: 9px">@lang('Marketplace::attributes.product.tax_included') </small>
                            @endif
                            <p class="text-header total">@lang('corals-marketplace-dragon::labels.template.cart.subtotal')</p>
                        </div>
                        <div class="cart-actions">
                            <a href="{{ url('checkout') }}"
                               class="button mid primary">@lang('corals-marketplace-dragon::labels.template.cart.checkout')</a>
                            <a href="{{ url('shop') }}"
                               class="button mid dark-light spaced">@lang('corals-marketplace-dragon::labels.template.cart.back_shopping')</a>
                        </div>
                        <!-- /CART ACTIONS -->
                    </div>
                @else
                    <h3>@lang('corals-marketplace-dragon::labels.template.cart.have_no_item')</h3>
                    <div class="cart-actions d-flex" style="margin-top: 20px">
                        <a href="{{ url('shop') }}"
                           class="button mid primary">@lang('corals-marketplace-dragon::labels.template.cart.continue_shopping')</a>
                        @endif
                    </div>
            </div>
        </div>
    </div>
@endsection
