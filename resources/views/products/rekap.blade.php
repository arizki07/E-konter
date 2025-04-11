@extends('layouts.app')
@section('content')
    @include('components.alert')
    <style>
        td.cuspad0 {
            padding-top: 3px;
            padding-bottom: 3px;
            padding-right: 13px;
            padding-left: 13px;
        }

        td.cuspad1 {
            text-transform: uppercase;
        }

        td.cuspad2 {
            /* padding-top: 0.5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        padding-bottom: 0.5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        padding-right: 0.5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        padding-left: 0.5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        margin-top: 5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        margin-bottom: 5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        margin-right: 5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        margin-left: 5px; */
        }

        .unselectable {
            -webkit-user-select: none;
            -webkit-touch-callout: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            color: #cc0000;
            font-weight: bolder;
        }

        /* Kolom Total - Hitam dengan teks putih */
        #datatable-rekap tfoot th {
            background-color: black;
            color: white;
        }

        /* Kolom Jumlah - Hijau dengan teks putih */
        #datatable-rekap tfoot th#total-jumlah {
            background-color: green;
            color: white;
        }

        /* Kolom Fee - Merah dengan teks putih */
        #datatable-rekap tfoot th#total-fee {
            background-color: red;
            color: white;
        }
    </style>
    <div class="page">

        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <h2 class="page-title">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-polygon"
                                    width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M19 8m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M5 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M15 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M6.5 9.5l3.5 -3" />
                                    <path d="M14 5.5l3 1.5" />
                                    <path d="M18.5 10l-2.5 7" />
                                    <path d="M13.5 17.5l-7 -5" />
                                </svg>
                                {{ $judul }}

                            </h2>
                            <div class="page-pretitle mt-2">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-brand-snowflake" width="44"
                                        height="41" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 21v-5.5l4.5 2.5" />
                                        <path d="M10 21v-5.5l-4.5 2.5" />
                                        <path d="M3.5 14.5l4.5 -2.5l-4.5 -2.5" />
                                        <path d="M20.5 9.5l-4.5 2.5l4.5 2.5" />
                                        <path d="M10 3v5.5l-4.5 -2.5" />
                                        <path d="M14 3v5.5l4.5 -2.5" />
                                        <path d="M12 11l1 1l-1 1l-1 -1z" />
                                    </svg> --}}
                                            {{ $judul }}
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>

                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="#" class="btn bg-red-lt border border-red d-none d-sm-inline-block"
                                    data-bs-toggle="modal" data-bs-target="#modal-add">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-device-ipad-horizontal-plus">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 20h-7a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v6.5" />
                                        <path d="M9 17h3.5" />
                                        <path d="M16 19h6" />
                                        <path d="M19 16v6" />
                                    </svg>
                                    Tambah Transaksi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        <div class="col-md-12">
                            <div class="card card-xl shadow rounded">
                                <div class="card-stamp card-stamp-lg">
                                    <div class="card-stamp-icon bg-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-devices-2">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 15h-6a1 1 0 0 1 -1 -1v-8a1 1 0 0 1 1 -1h6" />
                                            <path
                                                d="M13 4m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                                            <path d="M7 19l3 0" />
                                            <path d="M17 8l0 .01" />
                                            <path d="M17 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path d="M9 15l0 4" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <form action="#" id="form-filter-lamaran" method="get" autocomplete="off"
                                        novalidate="" class="">
                                        <table class="mt-3 ms-3 mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal Awal</th>
                                                    <th>Tanggal Akhir</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="date" class="form-control tglaw"
                                                            value="{{ date('Y-m-01') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control tglak"
                                                            value="{{ date('Y-m-d') }}">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" onclick="syn();">
                                                            <i
                                                                class="fa-solid fa-magnifying-glass"style="margin-right:5px"></i>
                                                            Perbarui
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table style="width:100%; font-family: 'Trebuchet MS', Helvetica, sans-serif;"
                                        class="display table table-vcenter card-table table-sm table-bordered table-hover text-nowrap"
                                        id="datatable-rekap">
                                        <tfoot>
                                            <tr>
                                                <th colspan="5" class="text-end">Total:</th>
                                                <th id="total-jumlah"></th> <!-- Total Jumlah -->
                                                <th id="total-fee"></th> <!-- Total Fee -->
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal add --}}
            <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <form action="{{ route('store.rekap') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Transaksi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal"
                                        placeholder="Your report name" value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Transaksi</label>
                                    <select class="form-select" name="jenis_transaksi">
                                        <option selected disabled>--Pilih Jenis Transaksi--</option>
                                        <option value="transfer">Transfer</option>
                                        <option value="tarik tunai">Tarik Tunai</option>
                                        <option value="top up">Top Up</option>
                                        <option value="pulsa">Pulsa</option>
                                        <option value="kuota">Kuota</option>
                                        <option value="aksesoris">Aksesoris</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" placeholder="Masukkan keterangan transaksi"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah</label>
                                            <input type="text" class="form-control" placeholder="Rp.*****"
                                                name="jumlah">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Biaya Admin</label>
                                            <input type="text" class="form-control" placeholder="Rp.*****"
                                                name="fee">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Simpan
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- end modal add --}}

            @foreach ($trans as $item)
                <!-- Modal Edit -->
                <div class="modal fade" id="modal-edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <form action="{{ route('update.rekap', $item->id) }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Transaksi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal"
                                            value="{{ $item->tanggal }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Transaksi</label>
                                        <select class="form-select" name="jenis_transaksi">
                                            <option disabled>--Pilih Jenis Transaksi--</option>
                                            @foreach (['transfer', 'tarik tunai', 'top up', 'pulsa', 'kuota', 'aksesoris'] as $jenis)
                                                <option value="{{ $jenis }}"
                                                    {{ $item->jenis_transaksi == $jenis ? 'selected' : '' }}>
                                                    {{ ucfirst($jenis) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Keterangan</label>
                                        <textarea class="form-control" name="keterangan">{{ $item->keterangan }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah</label>
                                                <input type="text" class="form-control" name="jumlah"
                                                    value="{{ $item->jumlah }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Biaya Admin</label>
                                                <input type="text" class="form-control" name="fee"
                                                    value="{{ $item->fee }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-link link-secondary"
                                        data-bs-dismiss="modal">Cancel</a>
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        <i class="fa-solid fa-check"></i> Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function newexportaction(e, dt, button, config) {
            var self = this;
            var oldStart = dt.settings()[0]._iDisplayStart;
            dt.one('preXhr', function(e, s, data) {
                // Just this once, load all data from the server...
                data.start = 0;
                data.length = 2147483647;
                dt.one('preDraw', function(e, settings) {
                    // Call the original action function
                    if (button[0].className.indexOf('buttons-copy') >= 0) {
                        $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                        $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                        $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                        $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-print') >= 0) {
                        $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                    }
                    dt.one('preXhr', function(e, s, data) {
                        // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                        // Set the property to what it was before exporting.
                        settings._iDisplayStart = oldStart;
                        data.start = oldStart;
                    });
                    // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                    setTimeout(dt.ajax.reload, 0);
                    // Prevent rendering of the full data to the DOM
                    return false;
                });
            });
            // Requery the server with the new one-time export settings
            dt.ajax.reload();
        }

        var tableRekap;

        $(function() {
            /*------------------------------------------
            --------------------------------------------
            Render DataTable
            --------------------------------------------
            --------------------------------------------*/
            tableRekap = $('#datatable-rekap').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "scrollX": true,
                "scrollCollapse": false,
                "pagingType": 'full_numbers',
                "lengthMenu": [
                    [10, 35, 40, 50, -1],
                    ['10', '35', '40', '50', 'Tampilkan Semua']
                ],
                "dom": "<'card-header h3' B>" +
                    "<'card-body border-bottom py-3' <'row'<'col-sm-6'l><'col-sm-6'f>> >" +
                    "<'table-responsive' <'col-sm-12'tr> >" +
                    "<'card-footer' <'row'<'col-sm-8'i><'col-sm-4'p> >>",
                buttons: [{
                        extend: 'excelHtml5',
                        autoFilter: true,
                        className: 'btn btn-success',
                        text: '<i class="fa fa-file-excel text-white" style="margin-right:5px"></i> Download Excel',
                        action: newexportaction,
                        exportOptions: {
                            orthogonal: "myExport"
                        }
                    },
                    {
                        className: 'btn btn-dark',
                        text: '<i class="fa-solid fa-arrows-rotate"></i> Refresh',
                        action: function(e, dt, node, config) {
                            dt.ajax.reload();
                        }
                    },
                ],
                "language": {
                    "lengthMenu": "Menampilkan Karyawan _MENU_",
                    "zeroRecords": "Data Tidak Ditemukan",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ total data",
                    "infoEmpty": "Data Tidak Ditemukan",
                    "infoFiltered": "(Difilter dari _MAX_ total records)",
                    "processing": '<div class="container container-slim py-4"><div class="text-center"><div class="mb-3"></div><div class="text-secondary mb-3">Loading Data...</div><div class="progress progress-sm"><div class="progress-bar progress-bar-indeterminate"></div></div></div></div>',
                    "search": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>',
                    "paginate": {
                        "first": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 6v12"></path><path d="M18 6l-6 6l6 6"></path></svg>',
                        "last": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 6l6 6l-6 6"></path><path d="M17 5v13"></path></svg>',
                        "next": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>',
                        "previous": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg>',
                    },
                },
                "ajax": {
                    "url": "{{ route('getRekap.index') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.dari = $('.tglaw').val();
                        data.sampai = $('.tglak').val();
                        // console.log("mencari data dari " + data.dari + " sampai " + data.sampai);
                    }
                },
                columns: [{
                        title: 'no',
                        data: null,
                        name: null,
                        className: 'cuspad0 text-center',
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    }, {
                        title: 'Opsi',
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'tanggal',
                        data: 'tanggal',
                        name: 'tanggal',
                        className: 'cuspad0 text-center cursor-pointer'
                    },
                    {
                        title: 'jenis transaksi',
                        data: 'jenis_transaksi',
                        name: 'jenis_transaksi',
                        className: 'cuspad0 text-center cursor-pointer'
                    },
                    {
                        title: 'keterangan',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: 'cuspad0 text-center cursor-pointer'
                    },
                    {
                        title: 'jumlah',
                        data: 'jumlah',
                        name: 'jumlah',
                        className: 'cuspad0 text-center cursor-pointer'
                    },
                    {
                        title: 'biaya admin',
                        data: 'fee',
                        name: 'fee',
                        className: 'cuspad0 text-center cursor-pointer'
                    },
                ],

                // ⬇️ FOOTER CALLBACK DI SINI
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api();

                    // Fungsi untuk parse angka yang benar (menghapus simbol dan format)
                    var parseNumber = function(i) {
                        return typeof i === 'string' ?
                            parseInt(i.replace(/[\Rp. ,]/g, '')) || 0 :
                            i;
                    };

                    // Total Jumlah pada kolom 5
                    var totalJumlah = api.column(5, {
                            page: 'current'
                        }).data()
                        .reduce(function(a, b) {
                            return parseNumber(a) + parseNumber(b);
                        }, 0);

                    // Total Fee pada kolom 6
                    var totalFee = api.column(6, {
                            page: 'current'
                        }).data()
                        .reduce(function(a, b) {
                            return parseNumber(a) + parseNumber(b);
                        }, 0);

                    // Debugging dengan console.log
                    console.log('Total Jumlah: ', totalJumlah);
                    console.log('Total Fee: ', totalFee);

                    // Menampilkan hasil total pada footer
                    $('#total-jumlah').html('<span class="text-success fw-bold">Rp. ' + totalJumlah
                        .toLocaleString('id-ID') + '</span>');
                    $('#total-fee').html('<span class="text-danger fw-bold">Rp. ' + totalFee
                        .toLocaleString('id-ID') + '</span>');
                }




            });

            $('#datatable-rekap').on('click', '.btn-danger', function(e) {
                e.preventDefault();
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Yakin hapus data ini?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/rekap/delete/' + id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire(
                                        'Berhasil!',
                                        response.message,
                                        'success'
                                    );
                                    tableRekap.ajax.reload();
                                } else {
                                    Swal.fire(
                                        'Gagal!',
                                        'Tidak bisa menghapus data.',
                                        'error'
                                    );
                                }
                            },
                            error: function() {
                                Swal.fire(
                                    'Error!',
                                    'Terjadi kesalahan pada server.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

        });

        function syn() {
            tableRekap.ajax.reload();
        }
    </script>
@endsection
