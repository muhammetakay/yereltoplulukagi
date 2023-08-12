@extends('layouts.app')

@section('title')
    Şifre Değiştir
@endsection

@section('content')
    <!-- Contact Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div id="user-settings" class="col-lg-8">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">ŞİFRE DEĞİŞTİR</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <form method="POST" action="{{ route('user.change-password') }}">
                            @csrf
                            <input type="hidden" name="scroll_to" value="user-settings">
                            <div class="form-group">
                                <label for="name">Eski Şifre</label>
                                <input type="password" class="form-control p-4" name="old_password" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Yeni Şifre</label>
                                <input type="password" class="form-control p-4" name="new_password" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Yeni Şifre Tekrar</label>
                                <input type="password" class="form-control p-4" name="new_password_confirmation" required="required"/>
                            </div>
                            <div class="form-group">
                                <p class="text-success">{{ session('success') }}</p>
                                <p class="text-danger">{{ old('scroll_to') == 'user-settings' ? @$errors->first() : '' }}</p>
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                    type="submit">Değiştir</button>
                            </div>
                            <div class="mt-3">
                                <a class="text-dark" href="{{ route('user.index') }}">Geri Dön</a>
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