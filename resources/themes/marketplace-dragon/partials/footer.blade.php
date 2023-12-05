<footer>
    <div id="footer-top-wrap">
        <div id="footer-top">
            <div class="company-info">
                <a href="{{ url('/') }}">
                    <figure class="logo small">
                        <img src="{{ \Settings::get('site_logo') }}" alt="{{ \Settings::get('site_name', 'Corals') }}">
                    </figure>
                </a>
                <ul class="company-info-list">
                    <li class="company-info-item">
                        <span class="icon-phone" style="color: #FFFFFF;"></span>
                        <p>
                            <span>{{ \Settings::get('contact_mobile','+970599593301') }}</span>
                        </p>
                    </li>
                    <li class="company-info-item">
                        <span class="icon-envelope" style="color: #FFFFFF;"></span>
                        <p>
                            <span>{{ \Settings::get('contact_form_email','support@example.com') }}</span>
                        </p>
                    </li>
                </ul>
                <ul class="social-links">
                    @foreach(\Settings::get('social_links',[]) as $key=>$link)
                        <li class="social-link {{ $key }}">
                            <a href="{{ $link }}" target="_blank">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="link-info">
                <p class="footer-title">@lang('corals-marketplace-dragon::labels.partial.menu_footer')</p>
                <ul class="link-list">
                    @foreach(Menus::getMenu('frontend_footer','active') as $menu)
                        <li class="link-item">
                            <div class="bullet"></div>
                            <a href="{{ url($menu->url) }}">@if($menu->icon)<i
                                        class="{{ $menu->icon }} fa-fw"></i>@endif {{ $menu->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <!-- /LINK LIST -->
            </div>
            <div class="link-info">
                <p class="footer-title">@lang('corals-marketplace-dragon::labels.partial.languages_currency')</p>
                <ul class="list-unstyled currencies" style="display: inline-block;">
                    @php \Actions::do_action('post_display_frontend_menu') @endphp
                </ul>
                @if(count(\Settings::get('supported_languages', [])) > 1)
                    <ul class="link-list" id="linklist">
                        <li class="link-item" style="list-style-type: none;display: inline-block">
                            {!! \Language::flags('dropdown-menu') !!}
                        </li>
                    </ul>
                @endif
            </div>
            <div class="twitter-feed">
                <p class="footer-title">@lang('corals-marketplace-dragon::labels.partial.latest_news')</p>
                <ul class="link-list">
                    @foreach(\CMS::getLatestNews(3) as $newsItem)
                        <li class="link-item">
                            <div class="bullet"></div>

                            <a href="{{ url($newsItem->slug) }}" title=""
                               style="padding: 0px">{{ $newsItem->title }}</a>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div id="footer-bottom-wrap">
        <div id="footer-bottom">
            <p>{!! \Settings::get('footer_text','') !!}</p>
        </div>
    </div>
</footer>
<div class="shadow-film closed"></div>
<svg style="display: none;">
    <symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
        <path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
			L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z"/>
    </symbol>
</svg>
<svg style="display: none;">
    <symbol id="svg-star" viewBox="0 0 10 10" preserveAspectRatio="xMinYMin meet">
        <polygon points="4.994,0.249 6.538,3.376 9.99,3.878 7.492,6.313 8.082,9.751 4.994,8.129 1.907,9.751
	2.495,6.313 -0.002,3.878 3.45,3.376 "/>
    </symbol>
</svg>
<svg style="display: none;">
    <symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
        <rect x="5" width="3" height="13"/>
        <rect y="5" width="13" height="3"/>
    </symbol>
</svg>