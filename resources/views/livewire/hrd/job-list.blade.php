<div>
    <div class="widget-list mt-5">
        <div class="row">
            <div class="widget-holder col-md-12">
                <div class="widget-bg">
                    <div class="widget-heading widget-heading-border">
                        <h5 class="widget-title" style="display: flex; align-items: center; gap: 0.5rem;">Data Job Post @livewire('partials.badge-jumlah-post')</h5>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info alert-dismissible fade show mb-4" role="alert">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Perhatian!</strong> Untuk melakukan <strong>Edit</strong> atau <strong>Hapus</strong> data, silakan hubungi Department IT.
                                </div>
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h6>Job Post</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Pekerjaan</th>
                                                    <th>Divisi</th>
                                                    <th>Tipe</th>
                                                    <th>Start</th>
                                                    <th>End</th>
                                                    <th>Close</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($jobs as $job)
                                                <tr class="animate__animated animate__fadeIn">
                                                    <td>{{ $job->pekerjaan }}</td>
                                                    <td>{{ $job->divisi }}</td>
                                                    <td>{{ $job->tipe_pekerjaan }}</td>
                                                    <td>Rp.{{ number_format($job->start_salary, 0, ',', '.') }}</td>
                                                    <td>Rp.{{ number_format($job->end_salary, 0, ',', '.') }}</td>
                                                    <td>{{ Carbon\Carbon::parse($job->close_post)->format('d/m/Y') }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary" wire:click="viewDetail({{ $job->id }})">
                                                            <i class="feather feather-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                                @if($jobs->isEmpty())
                                                <tr>
                                                    <td colspan="7" class="text-center">Belum ada data candidate</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($showModal)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Daftar Pelamar</h5>
                    </div>
                    <div class="modal-body p-4" style="max-height: 70vh; overflow-y: auto;">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>