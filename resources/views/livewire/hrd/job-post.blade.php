<div>
    <div class="widget-list mt-5">
        <div class="row">
            <div class="widget-holder col-md-12">
                <div class="widget-bg">
                    <div class="widget-heading widget-heading-border">
                        <h5 class="widget-title">Job Posting</h5>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h6>Create New Job Posting</h6>
                                    </div>
                                    <div class="card-body">
                                        @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                        @endif

                                        <form wire:submit="store">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pekerjaan">Pekerjaan *</label>
                                                        <input type="text"
                                                            class="form-control @error('pekerjaan') is-invalid @enderror"
                                                            id="pekerjaan" wire:model="form.pekerjaan"
                                                            placeholder="Enter job title">
                                                        @error('form.pekerjaan') <div class="invalid-feedback">
                                                            {{ $message }}</div> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="divisi">Divisi *</label>
                                                        <select
                                                            class="form-control @error('divisi') is-invalid @enderror"
                                                            id="divisi" wire:model="form.divisi">
                                                            <option value="">Pilih Divisi</option>
                                                            <option value="IT">IT</option>
                                                            <option value="HRD">HRD</option>
                                                        </select>
                                                        @error('form.divisi') <div class="invalid-feedback">
                                                            {{ $message }}</div> @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tipe_pekerjaan">Tipe Pekerjaan *</label>
                                                        <select
                                                            class="form-control @error('tipe_pekerjaan') is-invalid @enderror"
                                                            id="tipe_pekerjaan" wire:model="form.tipe_pekerjaan">
                                                            <option value="">Pilih Tipe</option>
                                                            <option value="Fulltime">Fulltime</option>
                                                            <option value="Contract">Contract</option>
                                                            <option value="Parttime">Parttime</option>
                                                            <option value="Internship">Internship</option>
                                                        </select>
                                                        @error('form.tipe_pekerjaan') <div class="invalid-feedback">
                                                            {{ $message }}</div> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="close_post">Close Post *</label>
                                                        <input type="date"
                                                            class="form-control @error('close_post') is-invalid @enderror"
                                                            id="close_post" wire:model="form.close_post">
                                                        @error('form.close_post') <div class="invalid-feedback">
                                                            {{ $message }}</div> @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="start_salary">Start Salary</label>
                                                        <input type="number"
                                                            class="form-control @error('start_salary') is-invalid @enderror"
                                                            id="start_salary" wire:model="form.start_salary"
                                                            placeholder="Enter minimum salary">
                                                        @error('form.start_salary') <div class="invalid-feedback">
                                                            {{ $message }}</div> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="end_salary">End Salary</label>
                                                        <input type="number"
                                                            class="form-control @error('end_salary') is-invalid @enderror"
                                                            id="end_salary" wire:model="form.end_salary"
                                                            placeholder="Enter maximum salary">
                                                        @error('form.end_salary') <div class="invalid-feedback">
                                                            {{ $message }}</div> @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan *</label>
                                                <textarea 
                                                    class="form-control @error('form.deskripsi_pekerjaan') is-invalid @enderror"
                                                    id="deskripsi_pekerjaan" 
                                                    wire:model="form.deskripsi_pekerjaan"
                                                    rows="5"
                                                    placeholder="Masukkan deskripsi pekerjaan...">
                                                </textarea>
                                                @error('form.deskripsi_pekerjaan') <div class="text-danger">
                                                    {{ $message }}</div> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="syarat">Syarat *</label>
                                                <textarea 
                                                    class="form-control @error('form.syarat') is-invalid @enderror"
                                                    id="syarat" 
                                                    wire:model="form.syarat"
                                                    rows="5"
                                                    placeholder="Masukkan syarat-syarat...">
                                                </textarea>
                                                @error('form.syarat') <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="benefit">Benefit *</label>
                                                <textarea 
                                                    class="form-control @error('form.benefit') is-invalid @enderror"
                                                    id="benefit" 
                                                    wire:model="form.benefit"
                                                    rows="5"
                                                    placeholder="Masukkan benefit...">
                                                </textarea>
                                                @error('form.benefit') <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
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
