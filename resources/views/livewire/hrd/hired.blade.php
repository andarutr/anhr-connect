<div>
    <div class="widget-list mt-5">
        <div class="row">
            <div class="widget-holder col-md-12">
                <div class="widget-bg">
                    <div class="widget-heading widget-heading-border">
                        <h5 class="widget-title">Data Candidate Hired</h5>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h6>Candidate Hired</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No. Apply</th>
                                                    <th>Nama</th>
                                                    <th>Posisi</th>
                                                    <th>Tanggal</th>
                                                    <th>Umur</th>
                                                    <th>Domisili</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($candidates as $candidate)
                                                <tr class="animate__animated animate__fadeIn">
                                                    <td>{{ $candidate->no_apply }}</td>
                                                    <td>{{ $candidate->nama_lengkap }} ({{ $candidate->nama_panggilan }})</td>
                                                    <td>{{ $candidate->posisi_dilamar }}</td>
                                                    <td>{{ Carbon\Carbon::parse($candidate->created_at)->format('d/m/Y') }}</td>
                                                    <td>{{ $candidate->umur }} Tahun</td>
                                                    <td>{{ $candidate->kelurahan }}, {{ $candidate->kecamatan }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary" wire:click="viewDetail({{ $candidate->id }})">
                                                            <i class="feather feather-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                                @if($candidates->isEmpty())
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
    
    @if($showDetailModal && $selectedCandidate)
    <div wire:ignore.self class="modal fade show d-block" id="detailModal" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Candidate</h5>
                    <button type="button" class="close" wire:click="closeDetailModal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>No. Apply:</strong> {{ $selectedCandidate->no_apply }}</p>
                            <p><strong>Nama Lengkap:</strong> {{ $selectedCandidate->nama_lengkap }}</p>
                            <p><strong>Nama Panggilan:</strong> {{ $selectedCandidate->nama_panggilan }}</p>
                            <p><strong>Email:</strong> {{ $selectedCandidate->email }}</p>
                            <p><strong>Posisi Dilamar:</strong> {{ $selectedCandidate->posisi_dilamar }}</p>
                            <p><strong>Umur:</strong> {{ $selectedCandidate->umur }} Tahun</p>
                            <p><strong>No. KTP:</strong> {{ $selectedCandidate->no_ktp }}</p>
                            <p><strong>No. KK:</strong> {{ $selectedCandidate->no_kk }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Alamat Rumah:</strong> {{ $selectedCandidate->alamat_rumah }}</p>
                            <p><strong>RT:</strong> {{ $selectedCandidate->rt }}</p>
                            <p><strong>RW:</strong> {{ $selectedCandidate->rw }}</p>
                            <p><strong>Kelurahan:</strong> {{ $selectedCandidate->kelurahan }}</p>
                            <p><strong>Kecamatan:</strong> {{ $selectedCandidate->kecamatan }}</p>
                            <p><strong>Status:</strong> 
                                <span class="badge badge-{{ $selectedCandidate->status == 'hired' ? 'info' : ($selectedCandidate->status == 'hired' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($selectedCandidate->status) }}
                                </span>
                            </p>
                            <p><strong>Tanggal Apply:</strong> {{ $selectedCandidate->created_at->format('d/m/Y H:i') }}</p>
                            @if($selectedCandidate->cv_terbaru)
                                <a href="{{ asset('storage/' . $selectedCandidate->cv_terbaru) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat CV</a>
                            @endif
                            @if($selectedCandidate->skck_terbaru)
                                <a href="{{ asset('storage/' . $selectedCandidate->skck_terbaru) }}" target="_blank" class="btn btn-sm btn-outline-success">Lihat SKCK</a>
                            @endif
                            @if($selectedCandidate->ket_sehat_terbaru)
                                <a href="{{ asset('storage/' . $selectedCandidate->ket_sehat_terbaru) }}" target="_blank" class="btn btn-sm btn-outline-info">Lihat Keterangan Sehat</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeDetailModal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>