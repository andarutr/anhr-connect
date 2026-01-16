<div>
    <div class="widget-list mt-5">
        <div class="row">
            <div class="widget-holder col-md-12">
                <div class="widget-bg">
                    <div class="widget-heading widget-heading-border">
                        <h5 class="widget-title" style="display: flex; align-items: center; gap: 0.5rem;">Data Employee @livewire('partials.badge-jumlah-employee')</h5>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info alert-dismissible fade show mb-4" role="alert">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Perhatian!</strong> Untuk melakukan <strong>Hapus</strong> data, silakan hubungi Department IT.
                                </div>
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h6>Employee</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Lengkap</th>
                                                    <th>NIK</th>
                                                    <th>Email</th>
                                                    <th>Posisi</th>
                                                    <th>Dept</th>
                                                    <th>Hire Date</th>
                                                    <th>Hire By</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($employees as $employee)
                                                <tr class="animate__animated animate__fadeIn">
                                                    <td>{{ $employee->nama_lengkap }}</td>
                                                    <td>{{ $employee->nik }}</td>
                                                    <td>{{ $employee->email }}</td>
                                                    <td>{{ $employee->position }}</td>
                                                    <td>{{ $employee->department }}</td>
                                                    <td>{{ Carbon\Carbon::parse($employee->hire_date)->format('d/m/Y') }}</td>
                                                    <td>{{ $employee->hire_by }}</td>
                                                    <td>{{ $employee->status }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-success" wire:click="editModal({{ $employee->id }})">
                                                            <i class="feather feather-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                                @if($employees->isEmpty())
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

    @if($showEditModal)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Department</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" 
                                class="form-control @error('nik') is-invalid @enderror" 
                                wire:model="nik"
                                placeholder="Masukkan NIK">
                            @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-control @error('department') is-invalid @enderror" wire:model="department">
                                <option value="">Pilih Department</option>
                                <option value="IT">IT</option>
                                <option value="HRD">HRD</option>
                            </select>
                            @error('department') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                        <button type="button" class="btn btn-primary" wire:click="updateDepartment">Update</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>