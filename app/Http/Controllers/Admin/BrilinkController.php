<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrilinkModel;
use Illuminate\Http\Request;

class BrilinkController extends Controller
{
    public function index()
    {
        return view('products.02_transaksi.brilink', [
            'judul' => 'Halaman Transaksi Brilink'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_rek' => 'required',
            'harga' => 'required|numeric|min:0|max:999999999999.99',
            'admin' => 'required|numeric|min:0|max:999999999999.99',
            'bank' => 'required',
            'status' => 'required',
        ]);

        $brilink = new BrilinkModel();
        $brilink->no_rek = $request->input('no_rek');
        $brilink->harga = $request->input('harga');
        $brilink->admin = $request->input('admin');
        $brilink->bank = $request->input('bank');
        $brilink->status = $request->input('status');

        if ($brilink->save()) {
            return redirect('/brilink')->with('success', 'Data transaksi brilink berhasil');
        } else {
            return redirect()->back()->with('error', 'Data transaksi brilink gagal, silahkan coba kembali');
        }
    }

    public function printBrilink($id)
    {
        $brilink = BrilinkModel::findOrFail($id); // Misalnya menggunakan Eloquent untuk mengambil data
        return view('nama_view', compact('brilink',));
    }
}
