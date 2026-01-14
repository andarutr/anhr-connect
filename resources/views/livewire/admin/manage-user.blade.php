<div>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-12">
                <h3 class="mb-3">Manajemen Pengguna</h3>
                <button class="btn btn-primary" wire:click="openCreateModal">
                    <i class="fas fa-plus"></i> Tambah User
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Admin?</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <span class="badge {{ $user->is_admin == 1 ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $user->is_admin == 1 ? 'Ya' : 'Tidak' }}
                                            </span>
                                        </td>
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
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">{{ $modalTitle }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="saveUser">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('form.name') is-invalid @enderror" id="name" wire:model="form.name" placeholder="Masukkan nama">
                            @error('form.name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('form.email') is-invalid @enderror" id="email" wire:model="form.email" placeholder="Masukkan email">
                            @error('form.email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password (Opsional)</label>
                            <input type="password" class="form-control @error('form.password') is-invalid @enderror" id="password" wire:model="form.password" placeholder="Kosongkan jika tidak ingin mengubah">
                            @error('form.password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="is_admin" class="form-label">Jadikan Admin?</label>
                            <select class="form-control @error('form.is_admin') is-invalid @enderror" id="is_admin" wire:model="form.is_admin">
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                            @error('form.is_admin') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
            $('#userModal').modal('show');
        });

        Livewire.on('closeModal', () => {
            $('#userModal').modal('hide');
        });

        Livewire.on('swal:confirm-delete', (id) => {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'User ini akan dihapus secara permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteUser', [id]);
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