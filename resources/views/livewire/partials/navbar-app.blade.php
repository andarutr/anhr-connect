<div>
    <nav class="navbar">
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand">
                <img class="logo-expand" alt="" src="/assets/img/logo_andaru.webp" width="50"> <br>
                <img class="logo-collapse" alt="" src="/assets/img/logo_andaru.webp">
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li class="sidebar-toggle dropdown"><a href="javascript:void(0)" class="ripple"><i
                        class="feather feather-menu list-icon fs-20"></i></a>
            </li>
        </ul>
        <form class="navbar-search d-none d-sm-block" role="search"><i class="feather feather-search list-icon"></i>
            <input type="search" class="search-query" placeholder="Search anything..."> <a
                href="javascript:void(0);" class="remove-focus"><i class="feather feather-x"></i></a>
        </form>
        <div class="spacer"></div>
        <ul class="nav navbar-nav d-none d-lg-flex ml-2 ml-0-rtl">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="feather feather-bell list-icon"></i> <span class="button-pulse bg-danger"></span></a>
                <div class="dropdown-menu dropdown-left dropdown-card animated flipInY">
                    <div class="card">
                        <header class="card-header d-flex justify-content-between mb-0"><a
                                href="javascript:void(0);"><i class="feather feather-bell color-primary"
                                    aria-hidden="true"></i></a> <span
                                class="heading-font-family flex-1 text-center fw-400">Notifications</span> <a
                                href="javascript:void(0);"><i
                                    class="feather feather-settings color-content"></i></a>
                        </header>
                        <ul class="card-body list-unstyled dropdown-list-group">
                            <li><a href="#" class="media"><span class="d-flex"><i
                                            class="material-icons list-icon">check</i> </span><span
                                        class="media-body"><span
                                            class="heading-font-family media-heading">Invitation accepted</span>
                                        <span class="media-content">Your have been Invited ...</span></span></a>
                            </li>
                        </ul>
                        <footer class="card-footer text-center"><a href="javascript:void(0);"
                                class="headings-font-family text-uppercase fs-13">See all activity</a>
                        </footer>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-user ripple"
                    data-toggle="dropdown"><span class="avatar thumb-xs2"><img src="/assets/demo/users/user1.jpg"
                            class="rounded-circle" alt=""> <i
                            class="feather feather-chevron-down list-icon"></i></span></a>
                <div class="dropdown-menu dropdown-left dropdown-card dropdown-card-profile animated flipInY">
                    <div class="card">
                        <ul class="list-unstyled card-body">
                            <li><a href="#"><span><span class="align-middle">Haloo {{ $name }}</span></span></a>
                            <li><a href="#" wire:click.prevent="openChangePasswordModal"><span><span class="align-middle">Change Password</span></span></a>
                            </li>
                            <li><a href="#" wire:click.prevent="logout"><span><span class="align-middle">Sign Out</span></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </nav>

    <div wire:ignore.self class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Ganti Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeChangePasswordModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit="updatePassword">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="old_password">Password Lama</label>
                            <input type="password" class="form-control" id="old_password" wire:model="old_password" placeholder="Masukkan password lama">
                            @error('old_password') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input type="password" class="form-control" id="new_password" wire:model="new_password" placeholder="Masukkan password baru">
                            @error('new_password') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="new_password_confirmation" wire:model="new_password_confirmation" placeholder="Ulangi password baru">
                            @error('new_password_confirmation') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeChangePasswordModal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('showChangePasswordModal', function() {
        $('#changePasswordModal').modal('show');
    });
    
    window.addEventListener('closeChangePasswordModal', function() {
        $('#changePasswordModal').modal('hide');
    });
</script>