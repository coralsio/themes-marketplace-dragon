<div class="product-showcase">
    <div class="headline secondary">
        <h4>@lang('corals-marketplace-dragon::labels.partial.featured_categories')</h4>
        <div class="slide-control-wrap">
            <div class="slide-control left">
                <!-- SVG ARROW -->
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
            </div>
            <div class="slide-control right">
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
            </div>
        </div>
    </div>
    @php $categories = \Shop::getFeaturedCategories(); @endphp

    @if(!$categories->isEmpty())
        <div id="pl-4" class="product-list grid column4-wrap owl-carousel">
            @foreach($categories as $category)
                <div class="product-item column">
                    <div class="product-preview-actions">
                        <figure class="bg product-preview-image custom-background" data-bg="{{$category->thumbnail}}"
                                data-scrollax="properties: { translateY: '30%' }">
                        </figure>
                        <div class="preview-actions">
                            <div class="preview-action">
                                <a href="{{ url('shop?category='.$category->slug) }}">
                                    <div class="circle tiny primary">
                                        <span class="icon-tag"></span>
                                    </div>
                                </a>
                                <a href="{{ url('shop?category='.$category->slug) }}" id="custom-title">
                                    <p>@lang('corals-marketplace-dragon::labels.partial.view_products')</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="{{ url('shop?category='.$category->slug) }}">
                            <p class="text-header">{!! $category->name !!}</p>
                        </a>
                        <p class="price"> <span> @lang('Marketplace::attributes.product.starts_at')</span>&nbsp;{{ \Payments::currency($category->starting_from_price) }} </p>
                    </div>
                    <hr class="line-separator">
                </div>
            @endforeach
        </div>
    @endif
</div>