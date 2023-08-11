@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Haber Ekle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Yeni Haber Ekle
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="{{ route('admin.news.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Başlık</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="content">Haber İçeriği</label>
                                    <textarea class="form-control" name="content" id="content" rows="5">{{ old('content') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category">Kategori</label>
                                    <select name="category" id="category" class="form-control">
                                        @foreach (getAllCategories() as $item)
                                            <option value="{{ $item->id }}" @selected(old('category') == $item->id)>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Haber Resmi</label>
                                    <input type="file" accept="image/*" name="image">
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
