@extends('layouts.app')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        Selamat Datang {{ Auth::user()->name }} di konter DYCELL Ni boss!!
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <!-- Card for Total Jumlah -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body text-center">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="subheader text-uppercase text-muted">Total Jumlah Transaksi</div>
                            </div>
                            <div class="h1 mb-3 text-success">
                                <strong>Rp. {{ number_format($totalJumlah, 0, ',', '.') }}</strong>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success" style="width: 75%" role="progressbar"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="Progress">
                                    <span class="visually-hidden">75% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card for Total Fee -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body text-center">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="subheader text-uppercase text-muted">Total Biaya Admin</div>
                            </div>
                            <div class="h1 mb-3 text-danger">
                                <strong>Rp. {{ number_format($totalFee, 0, ',', '.') }}</strong>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger" style="width: 60%" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" aria-label="Progress">
                                    <span class="visually-hidden">60% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
