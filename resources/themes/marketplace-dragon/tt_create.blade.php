@extends('layouts.public')

@section('css')
    {!! Theme::css('css/bootstrap.min.css') !!}

    <style>
        .dropdown, .dropleft, .dropright, .dropup {
            position: absolute;
        }
    </style>
@endsection

@section('content')
    <div class="py-5">
        @include('TroubleTicket::troubleTickets.public.create', ['troubleTicket'=>$troubleTicket])
    </div>
@endsection
