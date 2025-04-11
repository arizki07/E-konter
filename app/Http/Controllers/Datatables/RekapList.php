<?php

namespace App\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RekapList extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->dari) {
                $dari = $request->dari;
            } else {
                $dari = date('Y-m-01');
            }

            if ($request->sampai) {
                $sampai = $request->sampai;
            } else {
                $sampai = date('Y-m-d');
            }

            $data = DB::table('rekap')
                ->where('tanggal', '>=', $dari)
                ->where('tanggal', '<=', $sampai)
                ->orderBy('id', 'desc')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('jumlah', function ($row) {
                    return 'Rp. ' . number_format($row->jumlah, 0, ',', '.');
                })
                ->editColumn('fee', function ($row) {
                    return 'Rp. ' . number_format($row->fee, 0, ',', '.');
                })

                ->addColumn('action', function ($row) {
                    $btn = ' 
                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-edit' . $row->id . '" 
                class="btn btn-sm btn-success btn-icon" title="Lihat Detail Cuti Karyawan"  data-id="' . $row->id . '">
                <i class="fa-solid fa-edit"></i>
                </a>
                <a href="#" class="btn btn-sm btn-danger btn-icon" data-id="' . $row->id . '">
                <i class="fa-solid fa-trash"></i>
                </a>
                ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('products.rekap');
    }
}
