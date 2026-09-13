@extends('layouts.app')

@section('title', 'Hubungi Kami - ' . ($profile->name ?? 'SMA Negeri 1 Harapan Bangsa'))

@section('content')
<!-- Header Banner -->
<section style="background: linear-gradient(135deg, #07192f 0%, #0b2545 100%); color: #ffffff; padding: 56px 0;">
    <div class="container" style="text-align: center;">
        <span class="hero-tag" style="margin-bottom: 12px;">LAYANAN ASPIRASI & INFORMASI</span>
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 12px;">Hubungi Pihak Sekolah</h1>
        <p style="color: #cbd5e1; max-width: 650px; margin: 0 auto; font-size: 1.0625rem;">
            Pintu komunikasi terbuka bagi masyarakat, wali murid, alumni, dan calon peserta didik. Sampaikan pertanyaan atau saran Anda kepada kami.
        </p>
    </div>
</section>

<div class="section-padding">
    <div class="container">
        <div class="contact-grid">
            <!-- Left Info Card -->
            <div class="contact-info-card">
                <span class="section-tag" style="background: rgba(255,255,255,0.15); color: #fef08a;">SALURAN RESMI</span>
                <h3 style="font-size: 1.75rem; font-weight: 800; color: #ffffff; margin: 12px 0 20px;">
                    Pusat Informasi & Pelayanan
                </h3>
                <p style="color: #cbd5e1; font-size: 0.9375rem; line-height: 1.7; margin-bottom: 32px;">
                    Kantor Tata Usaha dan Hubungan Masyarakat SMAN 1 Harapan Bangsa siap melayani kebutuhan informasi dan administrasi pendidikan pada jam operasional kerja.
                </p>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div class="contact-info-text">
                        <h4>Alamat Kampus</h4>
                        <p>{{ $profile->address }}, {{ $profile->city }}, {{ $profile->province }} {{ $profile->postal_code }}</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div class="contact-info-text">
                        <h4>Telepon Kantor</h4>
                        <p>{{ $profile->phone }}</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div class="contact-info-text">
                        <h4>Surat Elektronik (Email)</h4>
                        <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                    </div>
                </div>

                <div class="contact-info-item" style="margin-bottom: 0;">
                    <div class="contact-info-icon">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="contact-info-text">
                        <h4>Jam Layanan Tata Usaha</h4>
                        <p>Senin – Jumat: 07.00 – 16.00 WIB<br><small style="color:#94a3b8;">Sabtu & Minggu: Libur Pelayanan</small></p>
                    </div>
                </div>
            </div>

            <!-- Right Form Box -->
            <div class="form-box">
                <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--color-primary); margin-bottom: 8px;">
                    Formulir Kirim Pesan & Saran
                </h3>
                <p style="color: var(--color-text-muted); font-size: 0.875rem; margin-bottom: 24px;">
                    Silakan lengkapi formulir di bawah ini dengan data yang benar. Tim kami akan merespons pesan Anda sesegera mungkin.
                </p>

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label">Nama Lengkap <span style="color: #dc2626;">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Contoh: Ahmad Rizki Pratama" required>
                        @error('name')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="form-group">
                            <label for="email" class="form-label">Alamat Email <span style="color: #dc2626;">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="nama@email.com" required>
                            @error('email')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Nomor WhatsApp / HP</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="0812xxxxxxxx">
                            @error('phone')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="form-label">Perihal / Subjek <span style="color: #dc2626;">*</span></label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="Contoh: Pertanyaan PPDB Jalur Prestasi" required>
                        @error('subject')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">Isi Pesan atau Aspirasi <span style="color: #dc2626;">*</span></label>
                        <textarea id="message" name="message" rows="5" class="form-control" placeholder="Tuliskan pertanyaan, masukan, atau pesan Anda secara rinci di sini..." required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px; font-size: 1rem;">
                        Kirimkan Pesan Sekarang
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- Peta Interaktif Lokasi Kampus Sekolah (Google Maps) -->
        <div class="school-map-wrapper">
            <div class="school-map-header">
                <div>
                    <span class="section-tag" style="margin-bottom: 6px;">PETA LOKASI GOOGLE MAPS</span>
                    <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--color-primary); margin: 0;">
                        Denah & Koordinat Lokasi {{ $profile->name ?? 'SMA Negeri 1 Harapan Bangsa' }}
                    </h3>
                </div>
                <div style="display: flex; gap: 10px; align-items: center;">
                    <a href="https://maps.google.com/?q={{ urlencode(($profile->name ?? 'SMA Negeri 1 Harapan Bangsa') . ' ' . ($profile->address ?? 'Bandung')) }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline" style="padding: 8px 16px; font-size: 0.8125rem; display: inline-flex; align-items: center; gap: 6px;">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        Buka di Google Maps
                    </a>
                </div>
            </div>
            
            <div style="border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border-color); box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                <iframe 
                    title="Peta Lokasi Google Maps SMAN 1 Harapan Bangsa"
                    src="https://maps.google.com/maps?q={{ urlencode(($profile->name ?? 'SMAN 1 Harapan Bangsa') . ' ' . ($profile->address ?? 'Jl. Pendidikan No. 45 Bandung')) }}&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                    width="100%" 
                    height="420" 
                    style="border:0; display: block;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection


