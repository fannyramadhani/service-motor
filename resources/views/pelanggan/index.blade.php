<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <a href="{{ url('/') }}" class="btn btn-dark mb-3">
        Kembali ke Dashboard
    </a>

    <h2>Data Pelanggan</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">
        Tambah Pelanggan
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pelanggan->nama_lengkap }}</td>
                    <td>{{ $pelanggan->no_hp }}</td>
                    <td>{{ $pelanggan->alamat_pelanggan }}</td>
                    <td>{{ $pelanggan->pekerjaan }}</td>
                    <td>
                        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}"
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
                    <td colspan="6" class="text-center">Belum ada data pelanggan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
