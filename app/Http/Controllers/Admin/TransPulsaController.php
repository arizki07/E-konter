<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KartuModel;
use App\Models\PelangganModel;
use App\Models\TransPulsaModel;
use Illuminate\Http\Request;

class TransPulsaController extends Controller
{
    public function index()
    {
        $trans = TransPulsaModel::all();
        $pelanggan = PelangganModel::all();
        $harga = KartuModel::all();
        return view('products.02_transaksi.transaksi_pulsa', [
            'judul' => 'Halaman Transaksi Pulsa',
            'trans' => $trans,
            'pelanggan' => $pelanggan,
            'harga' => $harga,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'status' => 'required',
        ]);

        $trans = new TransPulsaModel();
        $trans->id_pelanggan = $request->input('id_pelanggan');
        $trans->id_harga = $request->input('id_harga');
        $trans->tanggal = $request->input('tanggal');
        $trans->status = $request->input('status');

        if ($trans->save()) {
            return redirect('/transPulsa')->with('success', 'Data transaksi pulsa berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Data transaksi pulsa gagal di tambahkan, silahkan coba kembali');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'status' => 'required',
        ]);

        $trans = TransPulsaModel::find($id);
        $trans->id_pelanggan = $request->input('id_pelanggan');
        $trans->id_harga = $request->input('id_harga');
        $trans->tanggal = $request->input('tanggal');
        $trans->status = $request->input('status');

        if ($trans->save()) {
            return redirect('/transPulsa')->with('success', 'Data transaksi pulsa berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Data transaksi pulsa gagal di update, silahkan coba kembali');
        }
    }

    public function destroy($id)
    {
        $trans = TransPulsaModel::find($id);
        if ($trans->delete()) {
            return redirect('/transPulsa')->with('success', 'Data transaksi pulsa berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Data transaksi pulsa gagal dihapus, silahkan coba kembali');
        }
    }

    public function print($id)
    {
        $trans = TransPulsaModel::findOrFail($id);
        $transaksi = TransPulsaModel::all();
        $harga = KartuModel::all();

        return view('cetak.print_pulsa', compact('trans', 'transaksi', 'harga'));
    }
}
