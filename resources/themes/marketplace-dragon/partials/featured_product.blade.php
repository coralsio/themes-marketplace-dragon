<div class="product-showcase">
    <div class="headline primary">
        <h4>@lang('corals-marketplace-dragon::labels.partial.featured_products')</h4>
        <div class="slide-control-wrap">
            <div class="slide-control left">
                <!-- SVG ARROW -->
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
                <!-- /SVG ARROW -->
            </div>

            <div class="slide-control right">
                <!-- SVG ARROW -->
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
                <!-- /SVG ARROW -->
            </div>
        </div>
    </div>
    @php $products = \Shop::getFeaturedProducts(); @endphp
    @if(!$products->isEmpty())
        <div id="pl-1" class="product-list grid column4-wrap owl-carousel">
            @foreach($products as $product)
                @include('partials.product_grid_item',compact('product'))
            @endforeach
        </div>
    @endif
</div>