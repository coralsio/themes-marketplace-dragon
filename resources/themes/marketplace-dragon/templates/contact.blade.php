@extends('layouts.public')

@section('css')
    <style>
        .container {
            max-width: 1200px;
        }

        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .col-md-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }

        .mb-5, .my-5 {
            margin-bottom: 3rem !important;
        }

        .col-md-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }

        .col-md-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        a.button {
            margin: auto
        }
    </style>
@endsection
@section('content')
    <div class="map">
        <iframe src="{{ \Settings::get('google_map_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3387.331591494841!2d35.19981536504809!3d31.897586781246385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x518201279a8595!2sLeaders!5e0!3m2!1sen!2s!4v1512481232226') }}"
                width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="container padding-bottom-3x mb-1">
        {!! $item->rendered !!}
        <div>
            <form id="main-contact-form" class="contact-form ajax-form" name="contact-form" method="post"
                  data-page_action="clearContactForm"
                  action="{{ url('contact/email') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>@lang('corals-marketplace-dragon::labels.template.contact.name')</label>
                            <input type="text" name="name" class="form-control form-control-rounded"
                            >
                        </div>
                        <div class="form-group">
                            <label>@lang('corals-marketplace-dragon::labels.template.contact.email')</label>
                            <input type="email" name="email" class="form-control form-control-rounded"
                            >
                        </div>
                        <div class="form-group">
                            <label>@lang('corals-marketplace-dragon::labels.template.contact.phone')</label>
                            <input type="text" name="phone" class="form-control form-control-rounded">
                        </div>
                        <div class="form-group">
                            <label>@lang('corals-marketplace-dragon::labels.template.contact.company_name')</label>
                            <input type="text" name="company" class="form-control form-control-rounded">
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>@lang('corals-marketplace-dragon::labels.template.contact.subject')</label>
                            <input type="text" name="subject" class="form-control form-control-rounded"
                            >
                        </div>
                        <div class="form-group">
                            <label>@lang('corals-marketplace-dragon::labels.template.contact.message')</label>
                            <textarea name="message" id="message"
                                      class="form-control form-control-rounded"
                                      rows="10"></textarea>
                        </div>
                        <div class="form-group">

                            {!! NoCaptcha::display() !!}

                        </div>
                        <div class="form-group text-right">
                            <button type="submit" name="submit" class="button primary">
                                @lang('corals-marketplace-dragon::labels.template.contact.submit_message')
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')

    {!! NoCaptcha::renderJs() !!}

@endsection
