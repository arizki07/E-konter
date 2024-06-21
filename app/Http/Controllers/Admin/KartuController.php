<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KartuModel;
use Illuminate\Http\Request;

class KartuController extends Controller
{
    public function index()
    {
        $kartu = KartuModel::all();
        return view('products.01_master.kartu', [
            'judul' => 'Halaman Harga Kartu',
            'kartu' => $kartu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kartu_perdana' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0|max:999999999999.99',
        ]);

        $harga = new KartuModel();
        $harga->kartu_perdana = $request->kartu_perdana;
        $harga->harga = $request->harga;
        $harga->save();

        if ($harga->save()) {
            return redirect('/harga')->with('success', 'Data harga kartu berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Data harga kartu gagal di tambahkan, silahkan coba kembali');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kartu_perdana' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0|max:999999999999.99',
        ]);

        $harga = KartuModel::find($id);
        $harga->kartu_perdana = $request->kartu_perdana;
        $harga->harga = $request->harga;
        $harga->save();

        if ($harga->save()) {
            return redirect('/harga')->with('success', 'Data harga kartu berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Data harga kartu gagal di update, silahkan coba kembali');
        }
    }

    public function destroy($id)
    {
        $harga = KartuModel::find($id);

        if ($harga->delete()) {
            return redirect('/harga')->with('success', 'Data harga kartu berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Data harga kartu gagal di hapus, silahkan coba kembali');
        }
    }
}
