<div>
    <div class="navbar-header text-center mt-2 mb-4">
        <img src="/assets/img/logo_andaru.webp" class="img-fluid" width="150">
        <h5>PT. Andaru Triadi Ceria Sejahtera</h5>
        <h3>List Job Available</h3>
    </div>

    <div class="alert alert-info alert-dismissible fade show mx-3 mb-4" role="alert">
        <strong>Informasi Penting:</strong> PT. Andaru Triadi Ceria Sejahtera tidak pernah memungut biaya apapun dalam proses rekrutmen. 
        Waspadai segala bentuk penipuan yang mengatasnamakan perusahaan kami.
    </div>


    <div class="container mt-4">
        <div class="row">
            @forelse($jobs as $job)
                <div class="col-md-4 mb-4">
                    <div class="card job-card h-100 shadow-sm border-0" style="cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;" 
                         wire:click="showDetail({{ $job->id }})"
                         onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.1)';"
                         onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.05)';">
                        <div class="card-body p-4 bg-white rounded">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title fw-bold text-dark mb-0">{{ Str::limit($job->pekerjaan, 30) }}</h5>
                                <span class="badge bg-primary-subtle text-primary border border-primary">{{ $job->tipe_pekerjaan }}</span>
                            </div>
                            
                            <div class="mb-3">
                                <p class="mb-1 text-dark"><i class="feather feather-home me-2"></i> <strong>Divisi:</strong> {{ $job->divisi }}</p>
                                <p class="mb-1 text-dark"><i class="feather feather-check me-2"></i> <strong>Gaji:</strong> Rp {{ number_format($job->start_salary, 0, ',', '.') }} - Rp {{ number_format($job->end_salary, 0, ',', '.') }}</p>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i>
                                    Tutup: {{ \Carbon\Carbon::parse($job->close_post)->format('d M Y') }}
                                </small>
                                <button class="btn btn-success btn-sm text-white border border-info">
                                    Lihat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">Belum ada lowongan pekerjaan tersedia</h4>
                    <p class="text-muted">Silakan cek kembali nanti untuk informasi lowongan terbaru</p>
                </div>
            @endforelse
        </div>

        @if($selectedJob)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" style="background-color: rgba(76, 78, 100, 0.8); z-index: 1050; overflow-y: auto;">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content border-0 shadow-lg rounded-2" style="max-height: 90vh; overflow-y: auto;">
                    <div class="modal-header bg-gradient bg-primary text-white rounded-top-2">
                        <div class="w-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="modal-title text-white fw-bold mb-0">{{ $selectedJob->pekerjaan }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <div class="card border-0 bg-light-subtle">
                                    <div class="card-body">
                                        <h6 class="card-title text-primary mb-3"><i class="fas fa-file-alt me-2"></i>Deskripsi Pekerjaan</h6>
                                        <p class="card-text text-dark">{!! nl2br(e($selectedJob->deskripsi_pekerjaan)) !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 bg-light-subtle">
                                    <div class="card-body">
                                        <h6 class="card-title text-primary mb-3"><i class="fas fa-info-circle me-2"></i>Informasi Umum</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><strong>Divisi:</strong> <span class="float-end badge bg-secondary">{{ $selectedJob->divisi }}</span></li>
                                            <li class="mb-2"><strong>Tipe Pekerjaan:</strong> <span class="float-end badge bg-info">{{ $selectedJob->tipe_pekerjaan }}</span></li>
                                            <li class="mb-2"><strong>Gaji:</strong> <span class="float-end text-success fw-bold">Rp {{ number_format($selectedJob->start_salary, 0, ',', '.') }} - Rp {{ number_format($selectedJob->end_salary, 0, ',', '.') }}</span></li>
                                            <li class="mb-2"><strong>Batas Akhir:</strong> <span class="float-end text-dark">{{ \Carbon\Carbon::parse($selectedJob->close_post)->format('d M Y') }}</span></li>
                                            <li class="mb-2"><strong>Posted by:</strong> <span class="float-end text-info">{{ $selectedJob->nama_poster }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 bg-light-subtle">
                                    <div class="card-body">
                                        <h6 class="card-title text-success mb-3"><i class="fas fa-check-circle me-2"></i>Syarat</h6>
                                        <p class="card-text text-dark">{!! nl2br(e($selectedJob->syarat)) !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 bg-light-subtle">
                                    <div class="card-body">
                                        <h6 class="card-title text-dark mb-3"><i class="fas fa-gift me-2"></i>Benefit</h6>
                                        <p class="card-text text-dark">{!! nl2br(e($selectedJob->benefit)) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light rounded-bottom-2" style="position: sticky; bottom: 0; z-index: 1051;">
                        <div class="d-flex w-100 justify-content-between">
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i> Ditutup: {{ \Carbon\Carbon::parse($selectedJob->close_post)->format('d M Y') }}
                            </small>
                            <div>
                                <button type="button" class="btn btn-outline-secondary me-2" wire:click="closeModal">
                                    <i class="fas fa-times me-1"></i>Tutup
                                </button>
                                <a href="/apply" class="btn btn-primary px-4">
                                    <i class="fas fa-paper-plane me-1"></i>Apply Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@push('styles')
<style>
.modal {
    display: block !important;
    padding-right: 0 !important;
}

.modal-dialog {
    margin: 1rem auto;
    max-width: 90%;
    width: 90%;
}

.modal-content {
    max-height: 85vh;
    overflow-y: auto;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.modal-footer {
    position: sticky;
    bottom: 0;
    background: white;
    z-index: 1051;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
}

.btn {
    min-width: 100px;
}

@media (max-width: 768px) {
    .modal-dialog {
        width: 95%;
        margin: 1rem auto;
    }
    
    .modal-content {
        max-height: 80vh;
    }
}
</style>
@endpush