<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2>Tambah Pembayaran Service</h2>

    <form action="{{ route('pembayaran.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">ID Service</label>
            <select name="service_id" class="form-select" required>
                <option value="">-- Pilih ID Service --</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">
                        {{ $service->id }} - {{ $service->pelanggan->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Biaya (Rp)</label>
            <input type="number" name="jumlah_biaya" class="form-control"
                min="0" step="0.01" placeholder="Contoh: 150000" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Pembayaran</label>
            <div>
                <input type="radio" name="jenis_pembayaran"
                    value="Cash/Tunai" required>
                <label>Cash/Tunai</label>
            </div>
            <div>
                <input type="radio" name="jenis_pembayaran"
                    value="Non Tunai">
                <label>Non Tunai</label>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control"
                placeholder="Masukkan keterangan pembayaran"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</body>
</html>