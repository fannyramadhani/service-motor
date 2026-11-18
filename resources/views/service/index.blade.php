<!DOCTYPE html>
<html>
<head>
    <title>Daftar Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <a href="{{ url('/') }}" class="btn btn-dark mb-3">
        Kembali ke Dashboard
    </a>

    <h2>Daftar Service</h2>

    <a href="{{ route('service.create') }}" class="btn btn-primary mb-3">
        Tambah Daftar Service
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Service</th>
                <th>No. Plat</th>
                <th>ID Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Keluhan</th>
                <th>Tanggal Service</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->kendaraan->no_plat }}</td>
                    <td>{{ $service->pelanggan->id }}</td>
                    <td>{{ $service->pelanggan->nama_lengkap }}</td>
                    <td>{{ $service->keluhan }}</td>
                    <td>{{ $service->tanggal_service }}</td>
                    <td>
                        <a href="{{ route('service.edit', $service->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('service.destroy', $service->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        Belum ada data service.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>