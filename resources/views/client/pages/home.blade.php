@extends('client.layouts.app')

@section('content')
    {{-- Home page content --}}
    <section id="home" class="hero-section">
        <div class="container text-center animate-fade-in mt-5">
            <h1 class="display-1 fw-bold mb-4 ">
                WUJUDKAN GAYA <br />
                <span style="color: var(--brand-gold); font-style: italic">IMPIANMU</span>
            </h1>
            <p class="lead mb-5 mx-auto" style="max-width: 700px; color: #e2e8f0; font-weight: 300">
                Dari desain kasual hingga formal, Faiz Fashion menghadirkan koleksi terbaik dengan sentuhan personal yang
                membuat Anda tampil percaya diri.
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#catalog" class="btn btn-brand rounded-0">LIHAT KATALOG</a>
            </div>
        </div>
    </section>

    <section class="section-padding bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Why Choose Faiz Fashion?</h2>
                <div class="section-divider"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center feature-card">
                    <div class="feature-icon-box">
                        <i data-lucide="gem" width="32"></i>
                    </div>
                    <h4>Premium Quality</h4>
                    <p class="text-muted small">Bahan pilihan terbaik yang nyaman dipakai seharian dan tahan lama.</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center feature-card">
                    <div class="feature-icon-box">
                        <i data-lucide="scissors" width="32"></i>
                    </div>
                    <h4>Perfect Fit</h4>
                    <p class="text-muted small">Potongan presisi atau request ukuran custom sesuai bentuk tubuh Anda.</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center feature-card">
                    <div class="feature-icon-box">
                        <i data-lucide="truck" width="32"></i>
                    </div>
                    <h4>Fast Shipping</h4>
                    <p class="text-muted small">Pengiriman cepat ke seluruh Indonesia dengan garansi aman.</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center feature-card">
                    <div class="feature-icon-box">
                        <i data-lucide="message-circle-question" width="32"></i>
                    </div>
                    <h4>Expert Consult</h4>
                    <p class="text-muted small">Konsultasi gratis untuk pemilihan model dan bahan yang tepat.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- About --}}
    <section id="about" class="section-padding" style="background-color: var(--brand-light)">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6 position-relative">
                    <div class="position-absolute d-none d-md-block"
                        style="border: 2px solid var(--brand-gold); top: -15px; left: -15px; width: 100%; height: 100%; z-index: 0; border-radius: 8px">
                    </div>
                    <img src="uploads/imgAbout/imgAbout.png" class="img-fluid rounded shadow-lg position-relative"
                        style="z-index: 1" alt="About Us" />
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <span class="text-uppercase fw-bold text-muted small letter-spacing-2">Tentang Kami</span>
                    <h2 class="display-5 fw-bold mb-4" style="color: var(--brand-dark)">
                        Lebih dari Sekadar Jasa Jahit.
                    </h2>

                    <p class="text-muted text-justify mb-4">
                        <strong>Faiz Fashion</strong> adalah jasa penjahitan profesional yang menghadirkan busana dengan
                        sentuhan elegan
                        dan presisi tinggi. Kami memadukan teknik jahit klasik dengan gaya modern untuk menghasilkan pakaian
                        yang
                        nyaman, rapi, dan mencerminkan kepribadian Anda.
                    </p>

                    <p class="text-muted text-justify mb-5">
                        Setiap pakaian kami buat secara personal, mulai dari jahit harian, seragam, hingga busana khusus
                        untuk acara
                        penting. Dengan layanan <em>custom</em>, setiap ukuran, model, dan detail disesuaikan agar Anda
                        tampil lebih
                        percaya diri dan berkelas.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- Featured Products --}}

    <section id="featured" class="section-padding" style="background-color: var(--brand-dark); color: white">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-5">
                <div>
                    <span style="color: var(--brand-gold); letter-spacing: 2px" class="text-uppercase small fw-bold">Koleksi
                        Terbaik</span>
                    <h2 class="fw-bold mt-2">Produk Unggulan</h2>
                </div>
                <a href="#catalog" class="text-white text-decoration-none fw-bold border-bottom border-warning pb-1">LIHAT
                    SEMUA</a>
            </div>

            <div class="row g-4">
                @foreach ($unggulan as $item)
                    <div class="col-6 col-md-4">
                        <div class="card-product bg-dark text-white border-0 position-relative p-3 rounded-3 h-100">
                            <div class="card-img-wrapper rounded overflow-hidden">
                                <span
                                    class="badge bg-danger text-white position-absolute top-0 start-0 m-3 py-2 px-3">LIMITED</span>
                                <img src="{{ asset('uploads/produk/' . $item->gambar) }}" class="card-img-top w-100"
                                    style="height: 350px; object-fit: cover;" alt="Jacket" />
                            </div>
                            <div class="mt-4">
                                <h4 class="mb-1">{{ $item->nama_produk }}</h4>
                                <p class="card-text small text-white m-0">{{ $item->deskripsi }}</p>
                                <p class="text-secondary small">{{ $item->kategori }}</p>

                                <div class="d-flex justify-content-between align-items-center pt-2">
                                    <span class="h5 mb-0 fw-bold" style="color: #d4af37">Rp
                                        {{ number_format($item->harga, 0, ',', '.') }}</span>
                                    <button class="btn btn-light btn-sm rounded-pill px-4 fw-bold shadow-sm">
                                        Pesan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </section>

    {{-- Promo Section --}}
    <section class="py-5" style="background: linear-gradient(90deg, #dc3545, #b02a37); color: white">
        <div class="container">
            <div class="row align-items-center text-center text-md-start">
                <div
                    class="col-md-8 mb-3 mb-md-0 d-flex align-items-center justify-content-center justify-content-md-start gap-3">
                    <div class="bg-white text-danger rounded-circle d-flex align-items-center justify-content-center fw-bold h2 mb-0"
                        style="width: 70px; height: 70px">%</div>
                    <div>
                        <h3 class="fw-bold text-uppercase mb-0">Promo Spesial Bulan Ini!</h3>
                        <p class="mb-0 text-white-50">Dapatkan Cashback 50% + Gratis Ongkir + Bonus Jahit</p>
                    </div>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <a href="#contact" class="btn btn-light text-danger fw-bold rounded-pill px-4 py-3 shadow">PESAN
                        SEKARANG</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Product Catalog --}}
    <section id="catalog" class="section-padding bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Katalog Lengkap</h2>
                <p class="text-muted">Temukan gaya yang sesuai dengan kepribadian Anda.</p>
            </div>

            <div class="d-flex justify-content-center flex-wrap mb-5">
                <button onclick="filterProducts('all', this)" class="btn btn-filter active">Semua</button>
                <button onclick="filterProducts('pria', this)" class="btn btn-filter">Pria</button>
                <button onclick="filterProducts('wanita', this)" class="btn btn-filter">Wanita</button>
            </div>

            <div class="row g-4" id="product-grid">
                @foreach ($katalog as $item)
                    <div class="col-6 col-md-4 product-item {{ $item->kategori }}">
                        <div class="card card-product h-100">
                            <div class="card-img-wrapper">
                                <img src="{{ asset('uploads/produk/' . $item->gambar) }}" class="card-img-top"
                                    alt="{{ $item->nama_produk }}" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $item->nama_produk }}</h5>
                                <p class="card-text small text-muted">{{ $item->deskripsi }}</p>
                                <h5 class="text-warning text-dark fw-bold mb-3">Rp
                                    {{ number_format($item->harga, 0, ',', '.') }}</h5>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-dark btn-sm flex-fill fw-bold">Pesan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <button class="btn btn-outline-dark rounded-0 px-4 py-2 fw-bold">LOAD MORE</button>
            </div>
        </div>
    </section>

    {{-- Cara Pemesanan --}}
    <section id="cara-pesan" class="section-padding bg-dark text-white"
        style="background-color: #0b1120 !important; border-top: 1px solid #1e293b">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title text-white">Cara Pemesanan</h2>
                <div class="section-divider"></div>
            </div>
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <div class="step-circle active">1</div>
                    <h5 class="fw-bold">Pilih Model</h5>
                    <p class="small text-secondary px-2">Pilih dari katalog atau kirim foto referensi via WA.</p>
                </div>
                <div class="col-6 col-md-3">
                    <div class="step-circle outline">2</div>
                    <h5 class="fw-bold">Konsultasi</h5>
                    <p class="small text-secondary px-2">Diskusi bahan, harga, dan jadwal ukur (fitting).</p>
                </div>
                <div class="col-6 col-md-3">
                    <div class="step-circle outline">3</div>
                    <h5 class="fw-bold">Produksi</h5>
                    <p class="small text-secondary px-2">Bayar DP 50%, kami mulai menjahit pesanan Anda.</p>
                </div>
                <div class="col-6 col-md-3">
                    <div class="step-circle outline">4</div>
                    <h5 class="fw-bold">Jadi!</h5>
                    <p class="small text-secondary px-2">Fitting akhir, pelunasan, dan baju siap dibawa pulang.</p>
                </div>
            </div>
        </div>
    </section>



    <section id="guide" class="section-padding" style="background-color: var(--brand-light)">
        <div class="container" style="max-width: 800px">
            <div class="text-center mb-5">
                <h2 class="section-title">Panduan & Edukasi</h2>
                <p class="text-muted">Pertanyaan yang sering diajukan.</p>
            </div>

            <div class="accordion" id="faqAccordion">
                <div class="accordion-item mb-3 border-0 shadow-sm rounded">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne">Bagaimana cara memilih ukuran yang tepat?</button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">Kami menyediakan 'Size Chart' di setiap deskripsi produk.
                            Jika ragu, ukur lingkar dada dan pinggang Anda.</div>
                    </div>
                </div>
                <div class="accordion-item mb-3 border-0 shadow-sm rounded">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo">Tips memilih bahan pakaian?</button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">Untuk outdoor pilih Katun/Linen. Untuk formal pilih Wool.
                            Pesta malam cocok dengan Satin/Silk.</div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm rounded">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">Bagaimana cara pemesanan?</button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">Klik tombol 'Pesan' pada produk, atau klik tombol 'Tanya'
                            untuk terhubung ke WhatsApp kami.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="section-padding text-white" style="background-color: var(--brand-dark)">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6">
                    <span class="text-warning text-uppercase fw-bold small">Hubungi Kami</span>
                    <h2 class="display-5 fw-bold mb-4">Let's Create Your Style.</h2>
                    <p class="text-white-50 mb-5">Kunjungi studio kami atau hubungi kontak di bawah ini.</p>

                    <div class="d-flex gap-3 mb-4">
                        <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px; flex-shrink: 0">
                            <i data-lucide="map-pin"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Lokasi Studio</h5>
                            <small class="text-white-50">JKracak RT 01 RW 04, Grumbul Dukuh Tengah</small>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mb-4">
                        <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px; flex-shrink: 0">
                            <i data-lucide="phone"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">WhatsApp</h5>
                            <small class="text-white-50">+62895384922113</small>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px; flex-shrink: 0">
                            <i data-lucide="mail"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Email</h5>
                            <small class="text-white-50">faizfashion@gmail.com</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative h-100 rounded overflow-hidden" style="min-height: 300px">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d4178.10025389968!2d109.05801271083068!3d-7.401606672849815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMjQnMDUuOCJTIDEwOcKwMDMnMzguMSJF!5e1!3m2!1sid!2sid!4v1768312015064!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0; object-fit: cover;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-3 z-3">
                            <a href="https://maps.app.goo.gl/eSyCVVLj8sxi7ZRN7" target="_blank" rel="noopener noreferrer"
                                class="btn btn-warning rounded-pill fw-bold px-4 py-2 d-flex align-items-center gap-2 shadow-sm">
                                <i data-lucide="map"></i> Buka Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
