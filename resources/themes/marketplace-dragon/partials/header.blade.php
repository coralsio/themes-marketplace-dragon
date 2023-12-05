<header>
    <a href="{{ url('/') }}">
        <figure class="logo">
            <img src="{{ \Settings::get('site_logo') }}" alt="{{ \Settings::get('site_name', 'Corals') }}">
        </figure>
    </a>
    <div class="mobile-menu-handler left primary">
        <img src="{{\Theme::url('images/pull-icon.png')}}" alt="pull-icon">
    </div>
    <a href="{{ url('/') }}">
        <figure class="logo-mobile">
            <img src="{{ \Settings::get('site_logo') }}" alt="{{ \Settings::get('site_name', 'Corals') }}">
        </figure>
    </a>
    <div class="mobile-account-options-handler right secondary">
        <span class="icon-user"></span>
    </div>
    <div class="user-board">
        <div class="user-quickview">
            @auth
            <a href="#">
                <div class="outer-ring">
                    <div class="inner-ring"></div>
                    <figure class="user-avatar">
                        <img src="{{ user()->picture_thumb }}" alt="{{ auth()->user()->name }}">
                    </figure>
                </div>
            </a>
            @else
                <a href="#" data-toggle="collapse" class="button primary">
                    @lang('corals-marketplace-dragon::labels.auth.my_account')
                </a>
                @endauth
                @auth
                <p class="user-name">{{user()->full_name}}</p>
                <p class="user-money" id="cart-header-total">{{ \ShoppingCart::totalAllInstances() }}</p>
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
                @endauth
                <ul class="dropdown small hover-effect closed">
                    @auth
                    <li class="dropdown-item">
                        <div class="dropdown-triangle"></div>
                        <a href="{{url('dashboard')}}">@lang('corals-marketplace-dragon::labels.partial.dashboard')</a>
                    </li>
                    <li class="dropdown-item">
                        <div class="dropdown-triangle"></div>
                        <a href="{{url('profile')}}">@lang('corals-marketplace-dragon::labels.partial.my_profile')</a>
                    </li>
                    <li class="dropdown-item">
                        <div class="dropdown-triangle"></div>
                        <a href="{{url('logout')}}"
                           data-action="logout">@lang('corals-marketplace-dragon::labels.partial.logout')</a>
                    </li>
                    @else
                        <li class="dropdown-item">
                            <div class="dropdown-triangle"></div>
                            <a href="{{ route('login') }}">@lang('corals-marketplace-dragon::labels.partial.login')</a>
                        </li>
                        <li class="dropdown-item">
                            <div class="dropdown-triangle"></div>
                            <a href="{{ route('register') }}">@lang('corals-marketplace-dragon::labels.partial.register')</a>
                        </li>
                        @endauth
                </ul>
        </div>
        <div class="account-information">
            <a href="{{url('/marketplace/wishlist/my')}}">
                <div class="account-wishlist-quickview">
                    <span class="icon-heart"></span>
                </div>
            </a>
            <div class="account-cart-quickview">
                <a href="#" class="account-cart-quickview box-body" id="cart_list">
                    <i class="fa fa-2x fa-shopping-cart" style="color: #6a7e82;
    font-size: 25px;"></i>
                    <span class="pin soft-edged secondary"
                          id="cart-header-count" id="cart-header-count">{{ \ShoppingCart::CountAllInstances() }}</span>
                </a>
                <ul class="dropdown cart closed" style="opacity:0;" >
                    <div class="cart_summary">
                        @include('partials.cart_summary')
                    </div>
                </ul>
            </div>
            @auth
            <div class="account-email-quickview">
                <a href="{{ url('notifications') }}" class="account-email-quickview">
								<span class="icon-envelope">
						</span>
                    <span class="pin soft-edged secondary">
                                @if($unreadNotifications = user()->unreadNotifications()->count())
                            {{ $unreadNotifications }}
                        @endif
                        </span>
                </a>
            </div>
            @endauth
        </div>
        <div class="account-actions">
            @auth
            @php $vendor_role = \Settings::get('marketplace_general_vendor_role', '') @endphp
            @if ($vendor_role  && !user()->hasRole($vendor_role))
                {!! '<a href="' . url('marketplace/store/enroll') . '" class="button primary">'.trans('Marketplace::labels.store.become_a_seller').'</a>' !!}
            @endif
            <a href="{{ route('logout') }}" data-action="logout" class="button secondary">
                @lang('corals-marketplace-dragon::labels.partial.logout')
            </a>
            @endauth
        </div>
        <!-- /ACCOUNT ACTIONS -->
    </div>
    <!-- /USER BOARD -->
</header>