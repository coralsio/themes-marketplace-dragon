<div class="sidebar-item newsletter">
    <form method="get" action="{{url('blog')}}">
        <input type="text" name="query" placeholder="Search blog">
        <button class="button mid dark-light" type="submit">Search Blog</button>
    </form>
</div>
<ul class="dropdown hover-effect">
    @foreach(\CMS::getCategoriesList(true, 'active') as $category)
        <li class="dropdown-item">
            <a href="{{url('category/'.$category->slug)}}">{!! $category->name !!}<span
                        class="item-count">{{ \CMS::getCategoryPostsCount($category) }}</span></a>
        </li>
    @endforeach
</ul>
<div class="sidebar-item">
    <h4>@lang('corals-marketplace-dragon::labels.partial.tag_cloud')</h4>
    <hr class="line-separator">
    <!-- TAG LIST -->
    <div class="tag-list primary">
        @foreach(\CMS::getTagsList(true, 'active') as $tag)
            <a href="{{ url('tag/'.$tag->slug) }}" class="tag-list-item">{!! $tag->name !!}</a>
        @endforeach
    </div>
    <!-- /TAG LIST -->
</div>
