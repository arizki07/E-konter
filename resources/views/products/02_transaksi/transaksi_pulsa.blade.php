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
                                            {{ $judul }}
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <button class="btn btn-warning" data-bs-target="#modal-add" data-bs-toggle="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-device-mobile-message">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M11 3h10v8h-3l-4 2v-2h-3z" />
                                        <path d="M15 16v4a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1h2" />
                                        <path d="M10 18v.01" />
                                    </svg>
                                    Tambah Transaksi Pulsa
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card card-xl border-warning shadow rounded">
                                <div class="card-stamp card-stamp-lg">
                                    <div class="card-stamp-icon bg-warning">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div style="overflow-x: auto;">
                                        <table style="width:100%; font-family: 'Trebuchet MS', Helvetica, sans-serif;"
                                            class="display table table-vcenter card-table table-sm table-bordered table-hover datatable-users"
                                            id="example">
                                            <thead>
                                                <tr class="text-center">
                                                    <th class="text-center">OPSI</th>
                                                    <th class="text-center">NAMA PELANGGAN</th>
                                                    <th class="text-center">ALAMAT</th>
                                                    <th class="text-center">NO TELEPHONE</th>
                                                    <th class="text-center">KARTU PERDANA</th>
                                                    <th class="text-center">HARGA</th>
                                                    <th class="text-center">TANGGAL</th>
                                                    <th class="text-center">STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trans as $item)
                                                    <tr class="text-center">
                                                        <td>
                                                            <a href="{{ route('print.trans', $item->id) }}" target="_blank"
                                                                class="btn btn-outline-warning btn-sm btn-icon">
                                                                <i class="fa-solid fa-fw fa-print"></i>
                                                            </a>
                                                            <a href="javascript:void(0)"
                                                                data-bs-target="#modal-edit{{ $item->id }}"
                                                                data-bs-toggle="modal"
                                                                class="btn btn-outline-info btn-sm btn-icon edit-btn"><i
                                                                    class="fa-solid fa-fw fa-edit"></i>
                                                            </a>
                                                            <form id="deleteForm{{ $item->id }}"
                                                                action="/destroy/trans/{{ $item->id }}" method="POST"
                                                                class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button"
                                                                    class="btn btn-outline-danger btn-sm btn-icon"
                                                                    onclick="confirmDelete(event, {{ $item->id }})">
                                                                    <i class="fa-solid fa-fw fa-trash-can"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>{{ $item->pelanggan->nama_pelanggan }}</td>
                                                        <td>{{ $item->pelanggan->alamat }}</td>
                                                        <td>{{ $item->pelanggan->noHp }}</td>
                                                        <td>{{ $item->harga->kartu_perdana }}</td>
                                                        <td>Rp. {{ number_format($item->harga->harga, 0, ',', '.') }}
                                                        </td>
                                                        <td>{{ $item->tanggal }}</td>
                                                        <td>
                                                            @if ($item->status == 'LUNAS')
                                                                <span class="badge bg-green text-white">Lunas</span>
                                                            @elseif ($item->status == 'HUTANG')
                                                                <span class="badge bg-red text-white">Hutang</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL ADD --}}
    <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ADD {{ $judul }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store.trans') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <div class="form-label">Nama Pelanggan</div>
                            <select class="form-select" name="id_pelanggan">
                                <option value="">--PILIH PELANGGAN--</option>
                                @foreach ($pelanggan as $pl)
                                    <option value="{{ $pl->id }}">
                                        {{ $pl->nama_pelanggan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <select class="form-select" name="id_harga">
                                <option value="">--PILIH HARGA--</option>
                                @foreach ($harga as $hrd)
                                    <option value="{{ $hrd->id }}">
                                        Rp. {{ number_format($hrd->harga, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" class="form-control border border-dark" name="tanggal" id="tanggal"
                                value="{{ old('tanggal') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" id="status">
                                <option value="">--PILIH STATUS--</option>
                                <option value="LUNAS">LUNAS</option>
                                <option value="HUTANG">HUTANG</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- END MODAL ADD --}}

    {{-- MODAL EDIT --}}
    @foreach ($trans as $item)
        <div class="modal modal-blur fade" id="modal-edit{{ $item->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">EDIT {{ $judul }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('update.trans', $item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <div class="form-label">Nama Pelanggan</div>
                                <select class="form-select" name="id_pelanggan">
                                    <option value="">--PILIH PELANGGAN--</option>
                                    @foreach ($pelanggan as $pl)
                                        <option value="{{ $pl->id }}"
                                            {{ $item->id_pelanggan == $pl->id ? 'selected' : '' }}>
                                            {{ $pl->nama_pelanggan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <select class="form-select" name="id_harga">
                                    <option value="">--PILIH HARGA--</option>
                                    @foreach ($harga as $hrd)
                                        <option value="{{ $hrd->id }}"
                                            {{ $item->id_harga == $hrd->id ? 'selected' : '' }}>
                                            Rp. {{ number_format($hrd->harga, 0, ',', '.') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control border border-dark" name="tanggal"
                                    id="tanggal" value="{{ old('tanggal', $item->tanggal) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status" id="status">
                                    <option value="">--PILIH STATUS--</option>
                                    <option value="LUNAS" {{ $item->status == 'LUNAS' ? 'selected' : '' }}>LUNAS
                                    </option>
                                    <option value="HUTANG" {{ $item->status == 'HUTANG' ? 'selected' : '' }}>HUTANG
                                    </option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- END MODAL EDIT --}}
@endsection
