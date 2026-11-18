<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2>Edit Data Service</h2>

    <form action="{{ route('data-service.update', $dataService->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">ID Service</label>
            <select name="service_id" id="service_id" class="form-select" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}"
                        data-keluhan="{{ $service->keluhan }}"
                        {{ $dataService->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->id }} - {{ $service->pelanggan->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Keluhan</label>
            <textarea name="keluhan" id="keluhan" class="form-control" readonly required>{{ $dataService->keluhan }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Estimasi Service</label>
            <input type="text" name="estimasi_service" class="form-control"
                value="{{ $dataService->estimasi_service }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Mekanik</label>
            <input type="text" name="nama_mekanik" class="form-control"
                value="{{ $dataService->nama_mekanik }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Sparepart Pengganti</label>
            <textarea name="sparepart_pengganti" class="form-control">{{ $dataService->sparepart_pengganti }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('data-service.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

    <script>
        document.getElementById('service_id').addEventListener('change', function () {
            const keluhan = this.options[this.selectedIndex].dataset.keluhan || '';
            document.getElementById('keluhan').value = keluhan;
        });
    </script>

</body>
</html>