@extends('layouts.app')

@section('title')
    Oturum Aç
@endsection

@section('content')
    <!-- Login Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Oturum Aç</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control p-4" placeholder="E-posta" name="email" value="{{ old('email') }}" required="required"/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control p-4" placeholder="Şifre" name="password" required="required"/>
                            </div>
                            <div class="form-group">
                                <span class="text-danger">{{ @$errors->first() }}</span>
                            </div>
                            <div class="mb-2">
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                    type="submit">Oturum Aç</button>
                            </div>
                            <div>
                                <a class="text-dark" href="{{ route('register') }}">Hesabınız yok mu? Kayıt olun.</a>
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