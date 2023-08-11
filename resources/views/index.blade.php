@extends('layouts.app')

@section('content')
    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    @foreach ($sliderNews->take(3) as $item)
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="{{ asset($item->image_path) }}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="{{ route('category', $item->category->id) }}">{{ $item->category->name }}</a>
                                <a class="text-white" href="">{{ $item->created_at->translatedFormat('M j, Y') }}</a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="{{ route('single', $item->id) }}">{{ $item->title }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    @foreach ($sliderNews->reverse()->take(4) as $item)
                    <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset($item->image_path) }}" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="{{ route('category', $item->category->id) }}">{{ $item->category->name }}</a>
                                    <a class="text-white" href=""><small>{{ $item->created_at->translatedFormat('M j, Y') }}</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{ route('single', $item->id) }}">{{ $item->title }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->

    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">ÖNE ÇIKAN HABERLER</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                @foreach ($featuredNews as $item)
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid h-100" src="{{ asset($item->image_path) }}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="{{ route('category', $item->category->id) }}">{{ $item->category->name }}</a>
                                <a class="text-white" href=""><small>{{ $item->created_at->translatedFormat('M j, Y') }}</small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{ route('single', $item->id) }}" style="display: -webkit-box; -webkit-line-clamp: 2; overflow: hidden; -webkit-box-orient: vertical;">{{ $item->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">SON HABERLER</h4>
                            </div>
                        </div>
                        @foreach ($recentNews as $item)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ asset($item->image_path) }}" style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="{{ route('category', $item->category->id) }}">{{ $item->category->name }}</a>
                                            <a class="text-body"><small>{{ $item->created_at->translatedFormat('M j, Y') }}</small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap" href="{{ route('single', $item->id) }}">{{ $item->title }}</a>
                                        <p class="m-0" style="display: -webkit-box; -webkit-line-clamp: 3; overflow: hidden; -webkit-box-orient: vertical;">{!! $item->content !!}</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="{{ asset('assets/img/user.jpg') }}" width="25" height="25" alt="">
                                            <small>{{ $item->writer->name }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $item->views }}</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>{{ $item->comments->count() }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
