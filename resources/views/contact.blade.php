@extends('layouts.app')

@section('title')
    İletişim
@endsection

@section('content')
    <!-- Contact Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div id="contact" class="col-lg-8">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">İLETİŞİM</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <div class="mb-4">
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-envelope-open text-primary mr-2"></i>
                                    <h6 class="font-weight-bold mb-0">info@yereltoplulukagi.com</h6>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-phone-alt text-primary mr-2"></i>
                                    <h6 class="font-weight-bold mb-0">+90 123 456 78 90</h6>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('contact') }}">
                            @csrf
                            <input type="hidden" name="scroll_to" value="contact">
                            <div class="form-group">
                                <input type="text" class="form-control p-4" placeholder="İsim" name="fullname" value="{{ old('fullname') }}" required="required"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" placeholder="E-posta" name="email" value="{{ old('email') }}" required="required"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" placeholder="Konu" name="subject" value="{{ old('subject') }}" required="required"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="4" placeholder="Mesaj" name="message" required="required">{{ old('message') }}</textarea>
                            </div>
                            <div class="form-group">
                                <p class="text-success">{{ session('success') }}</p>
                                <p class="text-danger">{{ old('scroll_to') == 'contact' ? @$errors->first() : '' }}</p>
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                    type="submit">Gönder</button>
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