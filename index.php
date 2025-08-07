<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Penjualan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #667eea;
            --primary-dark: #5a67d8;
            --secondary: #764ba2;
            --gray: #718096;
            --gray-dark: #4a5568;
            --success: #48bb78;
            --danger: #e53e3e;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        .card {
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 480px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .card h2 {
            margin-bottom: 25px;
            color: #2d3748;
            font-weight: 600;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #4a5568;
            font-size: 0.95rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 1rem;
        }

        input, select {
            width: 100%;
            padding: 12px 15px 12px 40px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
            background-color: #f8fafc;
        }

        input:focus, select:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
            background-color: #fff;
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 1rem;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        button {
            padding: 12px 24px;
            cursor: pointer;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex: 1;
            min-width: 120px;
        }

        button:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        button[type="reset"] {
            background-color: var(--gray);
        }

        button[type="reset"]:hover {
            background-color: var(--gray-dark);
        }

        .date-info {
            margin-top: 15px;
            font-size: 0.9rem;
            color: var(--gray-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        @media (max-width: 480px) {
            .card {
                padding: 25px 20px;
            }
            
            .card h2 {
                font-size: 1.5rem;
            }
            
            .button-group {
                flex-direction: column;
                gap: 10px;
            }
            
            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <form action="hasil.php" method="GET">
        <div class="card">
            <h2><i class="fas fa-cash-register"></i> Input Penjualan</h2>
            <!-- Code: Raihan_official0307 / visualcodepo -->
            <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <div class="input-wrapper">
                    <i class="fas fa-barcode input-icon"></i>
                    <select name="kode_barang" id="kode_barang" required>
                        <option value="">Pilih Barang</option>
                        <option value="KD001">Rinso 200 Gr</option>
                        <option value="KD002">So Klin 200 Gr</option>
                        <option value="KD003">Daia 200 Gr</option>
                        <option value="KD004">Milo 100 Gr</option>
                        <option value="KD005">Susu Kaleng</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="jumlah_barang">Jumlah Beli</label>
                <div class="input-wrapper">
                    <i class="fas fa-cubes input-icon"></i>
                    <input type="number" name="jumlah_barang" id="jumlah_barang" min="1" required placeholder="Masukkan jumlah">
                </div>
            </div>
            
            <div class="form-group">
                <label for="kode_voucher">Kode Voucher (Opsional)</label>
                <div class="input-wrapper">
                    <i class="fas fa-ticket-alt input-icon"></i>
                    <input type="text" name="kode_voucher" id="kode_voucher" placeholder="Masukkan kode voucher">
                </div>
            </div>
            
            <div class="date-info">
                <i class="fas fa-calendar-day"></i>
                <span id="current-date"></span>
            </div>
            
            <div class="button-group">
                <button type="submit">
                    <i class="fas fa-calculator"></i> Proses
                </button>
                <button type="reset">
                    <i class="fas fa-undo"></i> Reset
                </button>
            </div>
        </div>
    </form>

    <script>

        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const currentDate = new Date().toLocaleDateString('id-ID', options);
        document.getElementById('current-date').textContent = currentDate;

        const form = document.querySelector('form');
        const hiddenDateInput = document.createElement('input');
        hiddenDateInput.type = 'hidden';
        hiddenDateInput.name = 'tanggal_transaksi';
        hiddenDateInput.value = new Date().toISOString().split('T')[0];
        form.appendChild(hiddenDateInput);
    </script>
</body>
</html>
