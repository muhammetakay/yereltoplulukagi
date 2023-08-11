@extends('layouts.app')

@section('title')
    {{ $event->name }}
@endsection

@section('content')
    <!-- Breaking News Start -->
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="{{ asset($event->image_path) }}" style="object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <span class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2">
                                    <i class="fa fa-location-arrow mr-2"></i>{{ $event->location }}</span>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $event->name }}</h1>
                            <p style="white-space: pre-wrap">{!! $event->description !!}</p>
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle mr-2" src="{{ asset('assets/img/user.jpg') }}" width="25" height="25"
                                    alt="">
                                <span>{{ $event->organizer }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="far fa-calendar mr-2"></i>{{ $event->event_date->translatedFormat('j M Y, H:i') }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->
                </div>

                <div class="col-lg-4">
                    @include('partials.follow-us')
                    @include('partials.popular-news')
                    @include('partials.newsletter')
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
