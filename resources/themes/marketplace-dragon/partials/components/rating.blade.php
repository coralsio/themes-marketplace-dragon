<div class="rating-stars tooltip" title="@lang('corals-marketplace-dragon::labels.template.shop.average_rating_count',['average_rating'=>$rating , 'ratings_count'=>$rating_count])">
    @for($i = 1 ; $i <= 5; $i++)
        <li class="rating-item {{ $rating >= $i ?  '' : 'empty' }}">
            <svg class="svg-star">
                <use xlink:href="#svg-star"></use>
            </svg>
        </li>
    @endfor
</div>


