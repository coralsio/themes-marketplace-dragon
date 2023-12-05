@extends('layouts.public')

@section('content')
    @include('partials.page_header', ['title'=>$faq->title])
    <div class="section-wrap">
        <div class="section">
            <div class="content" id="custom-width">
                <div class="thread">
                    <div class="thread-title pinned">
                        <p class="text-header">{!! $faq->content !!}</p>
                    </div>
                    @if(count($categories = \CMS::getCategoriesList(true, null, null, 'faq')))
                        <div class="comment-list">
                            @forelse($faqs as $faq)
                                <div class="comment-wrap">
                                    <div class="comment">
                                        <p class="text-header">{!! $faq->title !!}</p>
                                        <p class="timestamp">{{format_date($faq->created_at)}}</p>
                                        @if(count($faq->categories))
                                            @foreach($faq->categories as $category)
                                                <a href="#" class="reply">{!! $category->name !!}</a>
                                            @endforeach
                                        @endif
                                        @if(count($faq->tags))
                                            @foreach($faq->tags as $tag)
                                                <a class="report">{!! $tag->name !!}</a>
                                            @endforeach
                                        @endif
                                        <p>{!! $faq->content !!}</p>
                                    </div>
                                </div>
                                <hr class="line-separator">
                                <div class="clearfix"></div>
                            @empty
                                <div class="alert alert-warning">
                                    <h4>@lang('corals-marketplace-dragon::labels.faqs.no_faqs_found')</h4>
                                </div>
                            @endforelse
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection