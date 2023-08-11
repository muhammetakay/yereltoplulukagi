<!-- Newsletter Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">HABER BÜLTENİ</h4>
    </div>
    <div class="bg-white text-center border border-top-0 p-3">
        <p>En güncel haberler için haber bültenine abone olun</p>
        <form action="{{ route('newsletter-subscription') }}" method="POST">
            @csrf
            <div class="input-group mb-2" style="width: 100%;">
                <input type="email" class="form-control form-control" placeholder="E-posta Adresi" name="email" autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-primary font-weight-bold px-3">Abone Ol</button>
                </div>
            </div>
        </form>
        <div class="form-group text-center mb-0 mt-3">
            <p class="text-success">{{ session('message') }}</p>
            <p class="text-danger">{{ @$errors->first() }}</p>
        </div>
    </div>
</div>
<!-- Newsletter End -->