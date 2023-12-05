<a class="btn btn-outline-secondary btn-sm btn-wishlist tooltip  {{ !is_null($wishlist) ? 'active' : '' }}"
   title="@lang('Marketplace::module.wishlist.title')" data-style="zoom-in" data-color="red"
   href="{{ url('marketplace/wishlist/'.$product->hashed_id) }}"
   data-action="post" data-page_action="toggleWishListProduct"
   data-wishlist_product_hashed_id="{{$product->hashed_id}}">
    <div class="circle tiny secondary">
        <span class="icon-heart"></span></div>
</a>


