@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Yorumlar</h1>
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
                                    <th>Yorum</th>
                                    <th>Kullanıcı</th>
                                    <th>Haber</th>
                                    <th>Tarih</th>
                                    <th>Aksiyon</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td><a href="{{ route('single', $item->news->id) }}" target="_blank">{{ $item->news->title }}</a></td>
                                        <td data-order="{{ $item->created_at->timestamp }}">{{ $item->created_at->translatedFormat('j F Y, H:i') }}</td>
                                        <td>-</td>
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
                    {"type": "num", "targets": [0]},
                ]
            });
        });
    </script>
@endpush
