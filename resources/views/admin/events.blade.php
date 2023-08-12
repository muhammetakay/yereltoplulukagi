@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Etkinlikler</h1>
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
                                    <th>Etkinlik Adı</th>
                                    <th>Tarihi</th>
                                    <th>Konumu</th>
                                    <th>Organizatör</th>
                                    <th>Aksiyon</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ route('event', $item->id) }}" target="_blank">{{ $item->name }}</a></td>
                                        <td data-order="{{ $item->event_date->timestamp }}">{{ $item->event_date->translatedFormat('j F Y, H:i') }}</td>
                                        <td>{{ $item->location }}</td>
                                        <td>{{ $item->organizer }}</td>
                                        <td>
                                            <a class="btn btn-default" href="{{ route('admin.events.edit', ['id' => $item->id]) }}" data-toggle="tooltip" data-placement="top" title="Düzenle">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-default" href="{{ route('admin.events.delete', ['id' => $item->id]) }}" data-toggle="tooltip" data-placement="top" title="Sil">
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
                    {"type": "num", "targets": [0]},
                ]
            });
        });
    </script>
@endpush
