@extends('admin.layouts.admin')
@section('content')
    <div class="row g-4 mb-4">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Produk</h6>
                            <h4 class="fw-bold mb-0">100</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Produk Unggulan</h6>
                            <h4 class="fw-bold mb-0">90</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Produk Pria</h6>
                            <h4 class="fw-bold mb-0">100</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Produk Wanita</h6>
                            <h4 class="fw-bold mb-0">90</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h4 class="fw-bold mb-1">Daftar Produk</h4>
            <p class="text-muted small mb-0">Kelola katalog produk Anda di sini.</p>
        </div>
        <a href="/admin/addProduct" class="btn btn-primary d-flex align-items-center gap-2 px-4 shadow-sm"> <i
                class="bi bi-plus-lg"></i> Tambah Produk </a>
    </div>
    {{-- Allert Hapus --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card-modern">
        <div class="table-header-area">
            <form method="GET" action="{{ url()->current() }}">
                <div class="row g-3 align-items-center justify-content-between">
                    <div class="col-12 col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 ps-3"><i
                                    class="bi bi-search text-muted"></i></span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="form-control border-start-0 ps-2" placeholder="Cari nama produk, deskripsi..." />
                        </div>
                    </div>

                    <div class="col-12 col-md-8 text-md-end d-flex gap-2 justify-content-md-end flex-wrap">
                        <select name="kategori" class="form-select w-auto">
                            <option value="">Semua Kategori</option>
                            <option value="Pria" {{ request('kategori') == 'Pria' ? 'selected' : '' }}>Pria</option>
                            <option value="Wanita" {{ request('kategori') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                        </select>
                        <select name="tipe" class="form-select w-auto">
                            <option value="">Semua Tipe</option>
                            <option value="unggulan" {{ request('tipe') == 'unggulan' ? 'selected' : '' }}>Unggulan</option>
                            <option value="standard" {{ request('tipe') == 'standard' ? 'selected' : '' }}>Biasa</option>
                        </select>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ url()->current() }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4" width="50">
                            <input class="form-check-input" type="checkbox" />
                        </th>
                        <th>Info Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Tipe</th>
                        <th>Deskripsi</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produk as $produks)
                        <tr>
                            <td class="ps-4"><input class="form-check-input" type="checkbox" /></td>
                            <td>

                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('uploads/produk/' . $produks->gambar) }}" alt="Produk"
                                        class="product-avatar me-3" />
                                    <div>
                                        <h6 class="mb-0 fw-semibold text-dark">{{ $produks->nama_produk }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-secondary small fw-medium">{{ $produks->kategori }}</span></td>
                            <td class="fw-bold text-dark">Rp {{ number_format($produks->harga, 0, ',', '.') }}</td>
                            <td>
                                <span
                                    class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 rounded-pill px-3">
                                    <i class="bi bi-star-fill me-1"></i> {{ $produks->tipe }} </span>
                            </td>
                            <td style="max-width: 250px">
                                <div class="text-truncate text-muted small" title="{{ $produks->deskripsi }}">
                                    {{ $produks->deskripsi }}
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.produk.edit', $produks->id) }}" class="btn-action me-1"
                                    title="Edit"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.produk.delete', $produks->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action delete" title="Hapus"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="bi bi-box-seam display-4 text-muted mb-3"></i>
                                    <h5 class="text-muted">Belum ada data produk</h5>
                                    <p class="text-muted small">Silakan tambah produk baru terlebih dahulu.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center p-4 border-top">
            <span class="small text-muted">
                Menampilkan
                <span class="fw-bold">{{ $produk->firstItem() }}</span>
                sampai
                <span class="fw-bold">{{ $produk->lastItem() }}</span>
                dari
                <span class="fw-bold">{{ $produk->total() }}</span>
                data
            </span>

            {{-- withQueryString() berguna agar saat Anda filter/search, parameternya terbawa ke halaman 2 --}}
            <div class="pagination-wrapper">
                {{ $produk->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
