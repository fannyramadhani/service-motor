<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Kendaraan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nomor Plat</label>
            <input type="text" name="no_plat" class="form-control"
                   value="{{ old('no_plat', $kendaraan->no_plat) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kendaraan</label>

            <div>
                <input type="radio" name="jenis_kendaraan"
                       value="Matic"
                       {{ old('jenis_kendaraan', $kendaraan->jenis_kendaraan) == 'Matic' ? 'checked' : '' }}
                       required>
                <label>Matic</label>
            </div>

            <div>
                <input type="radio" name="jenis_kendaraan"
                       value="Manual Transmisi"
                       {{ old('jenis_kendaraan', $kendaraan->jenis_kendaraan) == 'Manual Transmisi' ? 'checked' : '' }}>
                <label>Manual Transmisi</label>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor STNK</label>
            <input type="text" name="no_stnk" class="form-control"
                   value="{{ old('no_stnk', $kendaraan->no_stnk) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun Pembuatan</label>
            <input type="number" name="tahun_pembuatan" class="form-control"
                   value="{{ old('tahun_pembuatan', $kendaraan->tahun_pembuatan) }}"
                   min="1900" max="{{ date('Y') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Pemilik</label>
            <input type="text" name="nama_pemilik" class="form-control"
                   value="{{ old('nama_pemilik', $kendaraan->nama_pemilik) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Warna</label>
            <input type="text" name="warna" class="form-control"
                   value="{{ old('warna', $kendaraan->warna) }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
