<div>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-12">
                <h3 class="mb-3">Manajemen Master Interview User</h3>
                <button class="btn btn-primary" wire:click="openCreateModal">
                    <i class="fas fa-plus"></i> Tambah Data
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
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Divisi</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->nik }}</td>
                                        <td>{{ $user->nama_lengkap }}</td>
                                        <td>{{ $user->divisi }}</td>
                                        <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success" wire:click="openEditModal({{ $user->id }})">
                                                <i class="feather feather-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" wire:click="confirmDelete({{ $user->id }})">
                                                <i class="feather feather-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data</td>
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
    <div class="modal fade" id="masterUserModal" tabindex="-1" aria-labelledby="masterUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="masterUserModalLabel">{{ $modalTitle }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="saveUser">
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="number" class="form-control @error('form.nik') is-invalid @enderror" id="nik" wire:model="form.nik" placeholder="Masukkan NIK">
                            @error('form.nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('form.nama_lengkap') is-invalid @enderror" id="nama_lengkap" wire:model="form.nama_lengkap" placeholder="Masukkan nama lengkap">
                            @error('form.nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="divisi" class="form-label">Divisi</label>
                            <select class="form-control @error('form.divisi') is-invalid @enderror" id="divisi" wire:model="form.divisi">
                                <option value="">Pilih</option>
                                <option value="IT">IT</option>
                                <option value="HRD">HRD</option>
                                <option value="ENG">ENG</option>
                            </select>
                            @error('form.divisi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" wire:click="saveUser">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('openModal', () => {
            $('#masterUserModal').modal('show');
        });

        Livewire.on('closeModal', () => {
            $('#masterUserModal').modal('hide');
        });

        Livewire.on('swal:confirm-delete', (id) => {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Master User ini akan dihapus secara permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteMasterUser', [id]);
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