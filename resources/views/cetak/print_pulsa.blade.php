<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Hasil</title>
    <style>
        /* CSS untuk halaman cetak */
        @page {
            size: 58mm auto;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .struk {
            width: 100%;
            margin: 0 auto;
            background-color: #fff;
            padding: 5mm;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            margin-bottom: 5px;
        }

        .header .judul {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .header .keterangan {
            font-size: 12px;
            margin-bottom: 5px;
        }

        .garis {
            border-top: 1px solid #000;
            margin: 2px 0;
        }

        .tanggal-cetak {
            text-align: right;
            font-size: 10px;
            margin-bottom: 5px;
        }

        .item {
            margin-bottom: 2px;
        }

        .item-label {
            display: inline-block;
            width: 50%;
            font-weight: bold;
        }

        .item-value {
            display: inline-block;
            width: 50%;
        }

        .total {
            margin-top: 5px;
            font-weight: bold;
        }

        .footer {
            margin-top: 5px;
            text-align: center;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <?php
    // Set zona waktu sesuai dengan waktu yang diinginkan
    date_default_timezone_set('Asia/Jakarta');
    ?>
    <div class="struk">
        <div class="header">
            <div class="judul">LAPORAN DATA TRANSAKSI PULSA</div>
            <div class="keterangan">Hasil cetak dilakukan secara otomatis oleh sistem</div>
            <div class="garis"></div>
        </div>
        <div class="tanggal-cetak">
            Tanggal Cetak Laporan: <?= date('d-m-Y H:i:s') ?> WIB
        </div>

        @foreach ($transaksi as $item)
            <div class="item">
                <span class="item-label">Nama Pelanggan:</span>
                <span class="item-value">{{ $item->pelanggan->nama_pelanggan }}</span>
            </div>
            <div class="item">
                <span class="item-label">Harga:</span>
                <span class="item-value">Rp. {{ number_format($item->harga->harga, 0, ',', '.') }}</span>
            </div>
            <div class="item">
                <span class="item-label">Tanggal:</span>
                <span class="item-value">{{ $item->tanggal }}</span>
            </div>
            <div class="item">
                <span class="item-label">Status:</span>
                <span class="item-value">{{ $item->status }}</span>
            </div>
            <div class="total">
                Total: Rp. {{ number_format($item->harga->harga, 0, ',', '.') }}
            </div>
        @endforeach

        <div class="footer">
            Terima kasih atas kunjungan Anda ke DY-CELL
        </div>
    </div>
</body>

</html>
