<div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="navbar-header text-center mt-2 mb-4">
                    <img src="/assets/img/logo_andaru.webp" class="img-fluid" width="150">
                    <h5>Apply Lamaran Kamu</h5>
                    <h3>PT. Andaru Triadi Ceria Sejahtera</h3>
                    <h5 class="mb-0 mt-5 fw-bold">
                        <i class="fas fa-search-location me-2"></i>Lacak Lamaran Pekerjaan
                    </h5>
                </div>
                
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <form wire:submit.prevent="search" class="mb-4">
                            <div class="mb-3">
                                <label for="no_apply" class="form-label fw-bold">Nomor Lamaran</label>
                                <input 
                                    type="text" 
                                    id="no_apply" 
                                    class="form-control form-control-lg" 
                                    placeholder="Contoh: 202501060001" 
                                    wire:model="no_apply" 
                                    required
                                >
                                @error('no_apply')
                                    <div class="text-danger mt-1">
                                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100 shadow-sm">
                                <i class="fas fa-search me-2"></i>Lacak Lamaran
                            </button>
                        </form>

                        @if($notFound)
                            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Lamaran dengan nomor <strong>{{ $no_apply }}</strong> tidak ditemukan.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($candidate)
                            <div class="mt-4">
                                <div class="alert alert-success text-center">
                                    <h5 class="mb-0">
                                        <i class="fas fa-check-circle me-2"></i>Status Lamaran: 
                                        <span class="badge bg-success fs-6">{{ ucfirst(__($candidate->status)) }}</span>
                                    </h5>
                                </div>

                                <div class="card shadow-sm border-0">
                                    <div class="card-body">
                                        <h5 class="text-primary fw-bold mb-4">
                                            <i class="fas fa-user me-2"></i>Detail Lamaran
                                        </h5>
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th class="w-50">No. Lamaran</th>
                                                    <td class="fw-bold">{{ $candidate->no_apply }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Lengkap</th>
                                                    <td>{{ $candidate->nama_lengkap }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Panggilan</th>
                                                    <td>{{ $candidate->nama_panggilan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Umur</th>
                                                    <td>{{ $candidate->umur }} tahun</td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td>{{ $candidate->alamat_rumah }}, RT {{ $candidate->rt }}/RW {{ $candidate->rw }}, Kel. {{ $candidate->kelurahan }}, Kec. {{ $candidate->kecamatan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>No. KTP</th>
                                                    <td>{{ $candidate->no_ktp }}</td>
                                                </tr>
                                                <tr>
                                                    <th>No. KK</th>
                                                    <td>{{ $candidate->no_kk }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $candidate->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Posisi Dilamar</th>
                                                    <td class="text-capitalize">{{ $candidate->posisi_dilamar }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Dokumen</th>
                                                    <td>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <i class="fas fa-file-pdf text-danger me-2"></i>
                                                                <a href="{{ Storage::url($candidate->cv_terbaru) }}" target="_blank" class="text-decoration-none">
                                                                    <b>CV Terbaru</b>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-file-pdf text-danger me-2"></i>
                                                                <a href="{{ Storage::url($candidate->skck_terbaru) }}" target="_blank" class="text-decoration-none">
                                                                    <b>SKCK Terbaru</b>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-file-pdf text-danger me-2"></i>
                                                                <a href="{{ Storage::url($candidate->ket_sehat_terbaru) }}" target="_blank" class="text-decoration-none">
                                                                    <b>Surat Keterangan Sehat</b>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Lamar</th>
                                                    <td>{{ $candidate->created_at->format('d M Y H:i') }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-5 text-center">
            <hr>
            <p class="text-muted">
                <a href="/" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-arrow-left me-1"></i>Kembali ke Beranda
                </a>
            </p>
        </footer>
    </div>
</div>