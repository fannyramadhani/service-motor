<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Service Motor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .header {
            background: #212529;
            color: white;
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .menu-card {
            border: none;
            border-radius: 12px;
            transition: 0.2s;
        }

        .menu-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="header">
        <h1>Dashboard Service Motor</h1>
        <p class="mb-0">Sistem Informasi Pengelolaan Bengkel Motor</p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card menu-card shadow-sm p-3">
                <h5>Data Pelanggan</h5>
                <p>Kelola informasi pelanggan bengkel.</p>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-primary">Buka Data</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card menu-card shadow-sm p-3">
                <h5>Data Kendaraan</h5>
                <p>Kelola informasi kendaraan pelanggan.</p>
                <a href="{{ route('kendaraan.index') }}" class="btn btn-primary">Buka Data</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card menu-card shadow-sm p-3">
                <h5>Daftar Service</h5>
                <p>Kelola pendaftaran service kendaraan.</p>
                <a href="{{ route('service.index') }}" class="btn btn-primary">Buka Data</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card menu-card shadow-sm p-3">
                <h5>Data Service</h5>
                <p>Kelola pekerjaan mekanik dan sparepart.</p>
                <a href="{{ route('data-service.index') }}" class="btn btn-primary">Buka Data</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card menu-card shadow-sm p-3">
                <h5>Pembayaran Service</h5>
                <p>Kelola biaya dan jenis pembayaran.</p>
                <a href="{{ route('pembayaran.index') }}" class="btn btn-primary">Buka Data</a>
            </div>
        </div>

    </div>

    <footer class="text-center mt-5 text-secondary">
        <p>&copy; 2026 Sistem Informasi Service Motor</p>
    </footer>

</div>

</body>
</html>