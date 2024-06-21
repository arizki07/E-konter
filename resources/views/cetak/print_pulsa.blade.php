<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Hasil</title>
    <style>
        /* CSS untuk halaman cetak */
        @page {
            size: auto;
            /* Ukuran kertas otomatis (cocok untuk cetak struk) */
            margin: 5mm;
            /* Margin 5mm untuk memberikan ruang di pinggir kertas */
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .rangkasurat {
            width: 100%;
            margin: 0 auto;
            background-color: #fff;
            padding: 10px;
            border: 1px solid #000;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header .tebal {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .header .keterangan {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .garis {
            border: 1px solid #000;
            margin: 5px auto;
        }

        .tanggal-cetak {
            text-align: right;
            font-size: 10px;
            margin-bottom: 5px;
        }

        .tebal {
            font-weight: bold;
        }

        .item {
            margin-bottom: 5px;
        }

        .item-label {
            display: inline-block;
            width: 40%;
            font-weight: bold;
        }

        .item-value {
            display: inline-block;
            width: 60%;
        }

        .total {
            margin-top: 10px;
            font-weight: bold;
        }

        .footer {
            margin-top: 10px;
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
    <div class="rangkasurat">
        <div class="header">
            <div class="tebal">LAPORAN DATA TRANSAKSI PULSA</div>
            <div class="keterangan">Hasil cetak dilakukan secara otomatis oleh sistem</div>
            <hr class="garis">
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
