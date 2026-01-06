<div>
    <p>Semua data otomatis akan tersimpan. Pastikan semua data terisi ya...</p>
    <form wire:submit="store">
        <div class="form-group">
            <label>Posisi</label>
            <input class="form-control" type="text" wire:model="posisi_dilamar">
            @error('posisi_dilamar') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input class="form-control" type="text" wire:model="nama_lengkap">
            @error('nama_lengkap') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Nama Panggilan</label>
            <input class="form-control" type="text" wire:model="nama_panggilan">
            @error('nama_panggilan') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Umur</label>
            <input class="form-control" type="number" wire:model="umur">
            @error('umur') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Alamat Rumah</label>
            <input class="form-control" type="text" wire:model="alamat_rumah">
            @error('alamat_rumah') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>RT</label>
            <input class="form-control" type="text" wire:model="rt">
            @error('rt') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>RW</label>
            <input class="form-control" type="text" wire:model="rw">
            @error('rw') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Kelurahan</label>
            <input class="form-control" type="text" wire:model="kelurahan">
            @error('kelurahan') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Kecamatan</label>
            <input class="form-control" type="text" wire:model="kecamatan">
            @error('kecamatan') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>No. KTP</label>
            <input class="form-control" type="number" wire:model="no_ktp">
            @error('no_ktp') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>No. KK</label>
            <input class="form-control" type="number" wire:model="no_kk">
            @error('no_kk') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="email" wire:model="email">
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>CV Terbaru</label>
            <input class="form-control" type="file" wire:model="cv_terbaru">
            @error('cv_terbaru') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>SKCK Terbaru</label>
            <input class="form-control" type="file" wire:model="skck_terbaru">
            @error('skck_terbaru') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Surat Sehat</label>
            <input class="form-control" type="file" wire:model="ket_sehat_terbaru">
            @error('ket_sehat_terbaru') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group text-center no-gutters mb-4">
            <button type="submit" class="btn btn-block btn-lg btn-primary text-uppercase fs-12 fw-600">APPLY</button>
        </div>
    </form>
</div>