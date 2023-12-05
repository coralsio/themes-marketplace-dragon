@extends('layouts.public')

@section('content')
    <div class="section-headline-wrap v2">
        <div class="section-headline">
            <h2>@lang('corals-marketplace-dragon::labels.template.shop.products')</h2>
            <p>@lang('corals-marketplace-dragon::labels.template.home.title')<span class="separator">/</span><span
                        class="current-section">@lang('corals-marketplace-dragon::labels.template.shop.products')</span>
            </p>
        </div>
    </div>
    <div class="section-wrap">
        <div class="section">
            <div class="content">
                <div class="headline tertiary">
                    <h4>{{trans('corals-marketplace-dragon::labels.template.shop.page',['current'=>$products->currentPage(),'total' => $products->lastPage()])}}</h4>
                    <div class="view-selectors">
                        <a href="{{ request()->fullUrlWithQuery(['layout'=>'grid']) }}"
                           class="view-selector grid {{ $layout=='grid'?'active':'' }}"></a>
                        <a href="{{ request()->fullUrlWithQuery(['layout'=>'list']) }}"
                           class="view-selector list {{ $layout=='list'?'active':'' }}"></a>
                    </div>
                    <form>
                        <label for="price_filter" class="select-block">
                            <select id="shop_sort">
                                <option disabled="disabled"
                                        selected>@lang('corals-marketplace-dragon::labels.template.shop.select_option')</option>
                                @foreach($sortOptions as $value => $text)
                                    <option value="{{ $value }}" {{ request()->get('sort') == $value?'selected':'' }}>
                                        {{ $text }}
                                    </option>
                                @endforeach
                            </select>
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                        </label>
                    </form>
                    <div class="clearfix"></div>
                    @isset($shopText)
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <p class="product-description">{{ $shopText }}</p>
                        </div>
                    </div>
                    @endisset
                </div>
                <div class="product-showcase">
                    <div class="product-list {{$layout =='grid'?'grid column3-4-wrap':'list'}}">
                        @forelse($products as $product)
                            @include('partials.product_'.$layout.'_item',compact('product'))
                        @empty
                            <h4>@lang('corals-marketplace-dragon::labels.template.shop.sorry_no_result')</h4>
                        @endforelse
                    </div>
                </div>
                <div class="clearfix"></div>
                {{ $products->appends(request()->except('page'))->links('partials.paginator') }}
            </div>
            @include('partials.shop_filter')
        </div>
    </div>
@endsection
@section('js')
    @parent

    <script type="text/javascript">
        $(document).ready(function () {
            $("#shop_sort").change(function () {
                $("#filterSort").val($(this).val());

                $("#filterForm").submit();
            })
        });
    </script>
@endsection