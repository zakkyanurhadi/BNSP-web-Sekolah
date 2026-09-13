@extends('layouts.app')

@section('title', 'Profil Sekolah - ' . ($profile->name ?? 'SMA Negeri 1 Harapan Bangsa'))

@section('content')
<!-- Header Banner -->
<section style="background: linear-gradient(135deg, #07192f 0%, #0b2545 100%); color: #ffffff; padding: 56px 0;">
    <div class="container" style="text-align: center;">
        <span class="hero-tag" style="margin-bottom: 12px;">TENTANG KAMI</span>
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 12px;">Profil Lengkap Sekolah</h1>
        <p style="color: #cbd5e1; max-width: 650px; margin: 0 auto; font-size: 1.0625rem;">
            Mengenal lebih dekat identitas resmi kelembagaan, visi misi luhur, rekam jejak sejarah, dan fasilitas pendukung di {{ $profile->name }}.
        </p>
    </div>
</section>

<div class="section-padding">
    <div class="container">
        <!-- Interactive Tab Navigation -->
        <div class="tab-nav" role="tablist">
            <button class="tab-btn active" data-tab="tab-tabel" role="tab" id="tab-btn-tabel">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display:inline;vertical-align:-3px;margin-right:6px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Tabel Informasi Resmi
            </button>
            <button class="tab-btn" data-tab="tab-visi" role="tab" id="tab-btn-visi">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display:inline;vertical-align:-3px;margin-right:6px;"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                Visi, Misi & Karakter
            </button>
            <button class="tab-btn" data-tab="tab-sejarah" role="tab" id="tab-btn-sejarah">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display:inline;vertical-align:-3px;margin-right:6px;"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                Sejarah & Perkembangan
            </button>
            <button class="tab-btn" data-tab="tab-sarpras" role="tab" id="tab-btn-sarpras">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display:inline;vertical-align:-3px;margin-right:6px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                Fasilitas & Sarpras
            </button>
        </div>

        <!-- 1. TABEL INFORMASI PROFIL SEKOLAH (Wajib Sesuai Poin 5 project.md) -->
        <div id="tab-tabel" class="tab-pane active" id="tabel-profil">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 12px;">
                <div>
                    <h2 style="font-size: 1.5rem; font-weight: 800; color: var(--color-primary);">Tabel Informasi Profil Sekolah</h2>
                    <p style="color: var(--color-text-muted); font-size: 0.875rem;">
                        Data identitas resmi sekolah terdaftar pada basis data pokok pendidikan (Dapodik Kemendikdasmen RI).
                    </p>
                </div>
                <button onclick="window.print()" class="btn btn-outline" style="padding: 8px 18px; font-size: 0.875rem;">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    Cetak Lembar Profil
                </button>
            </div>

            <div class="table-responsive">
                <table class="profile-table" id="tabel-informasi-sekolah">
                    <thead>
                        <tr>
                            <th colspan="2">A. IDENTITAS RESMI LEMBAGA SEKOLAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="profile-table-label">Nama Sekolah</td>
                            <td class="profile-table-value"><strong>{{ $profile->name }}</strong></td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Nomor Pokok Sekolah Nasional (NPSN)</td>
                            <td class="profile-table-value">
                                <span style="font-family: monospace; font-size: 1rem; font-weight: 700; color: var(--color-primary-light);">{{ $profile->npsn }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Bentuk Pendidikan</td>
                            <td class="profile-table-value">{{ $profile->education_level }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Status Sekolah</td>
                            <td class="profile-table-value">
                                <span class="tag tag-negeri">{{ $profile->status }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Status Akreditasi</td>
                            <td class="profile-table-value">
                                <span class="tag tag-akreditasi">{{ $profile->accreditation }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Nomor SK Pendirian Sekolah</td>
                            <td class="profile-table-value">{{ $profile->sk_pendirian }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Tanggal SK Pendirian</td>
                            <td class="profile-table-value">{{ $profile->sk_pendirian_date }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Nomor SK Izin Operasional</td>
                            <td class="profile-table-value">{{ $profile->sk_izin_operasional }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Kepala Sekolah Saat Ini</td>
                            <td class="profile-table-value">
                                <strong>{{ $profile->principal_name }}</strong> 
                                <span style="color: var(--color-text-muted); font-size: 0.8125rem;">(NIP. {{ $profile->principal_nip }})</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Operator Dapodik Sekolah</td>
                            <td class="profile-table-value">{{ $profile->dapodik_operator }}</td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr>
                            <th colspan="2">B. LOKASI, ALAMAT, & KONTAK RESMI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="profile-table-label">Alamat Jalan</td>
                            <td class="profile-table-value">{{ $profile->address }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">RT / RW & Kelurahan/Desa</td>
                            <td class="profile-table-value">RT {{ $profile->rt_rw }}, Kelurahan {{ $profile->village }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Kecamatan</td>
                            <td class="profile-table-value">{{ $profile->district }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Kabupaten / Kota</td>
                            <td class="profile-table-value">{{ $profile->city }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Provinsi & Kode Pos</td>
                            <td class="profile-table-value">{{ $profile->province }} - {{ $profile->postal_code }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Nomor Telepon Kantor</td>
                            <td class="profile-table-value">{{ $profile->phone }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Alamat Email Resmi</td>
                            <td class="profile-table-value">
                                <a href="mailto:{{ $profile->email }}" style="color: var(--color-primary-light); text-decoration: underline;">{{ $profile->email }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Website Resmi</td>
                            <td class="profile-table-value">
                                <a href="{{ $profile->website }}" target="_blank" style="color: var(--color-primary-light); text-decoration: underline;">{{ $profile->website }}</a>
                            </td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr>
                            <th colspan="2">C. FASILITAS FISIK & REKAPITULASI STATISTIK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="profile-table-label">Luas Tanah Milik Sendiri</td>
                            <td class="profile-table-value">{{ $profile->land_area }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Luas Bangunan Sekolah</td>
                            <td class="profile-table-value">{{ $profile->building_area }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Daya Listrik PLN</td>
                            <td class="profile-table-value">{{ $profile->electricity_power }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Akses Jaringan Internet</td>
                            <td class="profile-table-value">{{ $profile->internet_access }}</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Jumlah Siswa / Peserta Didik</td>
                            <td class="profile-table-value"><strong>{{ $profile->student_count }} Siswa</strong> (Terbagi dalam Kelas X, XI, XII)</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Jumlah Pendidik (Dewan Guru)</td>
                            <td class="profile-table-value"><strong>{{ $profile->teacher_count }} Guru</strong> (Tersertifikasi & Linear S1/S2)</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Jumlah Tenaga Kependidikan</td>
                            <td class="profile-table-value">{{ $profile->staff_count }} Pegawai (Tata Usaha, Teknisi Lab, Perpustakaan, Keamanan)</td>
                        </tr>
                        <tr>
                            <td class="profile-table-label">Jumlah Rombongan Belajar (Rombel)</td>
                            <td class="profile-table-value">{{ $profile->classroom_count }} Rombel</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 2. TAB VISI, MISI & KARAKTER -->
        <div id="tab-visi" class="tab-pane">
            <div style="background: var(--color-surface); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 36px; box-shadow: var(--shadow-sm); margin-bottom: 32px;">
                <span class="section-tag">VISI SEKOLAH</span>
                <blockquote style="font-size: 1.35rem; font-weight: 700; color: var(--color-primary); line-height: 1.6; margin: 16px 0 24px; padding-left: 20px; border-left: 4px solid var(--color-accent);">
                    "{{ $profile->vision }}"
                </blockquote>

                <span class="section-tag" style="margin-top: 16px;">MISI SEKOLAH</span>
                <ol style="margin-top: 16px; padding-left: 24px; color: var(--color-text-main); font-size: 1rem; line-height: 1.9;">
                    @if(is_array($profile->mission))
                        @foreach($profile->mission as $misi)
                            <li style="margin-bottom: 8px;">{{ $misi }}</li>
                        @endforeach
                    @endif
                </ol>
            </div>

            <!-- Nilai-nilai Utama -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                <div style="background: var(--color-surface); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 24px;">
                    <div style="width: 44px; height: 44px; border-radius: var(--radius-sm); background: #dbeafe; display: flex; align-items: center; justify-content: center; margin-bottom: 14px; color: #1d4ed8;">
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h4 style="font-weight: 700; color: var(--color-primary); margin-bottom: 6px;">Integritas & Akhlak</h4>
                    <p style="font-size: 0.875rem; color: var(--color-text-muted);">Menjunjung tinggi kejujuran akademik, etika pergaulan, dan keteladanan budi pekerti.</p>
                </div>
                <div style="background: var(--color-surface); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 24px;">
                    <div style="width: 44px; height: 44px; border-radius: var(--radius-sm); background: #fef3c7; display: flex; align-items: center; justify-content: center; margin-bottom: 14px; color: #d97706;">
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    </div>
                    <h4 style="font-weight: 700; color: var(--color-primary); margin-bottom: 6px;">Inovasi & Kritis</h4>
                    <p style="font-size: 0.875rem; color: var(--color-text-muted);">Mendorong pemikiran analitis, riset keilmuan, dan penguasaan teknologi mutakhir.</p>
                </div>
                <div style="background: var(--color-surface); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 24px;">
                    <div style="width: 44px; height: 44px; border-radius: var(--radius-sm); background: #d1fae5; display: flex; align-items: center; justify-content: center; margin-bottom: 14px; color: #059669;">
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h4 style="font-weight: 700; color: var(--color-primary); margin-bottom: 6px;">Peduli Lingkungan</h4>
                    <p style="font-size: 0.875rem; color: var(--color-text-muted);">Budaya sekolah ramah lingkungan, minim sampah plastik, dan pelestarian alam.</p>
                </div>
            </div>
        </div>

        <!-- 3. TAB SEJARAH -->
        <div id="tab-sejarah" class="tab-pane">
            <div style="background: var(--color-surface); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 36px; box-shadow: var(--shadow-sm);">
                <span class="section-tag">REKAM JEJAK KELAHIRAN</span>
                <h3 style="font-size: 1.625rem; font-weight: 800; color: var(--color-primary); margin: 12px 0 20px;">
                    Dedikasi Empat Dekade Membangun Generasi Gemilang
                </h3>
                <p style="font-size: 1.0625rem; color: var(--color-text-muted); line-height: 1.8; margin-bottom: 24px;">
                    {{ $profile->history }}
                </p>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; border-top: 1px solid var(--border-color); padding-top: 24px;">
                    <div>
                        <h4 style="font-size: 1.5rem; font-weight: 800; color: var(--color-primary);">1986</h4>
                        <p style="font-size: 0.875rem; color: var(--color-text-muted);">Tahun berdirinya sekolah dengan angkatan perdana 120 siswa.</p>
                    </div>
                    <div>
                        <h4 style="font-size: 1.5rem; font-weight: 800; color: var(--color-accent);">12.000+</h4>
                        <p style="font-size: 0.875rem; color: var(--color-text-muted);">Alumni berkiprah di universitas top dan dunia kerja internasional.</p>
                    </div>
                    <div>
                        <h4 style="font-size: 1.5rem; font-weight: 800; color: var(--color-success);">Akreditasi A</h4>
                        <p style="font-size: 0.875rem; color: var(--color-text-muted);">Pertahanan nilai akreditasi unggul selama 4 siklus berturut-turut.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. TAB FASILITAS & SARPRAS -->
        <div id="tab-sarpras" class="tab-pane">
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
                <div style="background: var(--color-surface); border: 1px solid var(--border-color); border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-sm);">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80" alt="Lab Komputer" style="width:100%; aspect-ratio:16/10; object-fit:cover;">
                    <div style="padding: 20px;">
                        <h4 style="font-weight: 700; color: var(--color-primary); margin-bottom: 6px;">Laboratorium Komputer & AI</h4>
                        <p style="font-size: 0.875rem; color: var(--color-text-muted);">80 PC generasi terbaru berkecepatan tinggi untuk ujian daring, coding, dan riset multimedia.</p>
                    </div>
                </div>

                <div style="background: var(--color-surface); border: 1px solid var(--border-color); border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-sm);">
                    <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=800&q=80" alt="Lab Sains" style="width:100%; aspect-ratio:16/10; object-fit:cover;">
                    <div style="padding: 20px;">
                        <h4 style="font-weight: 700; color: var(--color-primary); margin-bottom: 6px;">Laboratorium Sains Terpadu</h4>
                        <p style="font-size: 0.875rem; color: var(--color-text-muted);">Fasilitas eksperimen Fisika, Kimia, dan Biologi berstandar keselamatan laboratorium modern.</p>
                    </div>
                </div>

                <div style="background: var(--color-surface); border: 1px solid var(--border-color); border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-sm);">
                    <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&w=800&q=80" alt="Perpustakaan" style="width:100%; aspect-ratio:16/10; object-fit:cover;">
                    <div style="padding: 20px;">
                        <h4 style="font-weight: 700; color: var(--color-primary); margin-bottom: 6px;">Smart Library Digital</h4>
                        <p style="font-size: 0.875rem; color: var(--color-text-muted);">Ribuan koleksi buku referensi, ruang baca hening ber-AC, dan akses e-book online 24 jam.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
