@extends('layouts.app')

@section('title')
    {{ $news->title }}
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
                        <img class="img-fluid w-100" src="{{ asset($news->image_path) }}" style="object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="{{ route('category', $news->category->id) }}">{{ $news->category->name }}</a>
                                <a class="text-body">{{ $news->created_at->translatedFormat('M j, Y') }}</a>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $news->title }}</h1>
                            <p style="white-space: pre-wrap">{!! $news->content !!}</p>
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle mr-2" src="{{ asset('assets/img/user.jpg') }}" width="25" height="25"
                                    alt="">
                                <span>{{ $news->writer->name }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="far fa-eye mr-2"></i>{{ $news->views }}</span>
                                <span class="ml-3"><i class="far fa-comment mr-2"></i>{{ $news->comments->count() }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    <div @class(['mb-3', 'd-none' => $news->comments->count() == 0])>
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{ $news->comments()->count() }} Yorum</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            @foreach ($news->comments as $item)
                                <div class="media mb-4">
                                    <img src="{{ asset('assets/img/user.jpg') }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6><a class="text-secondary font-weight-bold">{{ $item->user->name }}</a> <small><i>{{ $item->created_at->translatedFormat('j M Y') }}</i></small></h6>
                                        <p style="white-space: pre-wrap">{{ $item->comment }}</p>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row justify-content-center">
                                {{ $news->comments->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div @class(['mb-3', 'd-none' => !auth()->check()])>
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Yorum Bırak</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <form method="POST" action="{{ route('single.add.comment', $news->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="comment">Mesaj *</label>
                                    <textarea id="comment" name="comment" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <p class="text-danger">{{ @$errors->first() }}</p>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Yorum Bırak" class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Comment Form End -->
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
