<div class="product-item column">
    @if($product->is_featured)
        <span class="pin featured">@lang('corals-marketplace-dragon::labels.partial.is_featured')</span>
    @endif
    <div class="product-preview-actions">
        <figure class="bg product-preview-image custom-background" data-bg="{{$product->image}}"
                data-scrollax="properties: { translateY: '30%' }">
        </figure>
        <div class="preview-actions">
            <div class="preview-action">
                @if(!$product->isSimple || $product->attributes()->count())
                    @if($product->external_url)
                        <a href="{{ $product->external_url }}" target="_blank" class="btn btn-outline-primary btn-sm"
                           title="Buy Product">
                            <div class="circle tiny primary" id="custom-cart">
                                <span class="icon-wallet"></span>
                            </div>
                        </a>
                    @else
                        <a href="{{ url('shop/'.$product->slug) }}" class="btn btn-outline-primary btn-sm tooltip" title="@lang('corals-marketplace-dragon::labels.partial.view_product')">
                            <div class="circle tiny primary" id="custom-cart">
                                <span class="icon-wallet"></span>
                            </div>
                        </a>
                    @endif
                @else
                    @php $sku = $product->activeSKU(true); @endphp
                    @if($sku->stock_status == "in_stock")
                        @if($product->external_url)
                            <a href="{{ $product->external_url }}" target="_blank"
                               class="btn btn-outline-primary btn-sm tooltip"
                               title="@lang('corals-marketplace-dragon::labels.partial.buy_product')">
                                <p>@lang('corals-marketplace-dragon::labels.partial.buy_product')</p>
                            </a>
                        @else
                            <a href="{{ url('cart/'.$product->hashed_id.'/add-to-cart/'.$sku->hashed_id) }}"
                               data-action="post" data-page_action="updateCart"
                               class="btn btn-outline-primary btn-sm tooltip" data-style="zoom-in" title="@lang('corals-marketplace-dragon::labels.partial.add_to_cart')">
                                <div class="circle tiny primary" id="custom-cart">
                                    <span class="icon-wallet"></span>
                                </div>
                            </a>
                        @endif
                    @else

                        <a href="#" class="btn btn-sm btn-outline-danger tooltip"
                           title="@lang('corals-marketplace-dragon::labels.partial.out_stock')" >
                            <div class="circle tiny error" id="custom-cart">
                                <span class="icon-exclamation"></span>
                            </div>

                        </a>

                    @endif
                @endif

            </div>
            <div class="preview-action">
                @if(\Settings::get('marketplace_wishlist_enable', 'true') == 'true')
                    @include('partials.components.wishlist',['wishlist'=> $product->inWishList()])
                @endif
            </div>
        </div>
    </div>
    <div class="product-info">
        <a href="{{ url('shop/'.$product->slug) }}">
            <p class="text-header">{!! \Str::limit(strip_tags($product->name),30) !!}</p>
        </a>
        <p class="product-description">{!!  $product->caption  !!}</p>
        @foreach($product->activeCategories as $category)
            <p class="category tertiary"><a class=""
                                            href="{{ url('shop?category='.$category->slug) }}"><b>{{ $category->name }}</b></a>
            </p>
        @endforeach
        <p class="price">
            <span>
                @if($product->discount)
                    {{ \Payments::currency($product->regular_price) }}
                @endif
            </span>{!! $product->price !!}</p>
    </div>
    <hr class="line-separator">
    <div class="user-rating">
        <a href="{{ $product->store->getUrl() }}">
            <p class="text-header tiny">{{$product->store->name}}</p>
        </a>
        @php
            $rating = $product->averageRating(1)[0] ;
            $rating_count = $product->ratings->count();


        @endphp
        <ul class="rating " >
            @if(\Settings::get('marketplace_rating_enable',true))
                @include('partials.components.rating',['rating'=> $rating ,'rating_count'=>$rating_count])
            @endif
        </ul>
    </div>
</div>
