<div>
    <div class="navbar-header text-center mt-2 mb-4">
        <img src="/assets/img/logo_andaru.webp" class="img-fluid" width="150">
        <h5>Pengajuan Surat Resign</h5>
        <h3>PT. Andaru Triadi Ceria Sejahtera</h3>
    </div>

    <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <div class="input-group">
            <input type="text" 
                    id="nik" 
                    wire:model="nik" 
                    class="form-control @error('nik') is-invalid @enderror"
                    placeholder="Masukkan NIK Anda">
            <button type="button" class="btn btn-outline-secondary" wire:click="searchEmployee">Check</button>
        </div>
        @error('nik')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    @if($employee && $isEmployeeFound)
        <div class="alert alert-info">
            <strong>Ditemukan:</strong> {{ $employee->nama_lengkap }} - {{ $employee->position }}
        </div>
    @endif

    @if($isEmployeeFound)
        <form wire:submit="submit">
            <div class="mb-3">
                <label for="resignFile" class="form-label">Upload Pengajuan Resign (PDF)</label>
                <input type="file" 
                        id="resignFile" 
                        wire:model="resignFile" 
                        accept=".pdf"
                        class="form-control @error('resignFile') is-invalid @enderror">
                @error('resignFile')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endif

    @if(session('message'))
        <div class="alert alert-success mt-3">{{ session('message') }}</div>
    @endif
</div>