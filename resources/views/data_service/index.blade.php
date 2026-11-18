<!DOCTYPE html>
<html>
<head>
    <title>Data Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <a href="{{ url('/') }}" class="btn btn-dark mb-3">
        Kembali ke Dashboard
    </a>

    <h2>Data Service</h2>

    <a href="{{ route('data-service.create') }}" class="btn btn-primary mb-3">
        Tambah Data Service
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Data Service</th>
                <th>ID Service</th>
                <th>Keluhan</th>
                <th>Estimasi Service</th>
                <th>Nama Mekanik</th>
                <th>Sparepart Pengganti</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataServices as $dataService)
                <tr>
                    <td>{{ $dataService->id }}</td>
                    <td>{{ $dataService->service_id }}</td>
                    <td>{{ $dataService->keluhan }}</td>
                    <td>{{ $dataService->estimasi_service }}</td>
                    <td>{{ $dataService->nama_mekanik }}</td>
                    <td>{{ $dataService->sparepart_pengganti ?? '-' }}</td>
                    <td>
                        <a href="{{ route('data-service.edit', $dataService->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('data-service.destroy', $dataService->id) }}"
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