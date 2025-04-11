<?php

namespace App\Http\Controllers;

use App\Models\RekapModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapController extends Controller
{
    public function search(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $trans = DB::table('rekap')
            ->when($tanggal_awal, function ($query, $tanggal_awal) {
                return $query->where('tanggal', '>=', $tanggal_awal);
            })
            ->when($tanggal_akhir, function ($query, $tanggal_akhir) {
                return $query->where('tanggal', '<=', $tanggal_akhir);
            })
            ->get();

        return response()->json($trans);
    }


    public function index()
    {
        $trans = RekapModel::all();
        return view('products.rekap', [
            'judul' => 'Halaman transaksi dycell',
            'trans' => $trans
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'jenis_transaksi' => 'required',
            'jumlah' => 'required',
            'fee' => 'required',
            'keterangan' => 'required',
        ]);

        try {
            DB::table('rekap')->insert([
                'tanggal' => $request->tanggal,
                'jenis_transaksi' => $request->jenis_transaksi,
                'jumlah' => $request->jumlah,
                'fee' => $request->fee,
                'keterangan' => $request->keterangan,
                'created_at' => now(),
            ]);
            return redirect()->back()->with('success', 'Data transaksi berhasil di tambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan : ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'jenis_transaksi' => 'required',
            'jumlah' => 'required',
            'fee' => 'required',
            'keterangan' => 'required',
        ]);

        try {
            DB::table('rekap')->where('id', $id)->update([
                'tanggal' => $request->tanggal,
                'jenis_transaksi' => $request->jenis_transaksi,
                'jumlah' => $request->jumlah,
                'fee' => $request->fee,
                'keterangan' => $request->keterangan,
                'created_at' => now(),
            ]);
            return redirect()->back()->with('success', 'Data transaksi berhasil di update');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan : ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $rekap = RekapModel::find($id);

        if (!$rekap) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan.'
            ], 404);
        }

        $rekap->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus.'
        ]);
    }
}
