@extends('layouts.public')

@section('content')
    @include('partials.page_header',['title'=>$item->title,'featured_image'=>null])
    <div class="section-wrap">
        <div class="section">
            <div class="content {{ !in_array($blog->template, ['right', 'left'])?'full':'' }} {{ $blog->template =='left' ? 'left':'right' }}">
                <article class="post blog-post">
                    <div class="post-image">
                        @if($featured_image)
                            <figure class="product-preview-image large liquid">
                                <img src="{{ $featured_image }}" alt="">
                            </figure>
                        @endif
                    </div>
                    <div class="post-content with-title">
                        <p class="text-header big">{!! $item->title !!}</p>
                        <div class="meta-line" style="display: flex">
                            @foreach($item->post->activeCategories as $category)
                                <a href="{{ url('category/'.$category->slug) }}" style="padding-right: 5px">
                                    <p class="category primary">{{ $category->name }}</p>
                                </a>
                            @endforeach
                            @if(count($activeTags = $item->post->activeTags))
                                @foreach($activeTags as $tag)
                                    <a href="{{ url('tag/'.$tag->slug) }}">
                                        <p class="category primary">&nbsp;{{ $tag->name }}</p>
                                    </a>,
                                @endforeach
                            @endif
                            <div class="metadata">
                                <div class="meta-item">
                                    <span class="icon-eye"></span>
                                    <p>{{ $item->author->full_name }}</p>
                                </div>
                            </div>
                            <p>{{ format_date($item->published_at) }}</p>
                        </div>
                        <div class="post-paragraph">
                            <p>{!! $item->rendered !!}</p>
                        </div>

                        @if(\Settings::get('cms_comments_enabled'))
                            <div class="row">
                                <div class="col-md-12">
                                    @include('CMS::partials.comments',['comments'=>$item->publishedComments])
                                </div>
                            </div>
                        @endif
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
            @if(in_array($blog->template, ['right', 'left']))
                <div class="sidebar {{ $blog->template =='left' ? 'right':'left' }}">
                    @include('partials.blog_sidebar')
                </div>
            @endif
        </div>
    </div>
    <!-- /SECTION -->
@endsection
