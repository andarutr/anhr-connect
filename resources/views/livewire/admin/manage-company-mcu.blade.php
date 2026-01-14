<div>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-12">
                <h3 class="mb-3">Manajemen MCU</h3>
                <button class="btn btn-primary" wire:click="openCreateModal">
                    <i class="fas fa-plus"></i> Tambah MCU
                </button>
            </div>
        </div>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama MCU</th>
                                    <th>Lokasi</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($mcus as $mcu)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mcu->name }}</td>
                                        <td>{{ $mcu->location }}</td>
                                        <td>{{ $mcu->created_at->format('d M Y H:i') }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success" wire:click="openEditModal({{ $mcu->id }})">
                                                <i class="feather feather-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" wire:click="confirmDelete({{ $mcu->id }})">
                                                <i class="feather feather-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mcuModal" tabindex="-1" aria-labelledby="mcuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mcuModalLabel">{{ $modalTitle }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="saveMcu">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama MCU</label>
                            <input type="text" class="form-control @error('form.name') is-invalid @enderror" id="name" wire:model="form.name" placeholder="Masukkan nama MCU">
                            @error('form.name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <textarea class="form-control @error('form.location') is-invalid @enderror" id="location" wire:model="form.location" rows="3" placeholder="Masukkan lokasi MCU"></textarea>
                            @error('form.location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" wire:click="saveMcu">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('openModal', () => {
            $('#mcuModal').modal('show');
        });

        Livewire.on('closeModal', () => {
            $('#mcuModal').modal('hide');
        });

        Livewire.on('swal:confirm-delete', (id) => {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'MCU ini akan dihapus secara permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteMcu', [id]);
                }
            });
        });

        Livewire.on('swal:success', (message) => {
            Swal.fire({
                title: 'Berhasil!',
                text: message,
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        });

        Livewire.on('swal:error', (message) => {
            Swal.fire({
                title: 'Gagal!',
                text: message,
                icon: 'error'
            });
        });
    });
</script>