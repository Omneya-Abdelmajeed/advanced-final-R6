@extends('layouts.main')

@push('classType')
    <body id="top">
@endpush

@section('content')

    @include('public.includes.index-navbar')
    @include('public.includes.hero-section')
    @include('public.includes.featured-section')
    @include('public.includes.explore-section')
    @include('public.includes.timeline-section')
    @include('public.includes.faq-section')
    @include('public.includes.testimonial-section')
    @include('public.includes.get-in-touch')

@endsection