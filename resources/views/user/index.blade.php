@extends('layouts.app')

@section('title')
    Kullanıcı Ayarları
@endsection

@section('content')
    <!-- Contact Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div id="user-settings" class="col-lg-8">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Kullanıcı Ayarları</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <input type="hidden" name="scroll_to" value="user-settings">
                            <div class="form-group">
                                <label for="name">Ad Soyad</label>
                                <input type="text" class="form-control p-4" name="name" value="{{ old('name') ?: $user->name }}" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="email">E-posta</label>
                                <input type="text" class="form-control p-4" name="email" value="{{ old('email') ?: $user->email }}" required="required"/>
                            </div>
                            <div class="form-group">
                                <p class="text-success">{{ session('success') }}</p>
                                <p class="text-danger">{{ old('scroll_to') == 'user-settings' ? @$errors->first() : '' }}</p>
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                    type="submit">Kaydet</button>
                            </div>
                            <div class="mt-3">
                                <a class="text-dark" href="{{ route('user.change-password') }}">Şifre Değiştir</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('partials.follow-us')
                    @include('partials.newsletter')
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection