@extends('layouts.public')

@section('content')
    @include('partials.page_header',['title'=>$item->title,'featured_image'=>null])
    <div class="section-wrap">
        <div class="section">
            <div class="content full">
                <article class="post blog-post">
                    @if($featured_image)
                        <div class="post-image">
                            <figure class="product-preview-image large liquid">
                                <img src="{{ $featured_image }}" alt="">
                            </figure>

                        </div>
                    @endif
                    <div class="post-content with-title">
                        <div class="post-paragraph">
                            <p>{!! $item->rendered !!}</p>
                        </div>
                    </div>
                    <hr class="line-separator">
                    <div class="share-links-wrap">
                        <p class="text-header small">@lang('corals-marketplace-dragon::labels.partial.share')</p>
                        <ul class="share-links hoverable">
                            @include('partials.components.social_share',['url'=> URL::current() , 'title'=>$item->name ])
                        </ul>
                    </div>
                </article>
            </div>

        </div>
    </div>
    <!-- /SECTION -->
@endsection