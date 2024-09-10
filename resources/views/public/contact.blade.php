@extends('layouts.main')

@push('pageHeader')
Contact Form
@endpush

@push('classType')

<body class="topics-listing-page" id="top">
    @endpush

    @section('content')

    @include('public.includes.nav')
    @include('public.includes.header')
    @include('public.includes.contact-section')

    @endsection