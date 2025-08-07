<?php 

// Raihan_official0307 / visualcodepo

$barang = [
    'KD001' => [
        'nama_barang' => 'Rinso 1000 Gr',
        'harga' => 37000,
    ],
    'KD002' => [
        'nama_barang' => 'So Klin 800 Gr',
        'harga' => 26000,
    ],
    'KD003' => [
        'nama_barang' => 'Daia 18000 Gr',
        'harga' => 32000,
    ],
    'KD004' => [
        'nama_barang' => 'Milo 100 Gr',
        'harga' => 30000,
    ],
    'KD005' => [
        'nama_barang' => 'Susu Kaleng',
        'harga' => 15000,
    ],
];

$daftar_voucher = [
    'HEMAT10' => ['diskon' => 10, 'type' => 'persen'], 
    'DISKON5000' => ['diskon' => 5000, 'type' => 'nominal'],
    'ESEMKA' => ['diskon' => 10000, 'type' => 'nominal'],
    'FREESHIP' => ['diskon' => 0, 'type' => 'nominal', 'pesan' => 'Gratis Ongkir!'],
];

if (!isset($_GET['kode_barang']) || !isset($_GET['jumlah_barang'])) {
    die("Error: Data tidak lengkap. Harap isi form terlebih dahulu.");
}

$kode_barang = $_GET['kode_barang'];
$jumlah_barang = (int)$_GET['jumlah_barang'];
$kode_voucher = strtoupper(trim($_GET['kode_voucher'] ?? '')); 
$tanggal_transaksi = date('d-m-Y H:i:s');

if (!isset($barang[$kode_barang])) {
    die("Error: Kode barang tidak valid.");
}

$barang_dipilih = $barang[$kode_barang];
$nama_barang = $barang_dipilih['nama_barang'];
$harga = $barang_dipilih['harga'];
$total = $jumlah_barang * $harga;

$potongan_harga = 0;
if ($total > 50000) {
    $potongan_harga += $total * 0.01;
}

$pesan_voucher = '';
if (!empty($kode_voucher)) {
    if (isset($daftar_voucher[$kode_voucher])) {
        $voucher = $daftar_voucher[$kode_voucher];
        if ($voucher['type'] === 'persen') {
            $potongan_voucher = $total * ($voucher['diskon'] / 100);
            $potongan_harga += $potongan_voucher;
            $pesan_voucher = "Selamat Diskon {$voucher['diskon']}% diterapkan!";
        } elseif ($voucher['type'] === 'nominal') {
            $potongan_harga += $voucher['diskon'];
            $pesan_voucher = $voucher['pesan'] ?? "Selamat Diskon Rp " . number_format ($voucher['diskon'], 0, ',', '.') . " diterapkan!";
        }
        } else if ($voucher['type'] === 'gratis') {
            $pesan_voucher = "Voucher tidak berlaku untuk barang ini.";
        }
    } else {
        $pesan_voucher = "Kode voucher tidak valid.";
    }


$total_bayar = $total - $potongan_harga;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penjualan</title>
    <!-- Code: Raihan_official0307 / visualcodepo -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            width: 420px;
            max-width: 95%;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
            transition: transform 0.3s;
            position: relative;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h2 {
            text-align: center;
            color: #2d3748;
            margin-bottom: 24px;
            font-size: 1.8rem;
            font-weight: 600;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table td, table th {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }
        table th {
            background-color: #f7fafc;
            color: #4a5568;
            font-weight: 600;
        }
        .total-row {
            background-color: #ebf8ff !important;
            font-weight: bold;
            color: #3182ce;
        }
        .back {
            display: inline-block;
            margin-top: 24px;
            padding: 12px 24px;
            background-color: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: background 0.3s;
            text-align: center;
            width: 90%;
        }
        .back:hover {
            background-color: #5a67d8;
            text-decoration: none;
        }
        .notification {
            margin: 15px 0;
            padding: 10px;
            background-color: #c6f6d5;
            color: #2f855a;
            border-radius: 8px;
            font-size: 0.95rem;
            text-align: center;
            border: 1px solid #9ae6b4;
        }
        .error {
            background-color: #fed7d7;
            color: #c53030;
            border: 1px solid #feb2b2;
        }
        .icon {
            margin-right: 6px;
        }
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .print-btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #38a169;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: background 0.3s;
            text-align: center;
            width: 100%;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: inherit;
        }
        .print-btn:hover {
            background-color: #2f855a;
        }
        
        @media print {
            body {
                background: none;
                padding: 0;
                margin: 0;
            }
            .card {
                box-shadow: none;
                border-radius: 0;
                padding: 20px;
                width: 100%;
                max-width: 100%;
            }
            .button-group, .back {
                display: none;
            }
            .print-only {
                display: block !important;
            }
            table {
                margin-top: 10px;
            }
            table td, table th {
                padding: 8px;
            }
        }
        
        .print-only {
            display: none;
        }
        
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px dashed #e2e8f0;
            padding-bottom: 15px;
        }
        
        .receipt-footer {
            text-align: center;
            margin-top: 20px;
            border-top: 2px dashed #e2e8f0;
            padding-top: 15px;
            font-size: 0.9rem;
            color: #718096;
        }
    </style>
