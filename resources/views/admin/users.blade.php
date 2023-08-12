@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kullanıcılar</h1>
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
                                    <th>Ad Soyad</th>
                                    <th>E-posta</th>
                                    <th>Kayıt Tarihi</th>
                                    <th>Yetkiler</th>
                                    <th>Aksiyon</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <span>{{ $item->email }}</span>
                                            @if ($item->email_verified_at)
                                                <i class="fa fa-check-circle text-success" title="Doğrulandı"></i>
                                            @endif
                                        </td>
                                        <td data-order="{{ $item->created_at->timestamp }}">{{ $item->created_at->translatedFormat('j F Y, H:i') }}</td>
                                        <td>{{ $item->hasAnyRole($roles) ? implode(', ', array_map('ucfirst', $item->roles->pluck('name')->toArray())) : '-' }}</td>
                                        <td>
                                            <a class="btn btn-default" href="{{ route('admin.users.add-role', ['id' => $item->id, 'role' => 'moderator']) }}" title="{{ !$item->hasRole('moderator') ? "Moderatör yap" : "Moderatörlüğü geri al" }}">
                                                <i class="fa fa-lock"></i>
                                            </a>
                                            <a class="btn btn-default" href="{{ route('admin.users.add-role', ['id' => $item->id, 'role' => 'banned']) }}" title="{{ !$item->hasRole('banned') ? "Banla" : "Ban kaldır" }}">
                                                <i class="fa fa-ban"></i>
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
