{!! Theme::js('js/vendor/jquery-3.1.0.min.js') !!}
{!! Theme::js('js/vendor/jquery.range.min.js') !!}
{!! Theme::js('js/bootstrap.min.js') !!}
{!! Theme::js('js/vendor/jquery.xmtab.min.js') !!}
{!! Theme::js('js/vendor/owl.carousel.min.js') !!}
{!! Theme::js('js/vendor/jquery.xmalert.min.js') !!}
{!! Theme::js('js/vendor/jquery.magnific-popup.min.js') !!}
{!! Theme::js('plugins/select2/dist/js/select2.full.min.js') !!}
{!! Theme::js('js/image-slides.js') !!}
{!! Theme::js('js/alerts-generator.js') !!}
{!! Theme::js('plugins/jquery-block-ui/jquery.blockUI.min.js') !!}
{!! \Html::script('assets/corals/plugins/autocomplete/js/bootstrap-autocomplete.min.js') !!}

{!! Theme::js('js/vendor/jquery.tooltipster.min.js') !!}

{!! Theme::js('js/side-menu.js') !!}


{!! Theme::js('js/vendor/imgLiquid-min.js') !!}
{!! Theme::js('js/vendor/jquery.xmpiechart.min.js') !!}


{!! Theme::js('plugins/Ladda/spin.min.js') !!}
{!! Theme::js('plugins/Ladda/ladda.min.js') !!}


{!! Theme::js('js/functions.js') !!}
{!! Theme::js('js/main.js') !!}

{!! \Html::script('assets/corals/js/corals_functions.js') !!}
{!! \Html::script('assets/corals/js/corals_main.js') !!}
{!! Theme::js('js/user-board.js') !!}

{!! Theme::js('js/post-tab.js') !!}

@include('Marketplace::cart.cart_script')

{!! Assets::js() !!}

@php  \Actions::do_action('footer_js') @endphp

@include('Corals::corals_main')

@yield('js')

@php  \Actions::do_action('admin_footer_js') @endphp

<script type="text/javascript">
    {!! \Settings::get('custom_admin_js', '') !!}
</script>

@include('partials.components.modal',['id'=>'global-modal'])
@include('partials.notifications')
