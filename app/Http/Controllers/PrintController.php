<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\PrintModel;

class PrintController extends Controller
{
    public function index()
    {
        $print = PrintModel::all();
        return view('print.index', [
            'judul' => 'Halaman Print',
            'print' => $print
        ]);
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_pelanggan' => 'required',
    //         'alamat' => 'required',
    //         'noHp' => 'required',
    //     ]);

    //     $pelanggan = new PelangganModel();
    //     $pelanggan->nama_pelanggan = $request->input('nama_pelanggan');
    //     $pelanggan->alamat = $request->input('alamat');
    //     $pelanggan->noHp = $request->input('noHp');

    //     if ($pelanggan->save()) {
    //         return redirect('/pelanggan')->with('success', 'Data pelanggan berhasil di tambahkan');
    //     } else {
    //         return redirect()->back()->with('error', 'Data Pelanggan gagal di tambahkan, silahkan coba kembali');
    //     }
    // }
}
