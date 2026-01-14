   @extends('admin.layouts.admin')
   @section('content')
       {{-- Cek Error Validasi --}}
       @if ($errors->any())
           <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Gagal Disimpan!</strong>
               <ul class="mb-0">
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
       @endif

       {{-- Cek Pesan Sukses --}}
       @if (session('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Berhasil!</strong> {{ session('success') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
       @endif
       <!-- Tambah produk -->
       <div class="d-flex justify-content-between align-items-center mb-4">
           <div>
               <h4 class="fw-bold mb-1">Tambah Produk Baru</h4>
               <nav aria-label="breadcrumb">
                   <ol class="breadcrumb text-muted small mb-0">
                       <li class="breadcrumb-item"><a href="/admin" class="text-decoration-none text-muted">Dashboard</a>
                       </li>
                       <li class="breadcrumb-item active" aria-current="page">Tambah Baru</li>
                   </ol>
               </nav>
           </div>
       </div>

       <form id="produkForm" action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="row">
               <div class="col-12 col-lg-8">
                   <div class="card mb-4">
                       <div class="card-body p-4">
                           <h5 class="fw-bold mb-4">Informasi Umum</h5>

                           <div class="mb-3">
                               <label for="productName" class="form-label">Nama Produk</label>
                               <input type="text" class="form-control" id="productName" name="nama_produk"
                                   placeholder="Masukan Nama Produk" required />
                           </div>

                           <div class="mb-3">
                               <label for="productDesc" class="form-label">Deskripsi</label>
                               <textarea class="form-control rounded-top-0" id="productDesc" name="deskripsi" rows="6"
                                   placeholder="Tulis deskripsi detail produk di sini..."></textarea>
                               <div class="form-text">Jelaskan Deskripsi dan keunggulan produk.</div>
                           </div>
                       </div>
                   </div>

                   <div class="card mb-4">
                       <div class="card-body p-4">
                           <h5 class="fw-bold mb-4">Harga</h5>
                           <div class="row">
                               <div class="col-md-6 mb-3">
                                   <label class="form-label">Harga (Rp)</label>
                                   <div class="input-group">
                                       <span class="input-group-text">Rp</span>
                                       <input type="number" class="form-control" name="harga" placeholder="0" />
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="col-12 col-lg-4">
                   <div class="card mb-4">
                       <div class="card-body p-4">
                           <h5 class="fw-bold mb-3">Gambar Produk</h5>
                           <div class="image-upload-wrap" id="imageUploadWrap">
                               <input class="image-upload-input" type="file" onchange="readURL(this);" name="gambar"
                                   accept="image/*" />
                               <div class="drag-text" id="dragText">
                                   <i class="bi bi-cloud-arrow-up text-primary fs-1"></i>
                                   <h6 class="mt-2 text-dark">Klik atau Drop Gambar</h6>
                                   <span class="text-muted small">Max file size: 2MB</span>
                               </div>
                               <img id="imagePreview" class="preview-image mx-auto d-block" src="#" alt="Preview" />
                           </div>
                           <button type="button" onclick="removeUpload()" id="removeBtn"
                               class="btn btn-danger btn-sm w-100 mt-3 d-none"><i class="bi bi-trash"></i> Hapus
                               Gambar</button>
                       </div>
                   </div>

                   <div class="card mb-4">
                       <div class="card-body p-4">
                           <h5 class="fw-bold mb-3">Tipe produk</h5>
                           <div class="mb-4">
                               <label class="form-label">Kategori</label>
                               <select class="form-select" name="kategori">
                                   <option selected disabled>Pilih Kategori...</option>
                                   <option value="pria">Pria</option>
                                   <option value="wanita">Wanita</option>
                               </select>

                           </div>

                           <hr class="text-muted opacity-25" />

                           <div class="mb-3">
                               <div class="form-check form-switch d-flex justify-content-between ps-0 align-items-center">
                                   <label class="form-check-label fw-bold" for="featuredSwitch">Produk Unggulan</label>
                                   <input class="form-check-input ms-3" name="tipe" type="checkbox" role="switch"
                                       id="featuredSwitch" />
                               </div>
                               <div class="form-text small">Aktifkan ini untuk menampilkan produk di banner halaman depan.
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="d-flex justify-content-end gap-2 mb-4">
               <a href="/admin" class="btn btn-outline-secondary px-4">Batal</a>
               <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-2"></i>Simpan Produk</button>
           </div>
       </form>

   @endsection
