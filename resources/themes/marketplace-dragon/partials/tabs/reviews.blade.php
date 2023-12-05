@foreach($reviews as $review)
    <div class="comment-wrap">
        <a href="#">
            <figure class="user-avatar medium">
                <img src="{{ @$review->author->picture_thumb }}" alt="">
            </figure>
        </a>
        <div class="comment">
            <p class="text-header">{{ $review->title }}</p>
            <p class="timestamp">{{ format_date($review->created_at) }}</p>
            <a href="#" class="report">{{ @$review->author->full_name }}</a>
            <p>{{ $review->body }}</p>
        </div>
    </div>
    <hr class="line-separator">
@endforeach
<div class="clearfix"></div>
<hr class="line-separator">
<h3>@lang('corals-marketplace-dragon::labels.partial.tabs.leave_review')</h3>
@if(!user())
    <div class="alert alert-info alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close"
                                                                                                 data-dismiss="alert"></span>
        <i class="icon-layers"></i>@lang('corals-marketplace-dragon::labels.partial.tabs.need_login_review')
    </div>
@else
    <div class="comment-wrap comment-reply">
        {!! CoralsForm::openForm(null,['url' => url('shop/'.$product->hashed_id.'/rate'),'method'=>'POST', 'class'=>'comment-reply-form ajax-form row','id'=>'checkoutForm','data-page_action'=>"clearForm"]) !!}

        <div class="col-sm-6">
            {!! CoralsForm::text('review_subject','corals-marketplace-dragon::attributes.tab.subject',true) !!}
        </div>

        <div class="col-sm-6">
            {!! CoralsForm::select('review_rating', 'corals-marketplace-dragon::attributes.tab.rating', trans('corals-marketplace-dragon::attributes.tab.rating_option'),true) !!}
        </div>
        <div class="col-12">
            {!! CoralsForm::textarea('review_text','corals-marketplace-dragon::attributes.tab.review',true,null,['rows'=>4]) !!}

        </div>
        <div class="col-12 text-right">
            {!! CoralsForm::button('corals-marketplace-dragon::labels.partial.tabs.submit_review',['class'=>'button primary'], 'submit') !!}
        </div>
        {!! CoralsForm::closeForm() !!}
    </div>
@endif
