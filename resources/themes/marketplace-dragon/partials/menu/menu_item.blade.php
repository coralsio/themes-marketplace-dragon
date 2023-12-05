@foreach($menus as $menu)
    @if($menu->hasChildren('active') && $menu->user_can_access)

        <li class="{{ \Request::is(explode(',',$menu->active_menu_url))|| $menu->getProperty('always_active',false,'boolean')?'active menu-item':'menu-item' }} {{ $menu->isRoot()?'':' sub ' }} {{  isset($sub_menu) ? 'item' : '' }}">
            <a href="{{url($menu->url)}}" class="{{  isset($sub_menu) ? '' : 'parent' }}">{{ $menu->name }}
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg></a>

            <div class="content-dropdown" id="custom-dropdown">
                <div class="feature-list-block">
                    <ul class="feature-list">
                        @include('partials.menu.menu_item', ['menus' => $menu->getChildren('active'),'sub_menu'=>true])
                    </ul>
                </div>
            </div>
    @elseif($menu->user_can_access)
        <li class="{{  isset($sub_menu) ? 'feature-list-item' : 'menu-item' }}">
            <a href="{{ url($menu->url) }}" target="{{ $menu->target??'_self' }}"
               class="{{ isset($sub_menu) ? '' : 'parent' }}">
                {{ $menu->name }}
            </a>
        </li>
    @endif
@endforeach