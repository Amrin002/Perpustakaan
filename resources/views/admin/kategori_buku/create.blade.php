@extends('admin.templates.main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Categori Buku</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('kategori_buku.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Categori Buku</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="body">Body</label>
                                <input id="x" value="{{ old('body') }}" type="hidden" name="body"
                                    class="@error('body') is-invalid @enderror">
                                <trix-editor input="x"></trix-editor>
                                @error('body')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-5">
                                <label for="foto" class="d-block">Foto</label>
                                <input type="file" class="form-control-file @error('foto') is-invalid @enderror"
                                    id="foto" name="foto">
                                @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i>
                                Tambah</button>
                            <a href="{{ route('kategori_buku.index') }}" class="btn btn-secondary btn-sm"
                                onclick="return confirm('Yakin mau kembali?')"><i class="fas fa-arrow-left"></i>
                                Kembali</a>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection