@extends('layouts.public')

@section('css')
    {!! Theme::css('css/pricingTable.min.css') !!}
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

        @media (min-width: 768px) {
            .col-md-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }
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
    @include('partials.page_header',['title'=>$pricing->title])
    <div class="section-wrap">
        <div class="section">
            <div class="content full">
                <article class="post blog-post">
                    {!! $pricing->rendered !!}
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($products as $product)
                                <div class="my-5">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p style="height: 100px;vertical-align: middle;display: table-cell;font-size: 20px;font-weight:bold ">{{ $product->description }}</p>
                                        </div>
                                    </div>
                                    {!!   \Shortcode::compile( 'pricing',$product->id ) !!}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection