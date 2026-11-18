<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <a href="{{ url('/') }}" class="btn btn-dark mb-3">
        Kembali ke Dashboard
    </a>

    <h2>Pembayaran Service</h2>

    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">
        Tambah Pembayaran
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Pembayaran</th>
                <th>ID Service</th>
                <th>Jumlah Biaya</th>
                <th>Jenis Pembayaran</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pembayarans as $pembayaran)
                <tr>
                    <td>{{ $pembayaran->id }}</td>
                    <td>{{ $pembayaran->service_id }}</td>
                    <td>Rp {{ number_format($pembayaran->jumlah_biaya, 0, ',', '.') }}</td>
                    <td>{{ $pembayaran->jenis_pembayaran }}</td>
                    <td>{{ $pembayaran->keterangan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('pembayaran.edit', $pembayaran->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}"
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
                    <td colspan="6" class="text-center">
                        Belum ada data pembayaran.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>