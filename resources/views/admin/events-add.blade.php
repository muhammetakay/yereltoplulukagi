@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Etkinlik Ekle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Yeni Etkinlik Ekle
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="{{ route('admin.events.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="event_name">Etkinlik Adı</label>
                                    <input type="text" class="form-control" name="event_name" value="{{ old('event_name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="event_date">Etkinlik Tarihi</label>
                                    <input type="datetime-local" class="form-control" name="event_date" value="{{ old('event_date') }}">
                                </div>
                                <div class="form-group">
                                    <label for="location">Konum</label>
                                    <input type="text" class="form-control" name="location" value="{{ old('location') }}">
                                </div>
                                <div class="form-group">
                                    <label for="organizer">Organizatör</label>
                                    <input type="text" class="form-control" name="organizer" value="{{ old('organizer') }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Açıklama</label>
                                    <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="event_image">Etkinlik Resmi</label>
                                    <input type="file" accept="image/*" name="event_image">
                                </div>
                                <div class="form-group">
                                    <p class="text-success">{{ session('message') }}</p>
                                    <p class="text-danger">{{ @$errors->first() }}</p>
                                </div>
                                <button type="submit" class="btn btn-primary">Gönder</button>
                            </form>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
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
                }
            });
        });
    </script>
@endpush
