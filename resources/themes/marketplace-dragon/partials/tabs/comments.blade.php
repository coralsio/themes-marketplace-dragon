<div class="comment-list" id="product_comments_{{ $product->id }}">

@if($comments && count($comments))
    @foreach($comments as $comment)

        <!-- COMMENT -->
            <div class="comment-wrap">
                <!-- USER AVATAR -->
                <figure class="user-avatar medium">
                    <img src="{{ optional($comment->comment_author)->picture_thumb }}" alt="">
                </figure>
                <!-- /USER AVATAR -->
                <div class="comment">
                    <p class="text-header">{{optional($comment->comment_author)->full_name}}</p>

                    <!-- /PIN -->
                    <p class="timestamp">{{ $comment->created_at->diffForHumans() }}</p>
                    <p>{{$comment->body}}</p>
                </div>


                @if(count($comment->comments))
                    @foreach($comment->comments as $reply)

                        <div class="comment-wrap">
                            <!-- USER AVATAR -->
                                <figure class="user-avatar medium">
                                    <img src="{{ optional($reply->author)->picture_thumb }}" alt="">
                                </figure>
                            <!-- /USER AVATAR -->
                            <div class="comment">
                                <p class="text-header">{{optional($reply->author)->full_name}}</p>
                                <!-- PIN -->
                                @if((optional($reply->comment_author)->id) == $product->created_by)
                                    <span class="pin">@lang('corals-marketplace-dragon::labels.template.product_single.comment_author')</span>
                            @endif
                            <!-- /PIN -->
                                <p class="timestamp">{{ $comment->created_at->diffForHumans() }}</p>
                                <p>{{$reply->body}}</p>
                            </div>
                        </div>


                @endforeach
            @endif

            @if(user() && user()->can('Utility::comment.reply') && ((optional($comment->comment_author)->id == user()->id) || ($product->created_by == user()->id ) )   )

                <!-- COMMENT REPLY -->
                    <div class="comment-wrap comment-reply">
                        <!-- USER AVATAR -->

                        <figure class="user-avatar medium">
                            <img src="{{ user()->picture_thumb }}" alt="">
                        </figure>

                        <!-- /USER AVATAR -->


                        <form class="custom-form ajax-form comment-reply-form"
                              action="{{url('marketplace/products/'.$comment->hashed_id.'/create-reply' )}}"
                              method="POST"
                              data-page_action="site_reload">

                            <div class="form-group required-field">
                                <textarea name="body" class="form-control custom-radius" cols="10" rows="2"
                                          style="height: 80px"
                                          placeholder="@lang('corals-marketplace-dragon::labels.template.product_single.add_reply_text')"></textarea>
                            </div>
                            <button type="submit"
                                    class="button small dark pull-right"
                                    style="margin: 0;">@lang('corals-marketplace-dragon::labels.template.product_single.add_reply')
                                <i class="fa fa-paper-plane-o"
                                   aria-hidden="true"></i></button>
                        </form>

                        <!-- /COMMENT REPLY FORM -->
                    </div>
                    <!-- /COMMENT REPLY -->
            @endif
            <!-- LINE SEPARATOR -->
                <hr class="line-separator">
                <!-- /LINE SEPARATOR -->
            </div>
            <!-- /COMMENT -->
        @endforeach
    @endif

    @if(user() && user()->can('Utility::comment.create'))
        <h3>Leave a Comment</h3>

        <!-- COMMENT REPLY -->
        <div class="comment-wrap comment-reply">
            <!-- USER AVATAR -->
            <figure class="user-avatar medium">
                <img src="{{ user()->picture_thumb }}" alt="">
            </figure>
            <!-- /USER AVATAR -->

            <!-- COMMENT REPLY FORM -->
            <form class="custom-form ajax-form comment-reply-form"
                  action="{{url('marketplace/products/'.$product->hashed_id.'/create-comment' )}}"
                  method="POST"
                  data-page_action="site_reload">

                <div class="form-group required-field">
                                <textarea name="body" class="form-control custom-radius" cols="10" rows="2"
                                          style="height: 80px"
                                          placeholder="@lang('corals-marketplace-dragon::labels.template.product_single.add_comments')"></textarea>
                </div>
                <button type="submit"
                        class="button small dark pull-right"
                        style="margin: 0;">@lang('corals-marketplace-dragon::labels.template.product_single.add_comment')
                    <i class="fa fa-paper-plane-o"
                       aria-hidden="true"></i></button>
            </form>
            <!-- /COMMENT REPLY FORM -->
        </div>
@endif
<!-- /COMMENT REPLY -->
</div>
