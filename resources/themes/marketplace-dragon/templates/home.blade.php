@extends('layouts.public')

@section('content')
    @php \Actions::do_action('pre_content',$item, $home??null) @endphp

    <div class="banner-wrap">
        <section class="banner">
            {!! $item->rendered !!}
            <img src="{{\Theme::url('images/top_items.png')}}" alt="banner-img">
            <div class="search-widget">
                <form method="get" action="{{url('shop')}}" class="search-widget-form">
                    <input type="text" name="search" value="{{request()->get('search')}}"
                           placeholder="Search shop here...">
                    <label for="categories" class="select-block">
                        <select name="category">
                            <option value="">@lang('corals-marketplace-dragon::labels.template.home.select_category')</option>
                            @foreach(\Shop::getActiveCategories() as $category)
                                <option value="{{$category->slug}}">{!! $category->name !!}</option>
                            @endforeach
                        </select>
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                    </label>
                    <button type="submit"
                            class="button medium dark">@lang('corals-marketplace-dragon::labels.template.home.search_now')</button>
                </form>
            </div>
        </section>
    </div>
    <div id="product-features">
        {!!   \Shortcode::compile( 'block','blocks-home-marketplace' ) ; !!}
    </div>
    {!!   \Shortcode::compile( 'block','blocks-home-content' ) ; !!}
    <div class="clearfix"></div>
    <div id="product-sideshow-wrap">
        <div id="product-sideshow">
            @include('partials.featured_product')
            @include('partials.featured_categories')
        </div>
        {!!   \Shortcode::compile( 'block','blocks-home-services' ) ; !!}
    </div>
    <div id="subscribe-banner-wrap">
        <div id="subscribe-banner">
            <div class="subscribe-content">
                <div class="subscribe-header">
                    <figure>
                        <img src="{{\Theme::url('images/news_icon.png')}}" alt="subscribe-icon">
                    </figure>
                    <p class="subscribe-title">@lang('corals-marketplace-dragon::labels.template.home.subscribe_newsletter')</p>
                </div>
                {!! CoralsForm::openForm(null,['url' => url('utilities/newsletter/subscribe'),'method'=>'POST', 'class'=>'subscribe-form ajax-form','id'=>'subscribe']) !!}
                <div class="form-group">
                    <div>

                    </div>
                    <input type="text" name="email" id="subscribe-email"
                           placeholder="@lang('corals-marketplace-dragon::labels.template.home.your_email')">
                    <input type="hidden" name="list_id" value="{{\Settings::get('utility_mailchimp_list_id')}}">
                    <button class="button medium dark">@lang('corals-marketplace-dragon::labels.template.home.subscribe')</button>

                </div>

                {!! CoralsForm::closeForm() !!}
            </div>
        </div>
    </div>
    @include('partials.news')
@endsection

@section('js')

    <script>

        (function ($) {
            var productCarousel_1 = '#pl-1',
                productCarousel_2 = '#pl-2',
                productCarousel_3 = '#pl-3',
                productCarousel_4 = '#pl-4',
                productCarousel_5 = '#pl-5';

            var defaults = {
                items: 4,
                itemWidth: 300,
                itemsDesktop: [1260, 3],
                itemsTablet: [930, 2],
                itemsMobile: [620, 1],
                navigation: true,
                navigationText: false
            }

            $(productCarousel_1).owlCarousel(defaults);
            $(productCarousel_2).owlCarousel(defaults);
            $(productCarousel_3).owlCarousel(defaults);
            $(productCarousel_4).owlCarousel(defaults);
            $(productCarousel_5).owlCarousel(defaults);

            function nextSlide(e) {
                e.preventDefault();
                e.data.owlObject.next();
            }

            function prevSlide(e) {
                e.preventDefault();
                e.data.owlObject.prev();
            }

            function registerCarousels(carousels) {
                for (var i = 0; i < carousels.length; i++) {
                    var id = carousels[i],
                        owl = $(id).data('owlCarousel');

                    $(id).parent().find('.slide-control.right').on('click', {owlObject: owl}, nextSlide);
                    $(id).parent().find('.slide-control.left').on('click', {owlObject: owl}, prevSlide);
                }
            }

            var carousels = [productCarousel_1, productCarousel_2, productCarousel_3, productCarousel_4, productCarousel_5];
            registerCarousels(carousels);
        })(jQuery);

    </script>
@endsection
