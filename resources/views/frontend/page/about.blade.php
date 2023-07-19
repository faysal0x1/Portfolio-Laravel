@extends('frontend.front_master')


@section('content')
    @include('frontend.components.aboutComponents.breadcumb')
    @include('frontend.components.aboutComponents.about')
    @include('frontend.components.aboutComponents.aboutService')
    @include('frontend.components.aboutComponents.testimonial')
    @include('frontend.components.aboutComponents.blog')
    @include('frontend.components.aboutComponents.contact')

@endsection
