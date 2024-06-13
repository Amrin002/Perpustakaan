<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\CategoryBuku;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBuku = Buku::latest()->get();

        return view('admin.data_buku.index', [
            'title' => 'Daftar Buku',
            'active' => 'buku',
            'databuku' => $dataBuku,
            'navbar' => 'Daftar Buku'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title              = 'Tambah Data Buku';
        $navbar             = 'Tambah Daftar Buku';
        $data_category_buku = CategoryBuku::all();
        return view('admin.data_buku.create', compact('title', 'data_category_buku', 'navbar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesan = [
            'required' => '*Wajib Diisi.',
            'unique' => 'Judul Buku Sudah ada.'
        ];
        // validasi
        $validated = $request->validate([
            'nama_buku' => 'required|unique:bukus',
            'penulis' => 'required',
            'penerbit' => 'required',
            'jumlah_buku' => 'required'
        ], $pesan);

        $validated['categorybuku_id'] = $request->id;

        // insert
        Buku::create($validated);

        // // redirect

        $notification = array(
            'message' => 'Data berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect('data_buku')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $title = 'Ubah Data Buku';
        $navbar             = 'Edit Daftar Buku';
        $data = $buku;
        $data_category_buku = CategoryBuku::all();
        return view('admin.data_buku.edit', compact('title', 'data', 'data_category_buku', 'navbar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = DB::table('bukus')->where('id', $id)->get();
        // validasi
        $pesan = [
        'required' => '*Wajib Diisi.',
        'unique' => 'Judul Buku Sudah Ada.'
        ];
        $rules = [
        'penulis' => 'required',
        'penerbit' => 'required',
        'jumlah_buku' => 'required'
        ];

        foreach ($data as $row) {
        if ($request->nama_buku != $row->nama_buku) {
        $rules['nama_buku'] = 'required|max:255|unique:bukus';
        }
        }
        $validated = $request->validate($rules, $pesan);
        $validated['categorybuku_id'] = $request->id;

        // update
        Buku::where('id', $id)->update($validated);
        // redirect
        $notification = array(
        'message' => 'Data berhasil diubah!',
        'alert-type' => 'success'
        );
        return redirect('data_buku')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete
        Buku::destroy($id);
        // redirect
        $notification = array(
            'message' => 'Data berhasil dihapus!',
            'alert-type' => 'info'
        );
        return redirect('data_buku')->with($notification);
    }
}
