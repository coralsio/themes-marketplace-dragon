@extends('layouts.public')

@section('content')
    <div class="section-headline-wrap">
        <div class="section-headline">
            <h2>{{$store->name}}</h2>
            <p>{{$store->name}}</p>
        </div>
    </div>
    <div class="bg author-profile-banner-background" data-bg="{{$store->cover_photo}}"
         data-scrollax="properties: { translateY: '30%' }"></div>
    <div class="author-profile-meta-wrap">
        <div class="author-profile-meta">
            <div class="author-profile-info">
                <div class="author-profile-info-item">
                    <p class="text-header">@lang('corals-marketplace-dragon::labels.template.store.member_since')</p>
                    <p>{{format_date($store->created_at)}}</p>
                </div>
                <div class="author-profile-info-item">
                    <p class="text-header">@lang('corals-marketplace-dragon::labels.template.store.total_product')</p>
                    <p>{{\Corals\Modules\Marketplace\Models\Product::where('store_id',$store->id)->count()}}</p>
                </div>
                <div class="author-profile-info-item">
                    <p class="text-header">@lang('corals-marketplace-dragon::labels.template.store.website')</p>
                    <p><a href="{{url('store/'.$store->slug)}}" class="primary">{{$store->name}}</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="section-wrap">
        <div class="section overflowable">
            <div class="sidebar left author-profile">
                <div class="sidebar-item author-bio">
                    <a href="#" class="user-avatar-wrap medium">
                        <figure class="user-avatar medium">
                            <img src="{{ $store->thumbnail }}" alt="">
                        </figure>
                    </a>
                    <p class="text-header">{!! $store->name !!}</p>
                    <p class="text-oneline">{!! $store->short_description !!}</p>
                    <ul class="share-links" id="share-links">
                        @include('partials.components.social_share',['url'=> URL::current() , 'title'=>$store->name ])
                    </ul>
                    <a href="{{ url('messaging/discussions/create?user='.$store->user->hashed_id) }}"
                       title="@lang('corals-marketplace-dragon::labels.template.store.contact',['store_name'=>$store->name])"
                       data-original-title="@lang('corals-marketplace-dragon::labels.template.store.contact',['store_name'=>$store->name])"
                       class="button mid dark spaced">@lang('corals-marketplace-dragon::labels.template.store.contact',['store_name'=>$store->name])</a>

                    <a href="{{ url('marketplace/follow/'.$store->hashed_id) }}"
                       data-action="post" data-page_action="toggleFollowStore"
                       data-follow_store_hashed_id="{{$store->hashed_id}}"
                       class="button mid dark spaced">{!!   $store->inWishList() ? trans('corals-marketplace-dragon::labels.template.store.remove_follow') : trans('corals-marketplace-dragon::labels.template.store.add_to_follow') !!}</a>
                    @if($store->return_policy)
                        <div class="text-center">
                            <a href="{{ request()->url().'/return-policy' }}" class="modal-load"
                               data-title="@lang('Marketplace::attributes.store.return_policy')">
                                <small>@lang('Marketplace::attributes.store.return_policy')</small>
                            </a>
                        </div>
                    @endif
                </div>
                <ul class="dropdown hover-effect">
                    <li class="dropdown-item">
                        <p class="text-header">@lang('corals-marketplace-dragon::labels.template.store.author_item_count',['author_items_count'=> $store->products->count()]) </p>
                    </li>
                    <li class="dropdown-item">
                        <p class="text-header">@lang('corals-marketplace-dragon::labels.template.store.author_reviews_count',['author_reviews_count'=>$store->getStoreReviews(true) ])</p>
                    </li>
                    <li class="dropdown-item">
                        <p class="text-header">@lang('corals-marketplace-dragon::labels.template.store.author_followers_count',['author_followers_count'=>$store->wishlists()->count() ])</p>
                    </li>
                </ul>
                @php $recommendationPercentage = $store->getRecommendationPercentage()  @endphp
                <div class="sidebar-item author-reputation full">
                    @include('partials.components.store_recommendation',['percentage'=> $recommendationPercentage])

                </div>
            </div>
            <div class="content right">
                <div class="headline buttons primary">
                    <h4>@lang('corals-marketplace-dragon::labels.template.store.latest_item')</h4>
                </div>
                <div class="text-center">
                    @php \Actions::do_action('pre_display_shop') @endphp
                    {!!   \Shortcode::compile( 'zone','store-header' ) ; !!}
                </div>
                <div class="product-list {{$layout =='grid'?'grid column3-4-wrap':'list'}}">
                    @forelse($products as $product)
                        @include('partials.product_'.$layout.'_item',compact('product'))
                    @empty
                        <h4>@lang('corals-marketplace-dragon::labels.template.shop.sorry_no_result')</h4>
                    @endforelse
                </div>
                <div class="clearfix"></div>
                {{ $products->appends(request()->except('page'))->links('partials.paginator') }}
                <div class="custom-margin">
                    {!!   \Shortcode::compile( 'zone','store-footer' ) ; !!}
                </div>
            </div>
            <div class="clearfix"></div>
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
            });

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

        function toggleFollowStore(response) {

            $follow_item = $('*[data-follow_store_hashed_id="' + response.hashed_id + '"]');

            if (response.action == "add") {
                $follow_item.html("@lang('corals-marketplace-dragon::labels.template.store.remove_follow')");
            } else {
                $follow_item.html("@lang('corals-marketplace-dragon::labels.template.store.add_to_follow')");
            }
        }
    </script>
@endsection
