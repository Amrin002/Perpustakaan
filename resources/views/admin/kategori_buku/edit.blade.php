@extends('admin.templates.main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Buku</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('kategori_buku.update', $data->slug) }}" method="POST"
                            enctype="multipart/form-data" id="form-tombol-ubah">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="{{ $data->foto }}" name="fotoLama">
                            <input type="hidden" value="{{ $data->slug }}" name="slug">
                            <div class="form-group">
                                <label for="nama">Nama Kategori Buku</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" value="{{ $data->nama }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="body">Body</label>
                                <input id="x" value="{{ $data->body }}" type="hidden" name="body"
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
                                <img src="{{ asset('storage/' . $data->foto) }}" alt="" width="100px" class="mb-2">
                                <input type="file" class="form-control-file @error('foto') is-invalid @enderror"
                                    id="foto" name="foto">
                                @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-warning btn-sm" id="tombol-ubah-data"><i
                                    class="bi bi-pencil-square"></i>
                                Ubah</button>
                            <a href="{{ route('kategori_buku.index') }}" class="btn btn-secondary btn-sm"
                                id="tombol-kembali"><i class="fas fa-arrow-left"></i> Kembali</a>

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