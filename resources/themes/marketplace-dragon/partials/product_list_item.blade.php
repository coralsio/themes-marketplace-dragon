<div class="product-item">
    <a href="{{ url('shop/'.$product->slug) }}">
        <figure class="bg product-preview-image small custom-background-list" data-bg="{{$product->image}}"
                data-scrollax="properties: { translateY: '30%' }">
        </figure>
    </a>
    <div class="product-info">
        <a href="{{ url('shop/'.$product->slug) }}">
            <p class="text-header">{!! $product->name !!}</p>
        </a>
        <p class="product-description">{!! $product->caption !!}</p>
        @foreach($product->activeCategories as $category)
            <a href="{{ url('shop?category='.$category->slug) }}">
                <p class="category tertiary">{!! $category->name !!}</p>
            </a>
        @endforeach
    </div>
    <div class="author-data">
        <div class="user-rating">
            <figure class="user-avatar small">
                <img src="{{$product->store->thumbnail}}" alt="">
            </figure>
            <a href="{{ $product->store->getUrl() }}">
                <p class="text-header tiny">{{$product->store->name}}</p>
            </a>
        </div>
        <div class="metadata">
            <!-- META ITEM -->
            <div class="meta-item">
                <span class="icon-bubble"></span>
                <p>{{$product->ratings->count()}}</p>
            </div>
            <!-- /META ITEM -->

            <!-- META ITEM -->
            <div class="meta-item">
                <span class="icon-eye"></span>
                <p>{{$product->visitors_count}}</p>
            </div>
            <!-- /META ITEM -->

            <!-- META ITEM -->
            <div class="meta-item">
                <span class="icon-heart"></span>
                <p>105</p>
            </div>
            <!-- /META ITEM -->
        </div>
    </div>
    <div class="author-data-reputation">
        <p class="text-header tiny">@lang('corals-marketplace-dragon::attributes.tab.rating')</p>
        <ul class="rating">
            @if(\Settings::get('marketplace_rating_enable',true))
                @include('partials.components.rating',['rating'=> $product->averageRating(1)[0],'rating_count'=>null])
            @endif
        </ul>
    </div>
    <div class="item-actions">
        @if(\Settings::get('marketplace_wishlist_enable', 'true') == 'true')
            @include('partials.components.wishlist',['wishlist'=> $product->inWishList()])
        @endif
    </div>
    <div class="price-info">
        <p class="price medium">{!! $product->price !!}</p>
    </div>
</div>