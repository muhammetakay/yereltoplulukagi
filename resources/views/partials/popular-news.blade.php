<!-- Popular News Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">POPÜLER HABERLER</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        @foreach (getPopularNews(5) as $item)
            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                <img src="{{ asset($item->image_path) }}" style="height: 110px; width: 110px; object-fit: cover;" alt="">
                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0" style="overflow: hidden">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{ route('category', $item->category->id) }}">{{ $item->category->name }}</a>
                        <a class="text-body" href=""><small>{{ $item->created_at->translatedFormat('M j, Y') }}</small></a>
                    </div>
                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('single', $item->id) }}" style="display: -webkit-box; -webkit-line-clamp: 2; overflow: hidden; -webkit-box-orient: vertical;">{{ $item->title }}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Popular News End -->