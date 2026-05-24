<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: #f0f2f8; }
        .navbar { background: linear-gradient(135deg, #0a1628, #1a2f5e); border-bottom: 2px solid #c9a84c; padding: 16px 0; }
        .navbar-brand { font-family: 'Playfair Display', serif; color: #c9a84c !important; font-size: 1.6rem; }
        .card { background: #fff; border: none; border-radius: 16px; box-shadow: 0 4px 24px rgba(10,22,40,0.10); }
        .card-header { background: linear-gradient(135deg, #0a1628, #1a2f5e); border-bottom: 2px solid #c9a84c; border-radius: 16px 16px 0 0 !important; padding: 18px 24px; }
        .card-header h5 { font-family: 'Playfair Display', serif; color: #c9a84c; margin: 0; }
        .form-label { color: #4a5568; font-size: 0.83rem; text-transform: uppercase; letter-spacing: 0.8px; font-weight: 600; }
        .form-control, .form-select { border: 1.5px solid #dde3ef; border-radius: 10px; padding: 11px 16px; color: #1a2f5e; background: #f8f9fd; }
        .form-control:focus, .form-select:focus { border-color: #c9a84c; box-shadow: 0 0 0 3px #c9a84c22; background: #fff; }
        .btn-gold { background: linear-gradient(135deg, #c9a84c, #e8c96d); color: #0a1628; font-weight: 700; border: none; border-radius: 10px; padding: 11px 28px; }
        .btn-gold:hover { background: linear-gradient(135deg, #b8962e, #c9a84c); color: #0a1628; }
        .btn-outline-navy { border: 1.5px solid #1a2f5e; color: #1a2f5e; border-radius: 10px; padding: 11px 20px; font-weight: 500; }
        .btn-outline-navy:hover { background: #1a2f5e; color: #fff; }
        .divider { height: 2px; background: linear-gradient(to right, #c9a84c, transparent); margin-bottom: 24px; border-radius: 2px; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/kos"><i class="bi bi-house-door-fill me-2"></i>Fayla Residence</a>
    </div>
</nav>

<div class="container mt-4 mb-5" style="max-width:600px">
    <div class="card shadow">
        <div class="card-header">
            <h5><i class="bi bi-pencil me-2"></i>Edit Kamar - {{ $kos->nama_kos }}</h5>
        </div>
        <div class="card-body p-4">
            <div class="divider"></div>
            <form action="{{ route('kamar.update', [$kos->id, $kamar->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="form-label">Nomor Kamar</label>
                    <input type="text" name="nomor_kamar" class="form-control @error('nomor_kamar') is-invalid @enderror" value="{{ old('nomor_kamar', $kamar->nomor_kamar) }}">
                    @error('nomor_kamar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="tersedia" {{ $kamar->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="terisi" {{ $kamar->status == 'terisi' ? 'selected' : '' }}>Terisi</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label">Luas (m²) - Opsional</label>
                    <input type="number" name="luas" class="form-control" value="{{ old('luas', $kamar->luas) }}">
                </div>
                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('kamar.index', $kos->id) }}" class="btn btn-outline-navy">Batal</a>
                    <button type="submit" class="btn btn-gold"><i class="bi bi-save me-1"></i>Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>