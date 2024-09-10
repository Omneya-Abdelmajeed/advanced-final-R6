@extends('layouts.main')

@push('pageHeader')
    Topics Listing
@endpush

@push('classType')
    <body class="topics-listing-page" id="top">
@endpush 

@section('content')

    @include('public.includes.nav')
    @include('public.includes.header')
    @include('public.includes.popular-topics')
    @include('public.includes.trending-topics')

@endsection        