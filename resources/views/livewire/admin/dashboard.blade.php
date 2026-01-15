<div>
    <div class="widget-list mt-5">
        <div class="row">
            <div class="widget-holder col-md-12">
                <div class="widget-bg">
                    <div class="widget-heading widget-heading-border">
                        <h5 class="widget-title">Dashboard Admin Management</h5>
                    </div>
                    <div class="widget-body">
                        <!-- Cards Statistik -->
                        <div class="row mb-4">
                            <div class="col-md-4 mb-3">
                                <div class="card bg-primary text-white text-center animate__animated animate__fadeInUp">
                                    <div class="card-body">
                                        <h3 class="mb-0 text-white" style="font-weight: bold">{{ $totalUsers }}</h3>
                                        <p class="mb-0">Total Users</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card bg-success text-white text-center animate__animated animate__fadeInUp" style="animation-delay: 0.1s">
                                    <div class="card-body">
                                        <h3 class="mb-0 text-white" style="font-weight: bold">{{ $totalCompanies }}</h3>
                                        <p class="mb-0">Total Company MCU</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card bg-info text-white text-center animate__animated animate__fadeInUp" style="animation-delay: 0.2s">
                                    <div class="card-body">
                                        <h3 class="mb-0 text-white" style="font-weight: bold">{{ $totalInterviews }}</h3>
                                        <p class="mb-0">Total User Interview</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tabel Data Terbaru -->
                        <div class="row">
                            <!-- Latest Users -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6>Users Terbaru</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>CreatedAt</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($latestUsers as $user)
                                                    <tr>
                                                        <td>{{ Str::limit($user->name, 15) }}</td>
                                                        <td>{{ Str::limit($user->email, 15) }}</td>
                                                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                                    </tr>
                                                @empty
                                                    <tr><td colspan="3" class="text-center">Tidak ada data</td></tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Latest Companies -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6>Company MCU Terbaru</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($latestCompanies as $company)
                                                    <tr>
                                                        <td>{{ Str::limit($company->name, 15) }}</td>
                                                        <td>{{ $company->location ?? '-' }}</td>
                                                    </tr>
                                                @empty
                                                    <tr><td colspan="3" class="text-center">Tidak ada data</td></tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Latest Interviews -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6>User Interview Terbaru</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nik</th>
                                                    <th>Nama</th>
                                                    <th>Divisi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($latestInterviews as $interview)
                                                    <tr>
                                                        <td>{{ $interview->nik ?? '-' }}</td>
                                                        <td>{{ $interview->nama_lengkap ?? '-' }}</td>
                                                        <td>{{ $interview->divisi ?? '-' }}</td>
                                                    </tr>
                                                @empty
                                                    <tr><td colspan="3" class="text-center">Tidak ada data</td></tr>
                                                @endforelse
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
</div>