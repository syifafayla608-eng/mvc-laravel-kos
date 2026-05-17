<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Kos - Fayla Residence</title>
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
        .detail-row { display: flex; justify-content: space-between; align-items: center; padding: 16px 0; border-bottom: 1px solid #eef0f7; }
        .detail-row:last-child { border-bottom: none; }
        .detail-label { color: #6b7280; font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.8px; font-weight: 600; }
        .detail-value { font-weight: 600; color: #0a1628; }
        .harga-value { color: #8a6a00; font-size: 1.25rem; font-weight: 700; }
        .btn-gold { background: linear-gradient(135deg, #c9a84c, #e8c96d); color: #0a1628; font-weight: 700; border: none; border-radius: 10px; padding: 10px 24px; }
        .btn-gold:hover { background: linear-gradient(135deg, #b8962e, #c9a84c); color: #0a1628; }
        .btn-outline-navy { border: 1.5px solid #1a2f5e; color: #1a2f5e; border-radius: 10px; padding: 10px 20px; font-weight: 500; }
        .btn-outline-navy:hover { background: #1a2f5e; color: #fff; }
        .divider { height: 2px; background: linear-gradient(to right, #c9a84c, transparent); margin-bottom: 20px; border-radius: 2px; }
        .icon-box { width: 48px; height: 48px; background: linear-gradient(135deg, #c9a84c22, #c9a84c44); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #c9a84c; font-size: 1.3rem; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/kos"><i class="bi bi-house-door-fill me-2"></i>KosKu</a>
    </div>
</nav>

<div class="container mt-4 mb-5" style="max-width:600px">
    <div class="card shadow">
        <div class="card-header">
            <h5><i class="bi bi-eye me-2"></i>Detail Kos</h5>
        </div>
        <div class="card-body p-4">
            <div class="divider"></div>

            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="icon-box"><i class="bi bi-house-fill"></i></div>
                <div>
                    <div style="font-family:'Playfair Display',serif; font-size:1.3rem; color:#0a1628; font-weight:700">{{ $kos->nama_kos }}</div>
                    <div style="color:#6b7280; font-size:0.9rem"><i class="bi bi-geo-alt me-1"></i>{{ $kos->alamat }}</div>
                </div>
            </div>

            <div class="detail-row">
                <span class="detail-label"><i class="bi bi-cash me-1"></i>Harga / Bulan</span>
                <span class="harga-value">Rp {{ number_format($kos->harga, 0, ',', '.') }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label"><i class="bi bi-door-open me-1"></i>Jumlah Kamar</span>
                <span class="detail-value">{{ $kos->jumlah_kamar }} kamar</span>
            </div>

            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('kos.index') }}" class="btn btn-outline-navy"><i class="bi bi-arrow-left me-1"></i>Kembali</a>
                <a href="{{ route('kos.edit', $kos->id) }}" class="btn btn-gold"><i class="bi bi-pencil me-1"></i>Edit</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>