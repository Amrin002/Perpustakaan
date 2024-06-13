<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Categorybuku;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;;

class CategorybukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Jenis Buku';
        $category_buku = Categorybuku::latest()->get();

        return view('admin.kategori_buku.index', compact('title', 'category_buku'), [
            'active' => 'kategori',
            'navbar' => 'Daftar Buku'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Categori Buku';
        $navbar = 'Tambah Kategori Buku';
        return view('admin.kategori_buku.create', compact('title', 'navbar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesan = [
            'required' => '*Wajib Diisi.',
            'unique' => 'Nama Kategori Sudah Ada.'
        ];
        $request->validate([
            'nama' => 'required|unique:categorybukus',
            'body' => 'required',
            'foto' => 'required|image|file|max:1024'
        ], $pesan);

        $slug = Str::slug($request->nama);
        $limit = 100;
        $excerpt = Str::limit(strip_tags($request->body), $limit, '...');
        DB::table('categorybukus')->insert([
            'nama' => $request->nama,
            'slug' => $slug,
            'body' => strip_tags($request->body),
            'excerpt' => $excerpt,
            'foto' => $request->file('foto')->store('category-foto'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Data Berhasil Ditambahkan!.',
            'alert-type' => 'success'
        );
        return redirect('kategori_buku')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorybuku $categorybuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $title = 'Ubah Data Jenis Buku';
        $data = DB::table('categorybukus')->where('slug', $slug)->first();
        return view('admin.kategori_buku.edit', compact('title', 'data'),[
            'navbar' => 'Edit Kategori Buku'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $data = DB::table('categorybukus')->where('slug', $slug)->get();
        $pesan = [
        'required' => '*Wajib Diisi.',
        'unique' => 'Nama Kategori Sudah Ada.'
        ];
        $rules = [
        'body' => 'required',
        'foto' => 'image|file|max:1024'
        ];

        foreach ($data as $row) {
        if ($request->nama != $row->nama) {
        $rules['nama'] = 'required|max:255|unique:categorybukus';
        }
        }

        $validate = $request->validate($rules, $pesan);

        $validate['body'] = strip_tags($request->body);
        $limit = 100;
        $validate['excerpt'] = Str::limit(strip_tags($request->body), $limit, '...');
        if ($request->file('foto')) {
        // cek gambar lama, kalau ada hapus tapi kalau tidak ada maka sebaliknya
        if ($request->fotoLama) {
        Storage::delete($request->fotoLama);
        }

        $validate['foto'] = $request->file('foto')->store('category-foto');
        }

        $validate['slug'] = Str::slug($request->nama);


        DB::table('categorybukus')->where('slug', $slug)->update($validate);

        $notification = array(
        'message' => 'Data Berhasil Diubah!.',
        'alert-type' => 'success'
        );
        return redirect('kategori_buku')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorybuku $CategoryBuku)
    {
        if ($CategoryBuku->foto) {
        Storage::delete($CategoryBuku->foto);
        }

        Categorybuku::destroy($CategoryBuku->id);

        $notification = array(
        'message' => 'Data Berhasil Dihapus!.',
        'alert-type' => 'info'
        );
        return redirect('kategori_buku')->with($notification);
    }
}
