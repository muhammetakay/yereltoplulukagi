@extends('layouts.app')

@section('title')
    Etkinlikler
@endsection

@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">ETKİNLİKLER</h4>
                            </div>
                        </div>
                        @foreach ($events as $item)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ asset($item->image_path) }}" style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <span class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2">
                                                <i class="fa fa-location-arrow mr-2"></i>{{ $item->location }}</span>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap" href="{{ route('event', $item->id) }}">{{ $item->name }}</a>
                                        <p class="m-0" style="display: -webkit-box; -webkit-line-clamp: 3; overflow: hidden; -webkit-box-orient: vertical;">{!! $item->description !!}</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="{{ asset('assets/img/user.jpg') }}" width="25" height="25" alt="">
                                            <small>{{ $item->organizer }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-calendar mr-2"></i>{{ $item->event_date->translatedFormat('j M Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($events->count() == 0)
                            <div class="col-12">
                                <div class="bg-white border border-top-0 p-4 mb-3 text-dark">
                                    Güncel etkinlik bulunamadı.
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row justify-content-center pagination">
                        {{ $events->links() }}
                    </div>
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