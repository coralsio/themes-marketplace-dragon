@extends('layouts.public')

@section('content')
    @include('partials.page_header',['title'=>$item->title])
    @php \Actions::do_action('pre_content',$item, $home??null) @endphp
    {!! $item->rendered !!}
@stop
