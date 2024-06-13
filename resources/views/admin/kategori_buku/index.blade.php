@extends('admin.templates.main')
@section('content')
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
                    <div class="row">

                        <div class="col-md-2 mb-3">
                            {{-- button tambah --}}
                            <!-- Button trigger modal -->
                            <a href="{{ route('kategori_buku.create') }}" class="btn btn-primary btn-sm"
                                type="button"><i class="fas fa-plus-circle"></i> Categori
                                Buku</a>
                        </div>
                    </div>
                    <div class="row">
                        {{-- table --}}
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover" id="example2">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kategori Buku</th>
                                        <th scope="col" class="col-7">Body</th>
                                        <th scope="col" class="">Foto</th>
                                        <th scope="col" class="text-center col-1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category_buku as $row)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ ucwords($row->nama) }}</td>
                                        <td>{{ ucwords($row->body) }}</td>
                                        <td><img src="{{ asset('storage/' . $row->foto) }}" alt="{{ $row->foto }}"
                                                width="100px" height="100px"></td>
                                        <td class="text-center">

                                            <a href="{{ route('kategori_buku.edit', $row->slug) }}"
                                                class="btn btn-warning btn-sm" id="tombol-ubah"><i
                                                    class="fas fa-pencil"></i></a>

                                            {{-- button hapus --}}

                                            <form action="{{ route('kategori_buku.destroy', $row->id) }}" method="POST"
                                                class="d-inline" id="form-hapus-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" id="tombol-hapus-data"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                            {{-- akhir button hapus --}}
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- end table --}}
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection