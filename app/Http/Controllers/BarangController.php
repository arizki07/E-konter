<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\KategoriModel;

class BarangController extends Controller
{
    public function index()
    {
        $barang = BarangModel::all();
        $kategori = KategoriModel::all();
        return view('barang.index', [
            'judul' => 'Halaman Barang',
            'barang' => $barang,
            'kategori' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'brand' => 'required',
            'type_barang' => 'required',
            'model_barang' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'keterangan' => 'required'
        ]);

        $data = [
            'id_kategori' => $request->input('id_kategori'),
            'brand' => $request->input('brand'),
            'type_barang' => $request->input('type_barang'),
            'model_barang' => $request->input('model_barang'),
            'harga' => $request->input('harga'),
            'stock' => $request->input('stock'),
            'keterangan' => $request->input('keterangan'),
            'nama_barang' => $request->input('nama_barang')
        ];

        $barang = new BarangModel();

        if ($barang->fill($data)->save()) {
            return redirect('/kategori')->with('success', 'Data Barang berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Data Barang gagal ditambahkan, silahkan coba kembali');
        }
    }


    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama_kategori' => 'required|string|max:255'
    //     ]);

    //     // $harga = KartuModel::find($id);
    //     $kategori = KategoriModel::find($id);
    //     $kategori->nama_kategori = $request->nama_kategori;
    //     $kategori->save();

    //     if ($kategori->save()) {
    //         return redirect('/kategori')->with('success', 'Data Kategori kartu berhasil di update');
    //     } else {
    //         return redirect()->back()->with('error', 'Data Kategori kartu gagal di update, silahkan coba kembali');
    //     }
    // }

    // public function destroy($id)
    // {
    //     // $pelanggan = PelangganModel::find($id);
    //     $kategori = KategoriModel::find($id);
    //     if ($kategori->delete()) {
    //         return redirect('/kategori')->with('success', 'Data Kategori berhasil di hapus');
    //     } else {
    //         return redirect()->back()->with('error', 'Data Kategori gagal dihapus, silahkan coba kembali');
    //     }
    // }
}
