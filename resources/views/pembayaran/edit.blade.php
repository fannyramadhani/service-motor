<!DOCTYPE html>
<html>
<head>
    <title>Edit Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2>Edit Pembayaran Service</h2>

    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">ID Service</label>
            <select name="service_id" class="form-select" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}"
                        {{ $pembayaran->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->id }} - {{ $service->pelanggan->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Biaya (Rp)</label>
            <input type="number" name="jumlah_biaya" class="form-control"
                min="0" step="0.01"
                value="{{ $pembayaran->jumlah_biaya }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Pembayaran</label>
            <div>
                <input type="radio" name="jenis_pembayaran"
                    value="Cash/Tunai"
                    {{ $pembayaran->jenis_pembayaran == 'Cash/Tunai' ? 'checked' : '' }}
                    required>
                <label>Cash/Tunai</label>
            </div>
            <div>
                <input type="radio" name="jenis_pembayaran"
                    value="Non Tunai"
                    {{ $pembayaran->jenis_pembayaran == 'Non Tunai' ? 'checked' : '' }}>
                <label>Non Tunai</label>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $pembayaran->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</body>
</html>