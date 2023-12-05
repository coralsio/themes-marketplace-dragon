@extends('layouts.public')

@section('content')
    @include('partials.page_header', ['title'=>trans('corals-marketplace-dragon::labels.blog.title')])
    <div class="section-wrap">
        <div class="section">
            <div class="content {{ !in_array($blog->template, ['right', 'left'])?'full':'' }} {{ $blog->template =='left' ? 'left':'right' }}">
                <div class="blog-post-preview v2">
                    @forelse($posts as $post)
                        <div class="blog-post-preview-item">
                            <a href="{{ url($post->slug) }}">
                                @if($post->featured_image)
                                    <figure class="product-preview-image large">
                                        <img src="{{ $post->featured_image }}" alt="Post">
                                    </figure>
                                @endif
                            </a>
                            <div class="blog-post-preview-item-info">
                                <p class="text-header big">
                                    <a href="{{ url($post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </p>
                                <div class="meta-line" style="display: flex;">
                                    @foreach($post->activeCategories as $category)
                                        <a href="{{ url('category/'.$category->slug) }}"
                                           style="padding-right: 10px">
                                            <p class="category primary">{{ $category->name }}</p>
                                        </a>
                                    @endforeach
                                    @if(count($activeTags = $post->activeTags))
                                        @foreach($activeTags as $tag)
                                            <a href="{{ url('tag/'.$tag->slug) }}" style="padding-right: 10px">
                                                <p class="category primary">&nbsp;{{ $tag->name }}</p>
                                            </a>
                                        @endforeach
                                    @endif

                                    <div class="metadata">
                                        <div class="meta-item">
                                            <span class="icon-head"></span>
                                            <p>{{ $post->author->full_name }}</p>
                                        </div>
                                    </div>
                                    <p>{{ format_date($post->published_at) }}</p>
                                </div>
                                <p class="description-preview">
                                    {{ \Str::limit(strip_tags($post->rendered ),250) }}
                                </p>
                                <a href='{{ url($post->slug) }}'
                                   class="button dark-light more-button">@lang('corals-marketplace-dragon::labels.blog.read_more')</a>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-warning">
                            <h4>@lang('corals-marketplace-dragon::labels.blog.no_posts_found')</h4>
                        </div>
                    @endforelse
                </div>
                {{ $posts->links('partials.paginator') }}
            </div>
            @if(in_array($blog->template, ['right', 'left']))
                <div class="sidebar {{ $blog->template =='left' ? 'right':'left' }}">
                    @include('partials.blog_sidebar')
                </div>
            @endif
        </div>
    </div>
@endsection