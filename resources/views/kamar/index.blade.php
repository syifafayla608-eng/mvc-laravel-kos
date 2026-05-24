<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kamar - {{ $kos->nama_kos }}</title>
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
        .btn-gold { background: linear-gradient(135deg, #c9a84c, #e8c96d); color: #0a1628; font-weight: 700; border: none; border-radius: 8px; padding: 8px 20px; }
        .btn-gold:hover { background: linear-gradient(135deg, #b8962e, #c9a84c); color: #0a1628; }
        .table { color: #1a2f5e; }
        .table thead th { background: #f0f4ff; color: #0a1628; font-weight: 700; font-size: 0.82rem; text-transform: uppercase; border: none; padding: 14px 16px; }
        .table tbody tr { border-bottom: 1px solid #eef0f7; }
        .table tbody tr:hover { background: #f8f6ee; }
        .table tbody td { padding: 14px 16px; vertical-align: middle; border: none; }
        .badge-tersedia { background: #e6f9f0; color: #1a7a4a; border: 1.5px solid #1a7a4a44; padding: 5px 14px; border-radius: 20px; font-weight: 600; }
        .badge-terisi { background: #fff0f0; color: #c0392b; border: 1.5px solid #c0392b44; padding: 5px 14px; border-radius: 20px; font-weight: 600; }
        .btn-action { border-radius: 8px; padding: 6px 12px; font-weight: 600; border: none; }
        .btn-edit { background: #fff8e8; color: #8a6a00; }
        .btn-edit:hover { background: #c9a84c; color: #fff; }
        .btn-hapus { background: #fff0f0; color: #c0392b; }
        .btn-hapus:hover { background: #c0392b; color: #fff; }
        .alert-success { background: #f0faf0; border: 1.5px solid #27ae60; color: #1e7e34; border-radius: 12px; }
        .divider { height: 2px; background: linear-gradient(to right, #c9a84c, transparent); margin-bottom: 20px; border-radius: 2px; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/kos"><i class="bi bi-house-door-fill me-2"></i>Fayla Residence</a>
    </div>
</nav>

<div class="container mt-4 mb-5">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5><i class="bi bi-door-open me-2"></i>Kamar - {{ $kos->nama_kos }}</h5>
            <div>
                <a href="{{ route('kos.index') }}" class="btn btn-outline-light btn-sm me-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('kamar.create', $kos->id) }}" class="btn btn-gold btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Kamar
                </a>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="divider"></div>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Kamar</th>
                            <th>Status</th>
                            <th>Luas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kamar as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">Kamar {{ $k->nomor_kamar }}</td>
                            <td>
                                @if($k->status == 'tersedia')
                                    <span class="badge-tersedia">✅ Tersedia</span>
                                @else
                                    <span class="badge-terisi">❌ Terisi</span>
                                @endif
                            </td>
                            <td>{{ $k->luas ? $k->luas . ' m²' : '-' }}</td>
                            <td>
                                <a href="{{ route('kamar.edit', [$kos->id, $k->id]) }}" class="btn btn-action btn-edit me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('kamar.destroy', [$kos->id, $k->id]) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin hapus kamar ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-action btn-hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-5">
                                <i class="bi bi-inbox display-5 d-block mb-2"></i>
                                Belum ada kamar.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>