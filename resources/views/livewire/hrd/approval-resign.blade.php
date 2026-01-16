<div>
    <div class="widget-list mt-5">
        <div class="row">
            <div class="widget-holder col-md-12">
                <div class="widget-bg">
                    <div class="widget-heading widget-heading-border">
                        <h5 class="widget-title" style="display: flex; align-items: center; gap: 0.5rem;">Data Pengajuan Resign @livewire('partials.badge-jumlah-resign', ['status' => 'waiting'], key('waiting'))</h5>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h6>Pengajuan Resign</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Lengkap</th>
                                                    <th>Nik</th>
                                                    <th>Email</th>
                                                    <th>Position</th>
                                                    <th>Dept</th>
                                                    <th>File</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($resigns as $re)
                                                <tr class="animate__animated animate__fadeIn">
                                                    <td>{{ $re->employee->nama_lengkap }}</td>
                                                    <td>{{ $re->employee->nik }}</td>
                                                    <td>{{ $re->employee->email }}</td>
                                                    <td>{{ $re->employee->position }}</td>
                                                    <td>{{ $re->employee->department }}</td>
                                                    <td>
                                                        <a href="{{ asset('storage/' . $re->file_pengajuan) }}" target="_blank">
                                                            {{ Str::limit($re->file_pengajuan, 31, '...') }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-success" wire:click.prevent="confirmApprove({{ $re->id }})" title="Approve Resign">
                                                            <i class="feather feather-check"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-danger" wire:click.prevent="confirmReject({{ $re->id }})" title="Reject Resign">
                                                            <i class="feather feather-x"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                                @if($resigns->isEmpty())
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
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('show-approve-confirmation', function(data) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Apakah Anda ingin menyetujui pengajuan resign ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Ya, Setujui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.find(@this.id).call('approveResign', data.id);
                }
            });
        });

        Livewire.on('show-reject-confirmation', function(data) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Apakah Anda ingin menolak pengajuan resign ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Tolak!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.find(@this.id).call('rejectResign', data.id);
                }
            });
        });

        Livewire.on('alert', function(data) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                timer: 3000,
                showConfirmButton: false
            });
        });
    });
</script>