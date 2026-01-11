<div>
    <div class="navbar-header text-center mt-2 mb-4">
        <img src="/assets/img/logo_andaru.webp" class="img-fluid" width="150">
        <h5>Apply Lamaran Kamu</h5>
        <h3>PT. Andaru Triadi Ceria Sejahtera</h3>
    </div>
    
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-shield-alt me-2"></i>
        Data Anda aman dan terlindungi. Pastikan semua informasi terisi dengan benar.
    </div>

    <form wire:submit="store">
        <div class="form-group">
            <label>Posisi *</label>
            <input class="form-control" type="text" wire:model="form.posisi_dilamar">
            @error('form.posisi_dilamar') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Nama Lengkap *</label>
            <input class="form-control" type="text" wire:model="form.nama_lengkap">
            @error('form.nama_lengkap') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Nama Panggilan *</label>
            <input class="form-control" type="text" wire:model="form.nama_panggilan">
            @error('form.nama_panggilan') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Umur *</label>
            <input class="form-control" type="number" wire:model="form.umur">
            @error('form.umur') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Domisili *</label>
            <input class="form-control" type="text" wire:model="form.domisili">
            @error('form.domisili') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Alamat Rumah *</label>
            <input class="form-control" type="text" wire:model="form.alamat_rumah">
            @error('form.alamat_rumah') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>RT *</label>
            <input class="form-control" type="number" wire:model="form.rt">
            @error('form.rt') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>RW *</label>
            <input class="form-control" type="number" wire:model="form.rw">
            @error('form.rw') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Kelurahan *</label>
            <input class="form-control" type="text" wire:model="form.kelurahan">
            @error('form.kelurahan') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Kecamatan *</label>
            <input class="form-control" type="text" wire:model="form.kecamatan">
            @error('form.kecamatan') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>No. KTP *</label>
            <input class="form-control" type="number" wire:model="form.no_ktp">
            @error('form.no_ktp') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>No. KK *</label>
            <input class="form-control" type="number" wire:model="form.no_kk">
            @error('form.no_kk') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Email Aktif*</label>
            <input class="form-control" type="email" wire:model="form.email">
            @error('form.email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Pendidikan Terakhir *</label>
            <select class="form-control" wire:model="form.pendidikan_terakhir">
                <option value="">Pilih</option>
                <option value="SMA">SMA</option>
                <option value="SMK">SMK</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
            </select>
            @error('form.pendidikan_terakhir') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Universitas / Sekolah *</label>
            <input class="form-control" type="text" wire:model="form.universitas">
            @error('form.universitas') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Ekspektasi Gaji *</label>
            <input class="form-control" type="number" wire:model="form.ekspektasi_gaji">
            @error('form.ekspektasi_gaji') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>CV Terbaru *</label>
            <input class="form-control" type="file" wire:model="form.cv_terbaru">
            @error('form.cv_terbaru') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>SKCK Terbaru *</label>
            <input class="form-control" type="file" wire:model="form.skck_terbaru">
            @error('form.skck_terbaru') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Surat Sehat *</label>
            <input class="form-control" type="file" wire:model="form.ket_sehat_terbaru">
            @error('form.ket_sehat_terbaru') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group text-center no-gutters mb-4">
            <button type="submit" class="btn btn-block btn-lg btn-primary text-uppercase fs-12 fw-600">APPLY</button>
        </div>
    </form>

    <footer class="col-sm-12 text-center">
        <hr>
        <p>Sudah Apply Lamaran? <a href="/track-apply" class="text-primary m-l-5"><b>Lacak Lamaran Kamu!</b></a>
        </p>
    </footer>
</div>