@extends('layouts.main')

@push('pageHeader')
    Testimonials
@endpush

@push('classType')
    <body class="topics-listing-page" id="top">
@endpush 

@section('content')

    @include('public.includes.nav')
    @include('public.includes.header')
    @include('public.includes.testimonial-section')

@endsection