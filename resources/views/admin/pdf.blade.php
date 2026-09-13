<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan CMS Portal Berita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333333;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
            color: #1e3a8a;
            text-transform: uppercase;
        }
        .header p {
            margin: 4px 0 0;
            font-size: 11px;
            color: #64748b;
        }
        .stats-grid {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .stats-card {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 10px;
            text-align: center;
            border-radius: 6px;
        }
        .stats-card .title {
            font-size: 10px;
            color: #64748b;
            text-transform: uppercase;
            font-weight: bold;
        }
        .stats-card .value {
            font-size: 18px;
            color: #0f172a;
            font-weight: bold;
            margin-top: 4px;
        }
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table.data-table th, table.data-table td {
            border: 1px solid #cbd5e1;
            padding: 8px 10px;
            text-align: left;
        }
        table.data-table th {
            background-color: #f1f5f9;
            color: #334155;
            font-size: 11px;
            text-transform: uppercase;
        }
        table.data-table tr:nth-child(even) {
            background-color: #f8fafc;
        }
        .badge {
            display: inline-block;
            padding: 3px 8px;
            font-size: 10px;
            font-weight: bold;
            border-radius: 12px;
        }
        .badge-publish {
            background-color: #dcfce7;
            color: #15803d;
        }
        .badge-draft {
            background-color: #fef3c7;
            color: #b45309;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #94a3b8;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Laporan Rekapitulasi CMS Portal Berita</h1>
        <p>Dicetak Pada Tanggal: {{ $date }} | Administrator System</p>
    </div>

    <!-- Statistik Table -->
    <table class="stats-grid">
        <tr>
            <td width="25%">
                <div class="stats-card">
                    <div class="title">Total Berita</div>
                    <div class="value">{{ $totalBerita }}</div>
                </div>
            </td>
            <td width="25%">
                <div class="stats-card">
                    <div class="title">Berita Ditayangkan</div>
                    <div class="value">{{ $beritaCount }}</div>
                </div>
            </td>
            <td width="25%">
                <div class="stats-card">
                    <div class="title">Total Kategori</div>
                    <div class="value">{{ $kategorisCount }}</div>
                </div>
            </td>
            <td width="25%">
                <div class="stats-card">
                    <div class="title">Pengguna Aktif</div>
                    <div class="value">{{ $usersCount }}</div>
                </div>
            </td>
        </tr>
    </table>

    <h3 style="color: #1e293b; margin-bottom: 8px;">Daftar Artikel Berita</h3>

    <table class="data-table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="40%">Judul Berita</th>
                <th width="20%">Kategori</th>
                <th width="15%">Status</th>
                <th width="20%">Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($beritas as $index => $item)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td><strong>{{ $item->judul }}</strong></td>
                <td>{{ $item->kategori->nama_kategori ?? 'Umum' }}</td>
                <td>
                    @if(strtolower($item->status_publish) === 'publish')
                        <span class="badge badge-publish">Published</span>
                    @else
                        <span class="badge badge-draft">Draft</span>
                    @endif
                </td>
                <td>{{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">Tidak ada data berita.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        &copy; 2026 - Portal Berita
    </div>

</body>
</html>
