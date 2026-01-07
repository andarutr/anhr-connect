<div>
    <div class="row container-min-full-height">
        <div class="col-lg-12 p-3 login-left">
            <div class="w-50">
                <center>
                    <img src="/assets/img/logo_andaru.webp" class="img-fluid" width="80">
                </center>
                <h2 class="mb-4 text-center">Login</h2>
                <form class="text-center" wire:submit="login">
                    @error('login') 
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fas fa-shield-alt me-2"></i>
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label class="text-muted">Email</label>
                        <input type="text" class="form-control form-control-line" wire:model="email" placeholder="Masukkan Email">
                        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="example-password">Password</label>
                        <input type="password" class="form-control form-control-line" wire:model="password" placeholder="Masukkan Password">
                        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mr-b-20">
                        <button type="submit" class="btn btn-block btn-rounded btn-md btn-primary text-uppercase fw-600 ripple">Masuk</button>
                    </div>
                </form>
                
                <div class="form-group no-gutters mb-5 text-center">
                    <span onClick="showForgotPasswordModal()" id="to-recover" class="text-muted fw-700 text-uppercase heading-font-family fs-12">
                        Forgot Password?
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showForgotPasswordModal(){
        Swal.fire({
            title: 'Forgot Password',
            html: 'Silahkan hubungi email admin untuk reset password:<br><strong>admin@domain.test</strong>',
            icon: 'info',
            confirmButtonText: 'Tutup'
        });
    }
</script>