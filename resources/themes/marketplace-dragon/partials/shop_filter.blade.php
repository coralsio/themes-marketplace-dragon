<form id="filterForm">
    <div class="sidebar">
        <div class="sidebar-item">
            <h4>@lang('corals-marketplace-dragon::labels.template.shop.shop_filter')</h4>
            <hr class="line-separator">
            <input type="text" name="search"
                   placeholder="@lang('Marketplace::labels.shop.search')"
                   value="{{request()->get('search')}}">
            <input type="hidden" name="sort" id="filterSort" value=""/>
            <div class="categories-filter">
                @foreach(\Shop::getActiveCategories() as $category)
                    @include('partials.category_filter_item', ['category'=>$category])
                @endforeach
            </div>
        </div>
        @if(!($brands = \Shop::getActiveBrands(request()->input('category')))->isEmpty())
            <div class="sidebar-item">
                <h4>@lang('corals-marketplace-dragon::labels.template.shop.filter_brand')</h4>
                <hr class="line-separator">
                <!-- CHECKBOX -->
                @foreach($brands as $brand)
                    <input name="brand[]" value="{{ $brand->slug }}"
                           type="checkbox" id="brand_{{ $brand->id }}"
                            {{ \Shop::checkActiveKey($brand->slug,'brand')?'checked':'' }}/>
                    <label for="brand_{{ $brand->id }}">
                        <span class="checkbox tertiary"><span></span></span>
                        {!! $brand->name !!}
                        <span class="quantity">({{ $brand->products_count }})</span>
                    </label>
                @endforeach
            </div>
        @endif
        <div class="sidebar-item">
            <div class="column">
                {!! \Shop::getAttributesForFilters(request()->input('category')) !!}
            </div>
        </div>
        @php
            $min = \Shop::getSKUMinPrice()??0;
            $max= \Shop::getSKUMaxPrice()??9999999;
        @endphp
        @if($min !== $max)
            <div class="sidebar-item range-feature">
                <h4>@lang('corals-marketplace-dragon::labels.template.shop.price_range')</h4>
                <hr class="line-separator spaced">
                <div class="ui-range-value-min ">
                    <input class="tertiary" value="{{ request()->input('price.min') ?? $min}}"
                           id="slider_min_price" name="price[min]" type="hidden">
                    <input class="price-range-slider tertiary" id="slider_max_price"
                           value="{{ request()->input('price.max') ?? $max }}"
                           name="price[max]" type="hidden">
                </div>
                <button class="button mid tertiary"
                        type="submit">@lang('corals-marketplace-dragon::labels.template.shop.filter')</button>
            </div>
        @endif
    </div>
</form>
@section('js')
    @parent
    <script type="text/javascript">
        $(document).ready(function () {
            var data_min = {{$min}};
            var data_max = {{$max}};
            $('.price-range-slider').jRange({
                from: data_min,
                to: data_max,
                step: 1,
                format: '$%s',
                width: 242,
                showLabels: true,
                showScale: false,
                isRange: true,
                theme: "theme-edragon tertiary",
                onstatechange: function (data_min, data_max) {
                    var prices = data_min.split(",");
                    $("#slider_min_price").val(prices[0]);
                    $("#slider_max_price").val(prices[1]);
                }
            });
        });
    </script>
@endsection
@php \Actions::do_action('post_display_marketplace_filter') @endphp
<div class="custom-margin" style="display: inline-block;text-align: center;">
    @isset($store)
        {!!   \Shortcode::compile( 'zone','store-sidebar' ) ; !!}
    @else
        {!!   \Shortcode::compile( 'zone','shop-sidebar' ) ; !!}
    @endisset
</div>