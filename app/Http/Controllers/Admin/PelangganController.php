<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PelangganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = PelangganModel::all();
        return view('products.01_master.pelanggan', [
            'judul' => 'Halaman Pelanggan',
            'pelanggan' => $pelanggan
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'noHp' => 'required',
        ]);

        $pelanggan = new PelangganModel();
        $pelanggan->nama_pelanggan = $request->input('nama_pelanggan');
        $pelanggan->alamat = $request->input('alamat');
        $pelanggan->noHp = $request->input('noHp');

        if ($pelanggan->save()) {
            return redirect('/pelanggan')->with('success', 'Data pelanggan berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Data Pelanggan gagal di tambahkan, silahkan coba kembali');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'noHp' => 'required',
        ]);

        $pelanggan = PelangganModel::find($id);
        $pelanggan->nama_pelanggan = $request->input('nama_pelanggan');
        $pelanggan->alamat = $request->input('alamat');
        $pelanggan->noHp = $request->input('noHp');

        if ($pelanggan->save()) {
            return redirect('/pelanggan')->with('success', 'Data pelanggan berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Data Pelanggan gagal di update, silahkan coba kembali');
        }
    }

    public function destroy($id)
    {
        $pelanggan = PelangganModel::find($id);
        if ($pelanggan->delete()) {
            return redirect('/pelanggan')->with('success', 'Data pelanggan berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Data pelanggan gagal dihapus, silahkan coba kembali');
        }
    }
}