</head>
<body>
    <div class="card">

        <div class="print-only receipt-header">
            <h2 style="margin-bottom: 5px;">Toko Serba Ada</h2>
            <p style="margin: 5px 0;">Jl. Menteng No. 06, Kota Medan</p>
            <p style="margin: 5px 0;">Telp: (021) 123-4567</p>
            <p style="margin: 5px 0;"><?= $tanggal_transaksi ?></p>
            <p style="margin: 5px 0;">Kasir: Owner</p>
        </div>
        
        <h2><i class="fas fa-receipt"></i> HASIL PENJUALAN</h2>

        <?php if (!empty($pesan_voucher)): ?>
            <div class="notification <?= strpos($pesan_voucher, 'tidak valid') ? 'error' : '' ?>">
                <i class="fas fa-gift"></i> <?= htmlspecialchars($pesan_voucher) ?>
            </div>
        <?php endif; ?>

        <table>
            <tr>
                <th colspan="3" style="text-align:center; background:#4a5568; color:white; border-radius:8px;">
                    <i class="fas fa-info-circle"></i> Detail Transaksi
                </th>
            </tr>
            <tr>
                <td><i class="fas fa-barcode"></i> Kode Barang</td>
                <td>:</td>
                <td><?= htmlspecialchars($kode_barang) ?></td>
            </tr>
            <tr>
                <td><i class="fas fa-tag"></i> Nama Barang</td>
                <td>:</td>
                <td><?= htmlspecialchars($nama_barang) ?></td>
            </tr>
            <tr>
                <td><i class="fas fa-money-bill-wave"></i> Harga Satuan</td>
                <td>:</td>
                <td>Rp <?= number_format($harga, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td><i class="fas fa-cubes"></i> Jumlah Beli</td>
                <td>:</td>
                <td><?= $jumlah_barang ?></td>
            </tr>
            <tr>
                <td><i class="fas fa-calculator"></i> Total Harga</td>
                <td>:</td>
                <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td><i class="fas fa-hand-holding-usd"></i> Potongan Harga</td>
                <td>:</td>
                <td>Rp <?= number_format($potongan_harga, 0, ',', '.') ?></td>
            </tr>
            <tr class="total-row">
                <td><strong><i class="fas fa-wallet"></i> Total Bayar</strong></td>
                <td><strong>:</strong></td>
                <td><strong>Rp <?= number_format($total_bayar, 0, ',', '.') ?></strong></td>
            </tr>
              <tr>
                <th colspan="3" style="text-align:center; background:#4a5568; color:white; border-radius:8px;">
                    <i class="fas fa-info-circle"></i> Terima Kasih Bro
                </th>
            </tr>
            <div class="date-info">
                <i class="fas fa-calendar-day"></i>
                <span id="current-date"></span>
            </div>
        </table>

        <div class="print-only receipt-footer">
            <p>Terima kasih telah berbelanja di Toko Serba Ada</p>
            <p>Barang yang sudah dibeli tidak dapat ditukar/dikembalikan</p>
        </div>

        <div class="button-group">
            <button onclick="window.print()" class="print-btn">
                <i class="fas fa-print"></i> Cetak Struk
            </button>
            <a href="index.php" class="back">
                <i class="fas fa-arrow-left"></i> Kembali ke Form
            </a>
        </div>
    </div>
    
    <script>
        document.querySelector('.print-btn').addEventListener('click', function() {
            window.print();
        });
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const currentDate = new Date().toLocaleDateString('id-ID', options);
        document.getElementById('current-date').textContent = currentDate;
    </script>
</body>
</html>
