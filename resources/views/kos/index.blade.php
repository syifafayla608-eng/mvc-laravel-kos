<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fayla Residence - Daftar Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: #f0f2f8; min-height: 100vh; }
        .navbar {
            background: linear-gradient(135deg, #0a1628 0%, #1a2f5e 100%);
            border-bottom: 2px solid #c9a84c;
            padding: 16px 0;
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            color: #c9a84c !important;
            font-size: 1.6rem;
            letter-spacing: 1px;
        }
        .navbar-brand i { color: #c9a84c; }
        .page-header {
            background: linear-gradient(135deg, #0a1628, #1a2f5e);
            padding: 40px 0 60px;
            margin-bottom: -40px;
        }
        .page-header h2 {
            font-family: 'Playfair Display', serif;
            color: #c9a84c;
            font-size: 2rem;
        }
        .page-header p { color: #8899bb; }
        .card {
            background: #fff;
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(10,22,40,0.10);
        }
        .card-header {
            background: linear-gradient(135deg, #0a1628, #1a2f5e);
            border-bottom: 2px solid #c9a84c;
            border-radius: 16px 16px 0 0 !important;
            padding: 18px 24px;
        }
        .card-header h5 {
            font-family: 'Playfair Display', serif;
            color: #c9a84c;
            font-size: 1.2rem;
            margin: 0;
        }
        .btn-gold {
            background: linear-gradient(135deg, #c9a84c, #e8c96d);
            color: #0a1628;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            padding: 8px 20px;
            transition: all 0.2s;
        }
        .btn-gold:hover { background: linear-gradient(135deg, #b8962e, #c9a84c); color: #0a1628; transform: translateY(-1px); }
        .form-control {
            border: 1.5px solid #dde3ef;
            border-radius: 10px;
            padding: 10px 16px;
            color: #1a2f5e;
            background: #f8f9fd;
        }
        .form-control:focus {
            border-color: #c9a84c;
            box-shadow: 0 0 0 3px #c9a84c22;
            background: #fff;
        }
        .btn-navy {
            background: #1a2f5e;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
        }
        .btn-navy:hover { background: #0a1628; color: #c9a84c; }
        .btn-outline-navy {
            border: 1.5px solid #1a2f5e;
            color: #1a2f5e;
            border-radius: 8px;
            padding: 10px 16px;
            font-weight: 500;
        }
        .btn-outline-navy:hover { background: #1a2f5e; color: #fff; }
        .table { color: #1a2f5e; }
        .table thead tr { background: #f0f4ff; }
        .table thead th { color: #0a1628; font-weight: 700; font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.5px; border: none; padding: 14px 16px; }
        .table tbody tr { border-bottom: 1px solid #eef0f7; transition: background 0.15s; }
        .table tbody tr:hover { background: #f8f6ee; }
        .table tbody td { padding: 14px 16px; vertical-align: middle; border: none; }
        .badge-harga {
            background: #fff8e8;
            color: #8a6a00;
            border: 1.5px solid #c9a84c;
            padding: 5px 14px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.88rem;
        }
        .badge-kamar {
            background: #eef2ff;
            color: #1a2f5e;
            border: 1.5px solid #1a2f5e33;
            padding: 5px 14px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.88rem;
        }
        .btn-action { border-radius: 8px; padding: 6px 12px; font-weight: 600; border: none; }
        .btn-detail { background: #eef2ff; color: #1a2f5e; }
        .btn-detail:hover { background: #1a2f5e; color: #fff; }
        .btn-edit { background: #fff8e8; color: #8a6a00; }
        .btn-edit:hover { background: #c9a84c; color: #fff; }
        .btn-hapus { background: #fff0f0; color: #c0392b; }
        .btn-hapus:hover { background: #c0392b; color: #fff; }
        .alert-success {
            background: #f0faf0;
            border: 1.5px solid #27ae60;
            color: #1e7e34;
            border-radius: 12px;
        }
        .divider { height: 2px; background: linear-gradient(to right, #c9a84c, transparent); margin-bottom: 20px; border-radius: 2px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/kos">
            <i class="bi bi-house-door-fill me-2"></i>Fayla Residence
        </a>
    </div>
</nav>

<div class="page-header">
    <div class="container">
        <h2><i class="bi bi-building me-2"></i>Manajemen Kos</h2>
        <p class="mb-0">Kelola data kos dengan mudah dan profesional</p>
    </div>
</div>

<div class="container mb-5">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5><i class="bi bi-list-ul me-2"></i>Daftar Kos</h5>
            <a href="{{ route('kos.create') }}" class="btn btn-gold btn-sm px-4">
                <i class="bi bi-plus-circle me-1"></i> Tambah Kos
            </a>
        </div>
        <div class="card-body p-4">

            <div class="divider"></div>

            <form action="{{ route('kos.search') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="🔍  Cari nama atau alamat kos..." value="{{ $keyword ?? '' }}">
                    <button class="btn btn-navy px-4" type="submit"><i class="bi bi-search me-1"></i>Cari</button>
                    <a href="{{ route('kos.index') }}" class="btn btn-outline-navy px-3">Reset</a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kos</th>
                            <th>Alamat</th>
                            <th>Harga / Bulan</th>
                            <th>Kamar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataKos as $kos)
                        <tr>
                            <td class="text-secondary fw-500">{{ $loop->iteration }}</td>
                            <td class="fw-semibold" style="color:#0a1628">{{ $kos->nama_kos }}</td>
                            <td style="color:#4a5568"><i class="bi bi-geo-alt me-1 text-secondary"></i>{{ $kos->alamat }}</td>
                            <td><span class="badge-harga">Rp {{ number_format($kos->harga, 0, ',', '.') }}</span></td>
                            <td><span class="badge-kamar"><i class="bi bi-door-open me-1"></i>{{ $kos->jumlah_kamar }}</span></td>
                            <td>
                                <a href="{{ route('kos.show', $kos->id) }}" class="btn btn-action btn-detail me-1">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('kos.edit', $kos->id) }}" class="btn btn-action btn-edit me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('kos.destroy', $kos->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin hapus data ini?')">
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
                            <td colspan="6" class="text-center text-secondary py-5">
                                <i class="bi bi-inbox display-5 d-block mb-2"></i>
                                Data tidak ditemukan.
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