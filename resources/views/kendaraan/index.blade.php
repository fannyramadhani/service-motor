<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <a href="{{ url('/') }}" class="btn btn-dark mb-3">
        Kembali ke Dashboard
    </a>

    <h2>Data Kendaraan</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('kendaraan.create') }}" class="btn btn-primary mb-3">
        Tambah Kendaraan
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>No Plat</th>
                <th>Jenis Kendaraan</th>
                <th>No STNK</th>
                <th>Tahun Pembuatan</th>
                <th>Nama Pemilik</th>
                <th>Warna</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kendaraans as $kendaraan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kendaraan->no_plat }}</td>
                    <td>{{ $kendaraan->jenis_kendaraan }}</td>
                    <td>{{ $kendaraan->no_stnk }}</td>
                    <td>{{ $kendaraan->tahun_pembuatan }}</td>
                    <td>{{ $kendaraan->nama_pemilik }}</td>
                    <td>{{ $kendaraan->warna }}</td>
                    <td>
                        <a href="{{ route('kendaraan.edit', $kendaraan->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('kendaraan.destroy', $kendaraan->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">
                        Belum ada data kendaraan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
