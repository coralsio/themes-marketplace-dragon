@extends('layouts.public')

@section('css')
    <style type="text/css">
        .badge {
            font-size: 8px;
        }

        .sku-item .label, .sku-item .add-to-cart {
            font-size: small;
            font-weight: 600;
        }

        .sku-item .add-to-cart {
        }

        .img-radio {
            max-height: 100px;
            margin: 5px auto;
        }

        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .selected-radio > img {
            opacity: .45;
        }

        .selected-radio .middle {
            opacity: 1;
        }
    </style>
@endsection
@section('content')
    @include('partials.page_header',['title'=>  $product->name  ,'featured_image'=>null])

    <div class="section-wrap">
        <div class="section">
            <div class="sidebar right">
                <div class="sidebar-item">
                    {!! CoralsForm::openForm(null,['url'=>'cart/'.$product->hashed_id.'/add-to-cart','method'=>'POST','class'=> 'ajax-form','id'=>'sku-form','data-page_action'=>"updateCart"]) !!}
                    <p class="price large" id="sku-price">{!! $product->price !!}</p>
                    @php
                        $rating = $product->averageRating(1)[0] ;
                        $rating_count = $product->ratings->count();
                    @endphp
                    <ul class="rating tooltip d-flex">
                        @if(\Settings::get('marketplace_rating_enable',true))
                            @include('partials.components.rating',['rating'=> $rating ,'rating_count'=>$rating_count])
                        @endif
                    </ul>
                    <hr class="line-separator">
                    @includeWhen($product->price_per_quantity, "templates.partials.price_per_quantity_description",['pricePerQuantity'=>$product->price_per_quantity])
                    @includeWhen($product->offers, "templates.partials.offers_list",['offers'=>$product->offers])

                    <hr class="line-separator">
                    <div id="product_cart_quantity">
                        {!! CoralsForm::number('quantity','corals-marketplace-dragon::attributes.template.quantity', false, 1, ['min' => 1, 'class'=>'form-control form-control-sm']) !!}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="offers-check-result"></div>
                        </div>
                    </div>
                    @if(!$product->isSimple)
                        @switch($productSKUsDisplayMethod = $product->getProperty('show_skus_as'))
                            @case('radio_skus')
                            @include("templates.partials.".$productSKUsDisplayMethod)
                            @break
                            @case('select_skus')
                            @include("templates.partials.".$productSKUsDisplayMethod)
                            @break
                            @case('options_skus')
                            {!! $product->renderProductOptions('variation_options',null,['as_filter'=>true])  !!}
                            <input type="hidden" name="sku_hash" value="" id="sku_hash_id"/>
                            @break
                            @default
                            @include("templates.partials.radio_skus")
                        @endswitch
                    @else
                        <input type="hidden" name="sku_hash" value="{{ $product->activeSKU(true)->hashed_id }}"/>
                    @endif
                    @if($product->external_url)
                        <a href="{{ $product->external_url }}" target="_blank" class="button mid dark-light half"
                           title="@lang('corals-marketplace-dragon::labels.template.product_single.buy_product')">
                            <i class="fa fa-fw fa-cart-plus"
                               aria-hidden="true"></i> @lang('corals-marketplace-dragon::labels.template.product_single.buy_product')
                        </a>
                    @elseif($product->isSimple && $product->activeSKU(true)->stock_status != "in_stock")
                        <a href="#" class="button mid dark-light half" style="margin-bottom: 10px"
                           title="Out Of Stock">
                            @lang('corals-marketplace-dragon::labels.partial.out_stock')
                        </a>
                    @else
                        {!! CoralsForm::button('corals-marketplace-dragon::labels.partial.add_to_cart',
                        ['class'=>'button mid primary spaced half'], 'submit') !!}
                    @endif

                    @if(\Settings::get('marketplace_wishlist_enable', 'true') == 'true')
                        @php $wishlist = $product->inWishList()  @endphp
                        <a class="button mid secondary wicon half btn-wishlist tooltip  {{ !is_null($wishlist) ? 'active' : '' }}"
                           title="@lang('Marketplace::module.wishlist.title')" data-style="zoom-in" data-color="red"
                           href="{{ url('marketplace/wishlist/'.$product->hashed_id) }}"
                           data-action="post" data-page_action="toggleWishListProduct"
                           data-wishlist_product_hashed_id="{{$product->hashed_id}}"><span
                                    class="icon-heart"></span>{{ $product->wishlists()->count() }}</a>
                    @endif

                    <div class="clearfix"></div>
                    {!! CoralsForm::closeForm() !!}
                </div>
                <div class="sidebar-item author-bio">
                    <h4>@lang('corals-marketplace-dragon::labels.template.product_single.product_author')</h4>
                    <hr class="line-separator">
                    <a href="{{$product->store->getUrl() }}" class="user-avatar-wrap medium">
                        <figure class="bg user-avatar medium">
                            <img src="{{$product->store->thumbnail}}" alt="">
                        </figure>
                    </a>
                    <p class="text-header"><a href="{{ $product->store->getUrl() }}">{{$product->store->name}}</a>

                        @if(\Settings::get('marketplace_rating_enable',true) == 'true')
                            @include('partials.components.rating',[
                            'rating'=> $product->store->averageRating(1)[0],
                            'rating_count'=> optional($product->store->countRating())[0]])
                        @endif
                    </p>
                    @foreach($product->activeCategories as $category)
                        <a class="" href="{{ url('shop?category='.$category->slug) }}"><p class="text-oneline">
                                {{ $category->name }}</p>
                        </a>
                    @endforeach
                    <ul class="share-links">
                        <li><a href="#" class="fb"></a></li>
                        <li><a href="#" class="twt"></a></li>
                        <li><a href="#" class="db"></a></li>
                    </ul>
                    <a href="{{ $product->store->getUrl() }}"
                       class="button mid dark spaced">@lang('corals-marketplace-dragon::labels.template.product_single.profile_page')</a>
                    <a href="{{ url('messaging/discussions/create?user='.$product->store->user->hashed_id) }}"
                       class="button mid dark-light">@lang('corals-marketplace-dragon::labels.template.product_single.send_private_message')</a>
                </div>
                <div class="sidebar-item product-info">
                    <h4>@lang('corals-marketplace-dragon::labels.template.product_single.product_information')</h4>
                    <hr class="line-separator">
                    <div class="information-layout">
                        <div class="information-layout-item">
                            <p class="text-header">@lang('corals-marketplace-dragon::labels.template.product_single.sales_count')</p>
                            <p>{{ $product->getSalesCount() }}</p>
                        </div>
                        <div class="information-layout-item">
                            <p class="text-header">@lang('corals-marketplace-dragon::labels.template.product_single.added_date')</p>
                            <p>{{ $product->present('created_at') }}</p>
                        </div>
                        <div class="information-layout-item">
                            <p class="tags primary"> {!! implode(',',$product->tags->pluck('name')->toArray()) !!}</p>
                        </div>
                    </div>
                </div>
                @php $recommendationPercentage = $product->store->getRecommendationPercentage()  @endphp

                <div class="sidebar-item author-reputation full">
                    @include('partials.components.store_recommendation',['percentage'=> $recommendationPercentage])
                </div>
                <div class="sidebar-item author-items">
                    <h4>@lang('corals-marketplace-dragon::labels.template.product_single.more_author_items')</h4>
                    <!-- PRODUCT LIST -->
                    <div class="product-list grid column4-wrap">
                        @if($more_products = Shop::getCategoryAvailableProducts($product->categories->first()->id, false , [$product->id] , 4 ) )
                            @foreach($more_products as $more_product )
                                @include('partials.product_grid_item',['product'=>$more_product])
                            @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="content left">
                <!-- POST -->
                <article class="post">
                    <!-- POST IMAGE -->
                    @if(!($medias = $product->getMedia('marketplace-product-gallery'))->isEmpty())
                        <div class="post-image">
                            <figure class="product-preview-image large liquid" id="custom-image">
                                @foreach($medias as $media)
                                    @if($loop->first)
                                        <img src="{{$media->getUrl()}}" alt="">
                                    @endif
                                @endforeach
                            </figure>
                            <div class="slide-control-wrap">
                                <div class="slide-control rounded left">
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                </div>
                                <div class="slide-control rounded right">
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                </div>
                            </div>
                            @foreach($product->activeCategories as $category)
                                <a href="{{ url('shop?category='.$category->slug) }}"
                                   class="button mid primary">{!! $category->name !!}</a>
                            @endforeach
                        </div>

                        <div class="post-image-slides">
                            <div class="image-slides-wrap full">
                                <div class="image-slides" data-slide-visible-full="{{ $medias->count() }}"
                                     data-slide-visible-small="2" data-slide-count="{{ $medias->count() }}">

                                    @foreach($medias as $media)
                                        <div class="image-slide {{ $media->getCustomProperty('featured', false)?'selected':'' }}">
                                            <div class="overlay"></div>
                                            <figure class="product-preview-image thumbnail liquid">
                                                <img src="{{$media->getUrl()}}" alt="">
                                            </figure>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center text-muted">
                            <small>@lang('corals-marketplace-dragon::labels.template.product_single.image_unavailable')</small>
                        </div>
                    @endif
                    <hr class="line-separator">
                    <div class="post-content">
                        <div class="post-paragraph">
                            <h3 class="post-title">{{$product->name}}</h3>
                            <p>{!! $product->description !!}</p>
                            <div class="share-links-wrap">
                                <p class="text-header small">@lang('corals-marketplace-dragon::labels.partial.share')</p>
                                <!-- SHARE LINKS -->
                                <ul class="share-links hoverable">
                                    @include('partials.components.social_share',['url'=> URL::current() , 'title'=>$product->name ])
                                </ul>
                                <!-- /SHARE LINKS -->
                            </div>
                        </div>
                    </div>
                    <!-- /SHARE -->
                </article>
                <!-- /POST -->

                <!-- POST TAB -->
                <div class="post-tab">
                    <!-- TAB HEADER -->
                    <div class="tab-header primary">
                        @if(\Settings::get('marketplace_rating_enable',true))
                            <div class="tab-item selected">
                                <p class="text-header">@lang('corals-marketplace-dragon::labels.template.product_single.reviews',['count'=>$product->ratings->count()])</p>
                            </div>
                        @endif

                        @if($product->present('options'))
                            <div class="tab-item">
                                <p class="text-header">
                                    @lang('corals-marketplace-dragon::labels.template.product_single.product_options')
                                </p>
                            </div>
                    @endif
                    <!-- TAB ITEM -->
                        <div class="tab-item">
                            <p class="text-header">@lang('corals-marketplace-dragon::labels.template.product_single.comments',['count'=>$product->comments->count()])</p>

                        </div>
                        <!-- /TAB ITEM -->

                        <!-- /TAB ITEM -->
                    </div>
                    <!-- /TAB HEADER -->

                    <div class="tab-content void">
                        <div class="comment-list">
                            @if(\Settings::get('marketplace_rating_enable',true))
                                @include('partials.tabs.reviews',['reviews'=>$product->ratings])
                            @endif

                        </div>
                    </div>
                    @if($product->present('options'))
                        <div id="product-specs" class="tab-content void">
                            <div class="comment-list">
                                <table class="table table-striped">
                                    @foreach($product->present('options') as $optionLabel => $optionsValue)
                                        <tr>
                                            <td>{{ $optionLabel }}</td>
                                            <td>{!! $optionsValue !!}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif
                    <div class="tab-content void">
                        @if(\Settings::get('marketplace_rating_comment_enable',true))
                            @include('partials.tabs.comments',['comments'=>$product->comments])
                        @endif
                    </div>
                    <!-- /TAB CONTENT -->

                    <!-- /TAB CONTENT -->
                </div>
                <!-- /POST TAB -->
            </div>
        </div>
        @endsection
        @section('js')
            @parent

            <script type="text/javascript">
                $(document).ready(function () {
                    $('.pie-chart-store').xmpiechart({
                        width: 176,
                        height: 176,
                        percent: {{ $recommendationPercentage  }},
                        fillWidth: 8,
                        gradient: true,
                        gradientColors: ['#10fac0', '#1cbdf9'],
                        speed: 2,
                        outline: true,
                        linkPercent: '.percent'
                    });


                });
            </script>
@endsection
