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
                        <div class="col-md-12">
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- <a href="{{ url('/laporan_buku') }}" class="btn btn-primary btn-small mb-2">Laporan
                            Buku</a> --}}
                                <a href="{{ route('data_buku.create') }}" class="btn btn-primary btn-sm mb-3"><i
                                        class="fas fa-plus-circle"></i> Data buku</a>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Judul Buku</th>
                                            <th scope="col">Categori Buku</th>
                                            <th scope="col">Penulis</th>
                                            <th scope="col">Penerbit</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col" class="text-center">
                                                &nbsp;&nbsp;&nbsp;&nbsp;Aksi&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($databuku as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->nama_buku }}</td>
                                                <td>{{ $row->categorybuku ? $row->categorybuku->nama : 'Kategori tidak ditemukan' }}
                                                </td>
                                                <td>{{ $row->penulis }}</td>
                                                <td class="text_center">{{ $row->penerbit }}</td>
                                                <td>{{ $row->jumlah_buku }}</td>
                                                <td class="text-center">
                                                    {{-- <a class="btn btn-info btn-sm" href="{{ url('buku.show', $row->id) }}"><i class="bi bi-eye"></i></a> --}}
                                                    <a href="{{ route('data_buku.edit', $row->id) }}"
                                                        class="btn btn-warning btn-sm" id="tombol-ubah"><i
                                                            class="fas fa-pencil"></i></a>

                                                    <form action="{{ route('data_buku.destroy', $row->id) }}" method="POST"
                                                        class="d-inline" id="form-hapus-data">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm" id="tombol-hapus-data"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
