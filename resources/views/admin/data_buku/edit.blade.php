@extends('admin.templates.main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Buku</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <form action="{{ route('data_buku.update', $data->id) }}" method="POST" id="form-ubah-data">
                                @method('PUT')
                                @csrf
                                {{-- judul Buku --}}
                                <div class="form-group">
                                    <label for="nama_buku">Judul Buku</label>
                                    <input type="text" class="form-control @error('nama_buku') is-invalid @enderror"
                                        id="nama" name="nama_buku" value="{{ old('nama_buku', $data->nama_buku) }}">

                                    @error('nama_buku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                {{-- akhir judul buku --}}

                                {{-- jenis buku --}}
                                <div class="form-group">
                                    <label for="id">Categori Buku</label>
                                    <select class="form-control @error('id') is-invalid @enderror" id="id" name="id">
                                        @foreach ($data_category_buku as $row)
                                        <option @if ($data->categorybuku_id === $row->id) selected @endif
                                            value="{{ $row->id }} ">
                                            {{ $row->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                {{-- akhir jenis buku --}}

                                {{-- penuli --}}
                                <div class="form-group">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" class="form-control @error('penulis') is-invalid @enderror"
                                        id="penulis" name="penulis" value="{{ old('penulis', $data->penulis) }}">

                                    @error('penulis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                {{-- akhir penulis --}}

                                {{-- penerbit --}}
                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" class="form-control @error('penerbit') is-invalid @enderror"
                                        id="penerbit" name="penerbit" value="{{ old('penerbit', $data->penerbit) }}">

                                    @error('penerbit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                {{-- akhir penerbit --}}

                                {{-- jumlah buku --}}
                                <div class="form-group">
                                    <label for="jumlah_buku">Jumlah Buku</label>
                                    <input type="number" class="form-control @error('jumlah_buku') is-invalid @enderror"
                                        id="jumlah_buku" name="jumlah_buku"
                                        value="{{ old('jumlah_buku', $data->jumlah_buku) }}">

                                    @error('jumlah_buku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                {{-- akhir jumlah buku --}}

                                <button type="submit" class="btn btn-warning btn-sm" id="tombol-ubah-data"><i
                                        class="bi bi-pencil-square"></i> Ubah</button>

                                <a href="{{ route('data_buku.index') }}" class="btn btn-secondary btn-sm"
                                    id="tombol-kembali"><i class="fas fa-arrow-left"></i>
                                    Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection