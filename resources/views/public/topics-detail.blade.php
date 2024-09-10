@extends('layouts.main')

@push('classType')
    <body id="top">
@endpush 

@section('content')

    @include('public.includes.nav')
    @include('public.includes.topic-detail-header')
    @include('public.includes.topics-detail-section')
    @include('public.includes.get-new-letter')

@endsection        