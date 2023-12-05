@foreach($menus as $menu)
    @if($menu->hasChildren('active')  && $menu->user_can_access)
        <li class="{{ \Request::is(explode(',',$menu->active_menu_url))?'active':'' }} {{ $menu->isRoot()?'':'dropdown-item interactive' }}">
            <a href="#">{!! $menu->name !!}
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
            </a>
            <ul class="inner-dropdown">
                @include('partials.menu.mobile_menu_item', ['menus' => $menu->getChildren('active')])
            </ul>
        </li>
    @elseif($menu->user_can_access)
        <li class="{{ \Request::is(explode(',',$menu->active_menu_url))?'active':'' }} dropdown-item">
            <a href="{{ url($menu->url) }}" target="{{ $menu->target??'_self' }}">
                {{ $menu->name }}
            </a>
        </li>
    @endif
@endforeach