<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = KategoriModel::all();
        return view('product.02_barang.kategori', [
            'judul' => 'Halaman Kategori',
            'kategori' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori = new KategoriModel();
        $kategori->nama_kategori = $request->input('nama_kategori');

        if ($kategori->save()) {
            return redirect('/kategori')->with('success', 'Data Kategori berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Data Kategori gagal di tambahkan, silahkan coba kembali');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        // $harga = KartuModel::find($id);
        $kategori = KategoriModel::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        if ($kategori->save()) {
            return redirect('/kategori')->with('success', 'Data Kategori kartu berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Data Kategori kartu gagal di update, silahkan coba kembali');
        }
    }

    public function destroy($id)
    {
        // $pelanggan = PelangganModel::find($id);
        $kategori = KategoriModel::find($id);
        if ($kategori->delete()) {
            return redirect('/kategori')->with('success', 'Data Kategori berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Data Kategori gagal dihapus, silahkan coba kembali');
        }
    }
}
