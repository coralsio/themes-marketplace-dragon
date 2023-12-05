@if(\ShoppingCart::CountAllInstances() > 0)

    @foreach($items = \ShoppingCart::getAllInstanceItems() as $item)
        <li class="dropdown-item"  >
            <a href="{{ url('cart/quantity', [$item->getHash()]) }}" data-action="post"
               data-style="zoom-in" data-request_data='@json(["action"=>"removeItem"])'
               data-page_action="updateCart"
               data-toggle="tooltip"
               title="Remove item" class="custom-remove-cart">
                <i class="fa fa-remove" style="font-size:12px;color:#b2b2b2;"></i>
            </a>
            <div class="dropdown-triangle"></div>
            <figure class="product-preview-image tiny">
                <img src="{{ $item->id->image }}" alt="Product" alt="">
            </figure>
            <p class="text-header tiny"><a href="{{ url('shop', [$item->id->product->slug]) }}">
                    {!! $item->id->product->name !!}
                </a></p>
            <p class="category tiny primary">@lang('corals-marketplace-dragon::labels.template.cart.quantity')
                : {!! $item->qty !!}</p>
            <p class="price tiny">{{ $item->subtotal() }}</p>
        </li>
    @endforeach
    <li class="dropdown-item">
        <p class="text-header tiny">@lang('corals-marketplace-dragon::labels.template.cart.subtotal')</p>
        <p class="price" id="total">{{ ShoppingCart::subTotalAllInstances() }}</p>
        @if(Settings::get('marketplace_tax_tax_included_in_price'))
            <small style="font-size: 9px">@lang('Marketplace::attributes.product.tax_included') </small>
        @endif
        <a href="{{ url('cart') }}" class="button primary half">
            @lang('corals-marketplace-dragon::labels.template.cart.view_cart')
        </a>
        <a href="{{ url('checkout') }}"
           class="button secondary half">@lang('corals-marketplace-dragon::labels.template.cart.checkout')</a>
    </li>
@else

    <b class="text-header cart_empty" >@lang('corals-marketplace-dragon::labels.template.cart.have_no_item_cart')</b>
@endif
