<div class="">
    <input class=""
           name="category[]" value="{{ $category->slug }}"
           type="checkbox"
           id="ex-check-{{ $category->id }}"
            {{ \Shop::checkActiveKey($category->slug,'category')?'checked':'' }}>
    <label class=""
           for="ex-check-{{ $category->id }}">
        <span class="checkbox tertiary"><span></span></span>
        {{ $category->name }}
        <span class="quantity">({{ \Shop::getCategoryAvailableProducts($category->id, true)}})</span>
    </label>
    @if($category->hasChildren())
        <div style="padding-left: 20px;">
            @foreach($category->children as $child)
                @include('partials.category_filter_item', ['category'=>$child])
            @endforeach
        </div>
    @endif
</div>