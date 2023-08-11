<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title'){{ (View::getSection('title') ? ' | ' : '') . config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small">{{ now()->translatedFormat('l, F j, Y') }}</a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="{{ route('contact') }}">İletişim</a>
                        </li>
                        @if (auth()->check())
                            <li class="nav-item border-right border-secondary">
                                <a class="nav-link text-body small">Hoşgeldin, {{ auth()->user()->name }}</a>
                            </li>
                            @role('admin|moderator')
                                <li class="nav-item border-right border-secondary">
                                    <a class="nav-link text-body small" href="{{ route('admin.index') }}">Admin</a>
                                </li>
                            @endrole
                            <li class="nav-item">
                                <a class="nav-link text-body small" href="{{ route('logout') }}">Çıkış yap</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-body small" href="{{ route('login') }}">Giriş yap</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" rel="nofollow" target="_blank" href="https://www.facebook.com/yereltoplulukagi"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" rel="nofollow" target="_blank" href="https://twitter.com/yereltoplulukagi"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" rel="nofollow" target="_blank" href="https://www.linkedin.com/in/yereltoplulukagi"><small class="fab fa-linkedin-in"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" rel="nofollow" target="_blank" href="https://www.instagram.com/yereltoplulukagi"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" rel="nofollow" target="_blank" href="https://www.youtube.com/@@yereltoplulukagi"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="{{ route('index') }}" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">Yerel<span
                            class="text-secondary font-weight-normal">Topluluk Ağı</span></h1>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="{{ route('index') }}" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span
                        class="text-white font-weight-normal">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ route('index') }}" class="nav-item nav-link">ANASAYFA</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" data-indexof="{{ route('category') }}">KATEGORİLER</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            @foreach (getAllCategories() as $item)
                                <a href="{{ route('category', $item->id) }}" class="dropdown-item">{{ $item->name }}</a>    
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ route('events') }}" class="nav-item nav-link" data-indexof="{{ route('event') }}">ETKİNLİKLER</a>
                    <a href="{{ route('contact') }}" class="nav-item nav-link">İLETİŞİM</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">İLETİŞİM</h5>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+90 123 456 78 90</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@yereltoplulukagi.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">BİZİ TAKİP ET</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" rel="nofollow" target="_blank" href="https://www.facebook.com/yereltoplulukagi"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" rel="nofollow" target="_blank" href="https://twitter.com/yereltoplulukagi"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" rel="nofollow" target="_blank" href="https://www.linkedin.com/in/yereltoplulukagi"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" rel="nofollow" target="_blank" href="https://www.instagram.com/yereltoplulukagi"><i
                            class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" rel="nofollow" target="_blank" href="https://www.youtube.com/@@yereltoplulukagi"><i
                            class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">POPÜLER HABERLER</h5>
                @foreach (getPopularNews(3) as $item)
                    <div class="mb-3">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                href="{{ route('category', $item->category->id) }}">{{ $item->category->name }}</a>
                            <a class="text-body"><small>{{ $item->created_at->translatedFormat('M j, Y') }}</small></a>
                        </div>
                        <a class="small text-body text-uppercase font-weight-medium"
                            href="{{ route('single', $item->id) }}">{{ $item->title }}</a>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">KATEGORİLER</h5>
                <div class="m-n1">
                    @foreach (getAllCategories() as $item)
                        <a href="{{ route('category', $item->id) }}"
                            class="btn btn-sm btn-secondary m-1">{{ $item->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="{{ route('index') }}">{{ config('app.name') }}</a>. Tüm Hakları
            Saklıdır.
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $('.nav-link').filter(function() {
            return this.href == window.location || window.location.href == this.href || window.location.href.indexOf($(this).data('indexof')) == 0;
        }).addClass('active');
        if(window.location.href.indexOf("?page=") != -1) {
            $('.pagination').parent().get(0).scrollIntoView({behavior: 'smooth'});
        }
        @if ($errors->any())
            $('#{{ old("scroll_to") }}').get(0).scrollIntoView({behavior: 'smooth'});
        @endif
        @if (session()->has('scroll_to'))
            $('#{{ session("scroll_to") }}').get(0).scrollIntoView({behavior: 'smooth'});
        @endif
    </script>

    @stack('script')
</body>

</html>
