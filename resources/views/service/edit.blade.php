<!DOCTYPE html>
<html>
<head>
    <title>Edit Daftar Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2>Edit Daftar Service</h2>

    <form action="{{ route('service.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nomor Plat Kendaraan</label>
            <select name="kendaraan_id" class="form-select" required>
                @foreach($kendaraans as $kendaraan)
                    <option value="{{ $kendaraan->id }}"
                        {{ $service->kendaraan_id == $kendaraan->id ? 'selected' : '' }}>
                        {{ $kendaraan->no_plat }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">ID Pelanggan</label>
            <select name="pelanggan_id" id="pelanggan_id" class="form-select" required>
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}"
                        data-nama="{{ $pelanggan->nama_lengkap }}"
                        {{ $service->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>
                        {{ $pelanggan->id }} - {{ $pelanggan->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Pelanggan</label>
            <input type="text" id="nama_pelanggan"
                class="form-control"
                value="{{ $service->pelanggan->nama_lengkap }}"
                readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Keluhan</label>
            <textarea name="keluhan" class="form-control" required>{{ $service->keluhan }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Service</label>
            <input type="date" name="tanggal_service"
                class="form-control"
                value="{{ $service->tanggal_service }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('service.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

    <script>
        document.getElementById('pelanggan_id').addEventListener('change', function () {
            const nama = this.options[this.selectedIndex].dataset.nama || '';
            document.getElementById('nama_pelanggan').value = nama;
        });
    </script>

</body>
</html>