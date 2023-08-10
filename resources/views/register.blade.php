@extends('layouts.app')

@section('title')
    Kayıt Ol
@endsection

@section('content')
    <!-- Login Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Kayıt Ol</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control p-4" placeholder="Ad Soyad" name="name" required="required"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" placeholder="E-posta" name="email" required="required"/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control p-4" placeholder="Şifre" name="password" required="required"/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control p-4" placeholder="Şifre Tekrar" name="password_confirmation" required="required"/>
                            </div>
                            <div class="mb-2">
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                    type="submit">Kayıt Ol</button>
                            </div>
                            <div>
                                <a class="text-dark" href="{{ route('login') }}">Hesabınız var mı? Giriş yapın.</a>
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