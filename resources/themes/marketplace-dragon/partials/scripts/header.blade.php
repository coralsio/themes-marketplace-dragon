<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{ \Settings::get('site_favicon') }}" type="image/png">
{!! \SEO::generate() !!}
{!! Theme::css('css/vendor/simple-line-icons.css') !!}
{!! Theme::css('css/vendor/tooltipster.css') !!}
{!! Theme::css('css/vendor/jquery.range.css') !!}
{!! Theme::css('plugins/select2/dist/css/select2.min.css') !!}
{!! Theme::css('css/vendor/bootstrap-grid.css') !!}


{!! Theme::css('css/vendor/owl.carousel.css') !!}
{!! Theme::css('css/style.css') !!}
{!! Theme::css('font-awesome-4.7.0/css/font-awesome.min.css') !!}
{!! Theme::css('plugins/Ladda/ladda-themeless.min.css') !!}
{!! Theme::css('plugins/sweetalert2/dist/sweetalert2.css') !!}


{!! Theme::css('css/custom.css') !!}
{!! \Html::script('assets/corals/js/corals_header.js') !!}
<!-- favicon -->
<script type="text/javascript">
    window.base_url = '{!! url('/') !!}';
</script>
@yield('css')
@stack('partial_css')

{!! \Assets::css() !!}
@if(\Settings::get('google_analytics_id'))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
            src="https://www.googletagmanager.com/gtag/js?id={{ \Settings::get('google_analytics_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', "{{ \Settings::get('google_analytics_id') }}");
    </script>
@endif
<style type="text/css">
    {!! \Settings::get('custom_css', '') !!}
</style>

