@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Haberler</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Başlık</th>
                                    <th>Kategori</th>
                                    <th>Yazar</th>
                                    <th>Görüntülenme</th>
                                    <th>Yorumlar</th>
                                    <th>Tarih</th>
                                    <th>Aksiyon</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news_list as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ route('single', $item->id) }}" target="_blank">{{ $item->title }}</a></td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->writer->name }}</td>
                                        <td>{{ $item->views }}</td>
                                        <td>{{ $item->comments->count() }}</td>
                                        <td data-order="{{ $item->created_at->timestamp }}">{{ $item->created_at->translatedFormat('j F Y, H:i') }}</td>
                                        <td>
                                            <a class="btn btn-default" href="{{ route('admin.news.edit', ['id' => $item->id]) }}" data-toggle="tooltip" data-placement="top" title="Düzenle">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-default" href="{{ route('admin.news.delete', ['id' => $item->id]) }}" data-toggle="tooltip" data-placement="top" title="Sil">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection

@push('script')
    <!-- DataTables JavaScript -->
    <script src="{{ asset('assets/backend/js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true,
                language: {
                    url: '{{ asset("assets/backend/js/dataTables/tr.json") }}'
                },
                order: [
                    [0, 'desc']
                ],
                columnDefs: [
                    {"type": "num", "targets": [0, 4]},
                ]
            });
        });
    </script>
@endpush
