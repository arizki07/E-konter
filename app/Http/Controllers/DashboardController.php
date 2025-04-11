<?php

namespace App\Http\Controllers;

use App\Models\RekapModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // Mengambil total jumlah dan fee
            $totalJumlah = RekapModel::sum('jumlah');
            $totalFee = RekapModel::sum('fee');

            return view('pages.dashboard', [
                'act' => 'Dashboard',
                'totalJumlah' => $totalJumlah,
                'totalFee' => $totalFee,
            ]);
        }
    }
}
