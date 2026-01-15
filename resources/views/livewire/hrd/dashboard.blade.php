<div>
    <div class="widget-list mt-5">
        <div class="row">
            <div class="widget-holder col-md-12">
                <div class="widget-bg">
                    <div class="widget-heading widget-heading-border">
                        <h5 class="widget-title">Dashboard HRD Recruitment</h5>
                    </div>
                    <div class="widget-body">
                        <div class="row mb-4">
                            <div class="col-md-2 mb-3">
                                <div class="card bg-primary text-white text-center animate__animated animate__fadeInUp">
                                    <div class="card-body">
                                        <h3 class="mb-0 text-white" style="font-weight: bold">{{ $stats['total'] }}</h3>
                                        <p class="mb-0">Total Pelamar</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="card bg-secondary text-white text-center animate__animated animate__fadeInUp" style="animation-delay: 0.1s">
                                    <div class="card-body">
                                        <h3 class="mb-0 text-white" style="font-weight: bold">{{ $stats['screening'] }}</h3>
                                        <p class="mb-0">Screening</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="card bg-warning text-white text-center animate__animated animate__fadeInUp" style="animation-delay: 0.2s">
                                    <div class="card-body">
                                        <h3 class="mb-0 text-white" style="font-weight: bold">{{ $stats['interview_hrd'] }}</h3>
                                        <p class="mb-0">Interview HRD</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="card bg-info text-white text-center animate__animated animate__fadeInUp" style="animation-delay: 0.3s">
                                    <div class="card-body">
                                        <h3 class="mb-0 text-white" style="font-weight: bold">{{ $stats['interview_user'] }}</h3>
                                        <p class="mb-0">Interview User</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="card bg-purple text-white text-center animate__animated animate__fadeInUp" style="animation-delay: 0.4s; background-color: #6f42c1;">
                                    <div class="card-body">
                                        <h3 class="mb-0 text-white" style="font-weight: bold">{{ $stats['psikotest'] }}</h3>
                                        <p class="mb-0">Psikotest</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="card bg-orange text-white text-center animate__animated animate__fadeInUp" style="animation-delay: 0.5s; background-color: #fd7e14;">
                                    <div class="card-body">
                                        <h3 class="mb-0 text-white" style="font-weight: bold">{{ $stats['technical_test'] }}</h3>
                                        <p class="mb-0">Technical Test</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="card bg-teal text-white text-center animate__animated animate__fadeInUp" style="animation-delay: 0.6s; background-color: #20c997;">
                                    <div class="card-body">
                                        <h3 class="mb-0 text-white" style="font-weight: bold">{{ $stats['mcu'] }}</h3>
                                        <p class="mb-0">MCU</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="card bg-blue text-white text-center animate__animated animate__fadeInUp" style="animation-delay: 0.7s; background-color: #0dcaf0;">
                                    <div class="card-body">
                                        <h3 class="mb-0 text-white" style="font-weight: bold">{{ $stats['on_boarding'] }}</h3>
                                        <p class="mb-0">On Boarding</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="card bg-success text-white text-center animate__animated animate__fadeInUp" style="animation-delay: 0.8s">
                                    <div class="card-body">
                                        <h3 class="mb-0 text-white" style="font-weight: bold">{{ $stats['hired'] }}</h3>
                                        <p class="mb-0">Diterima</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="card bg-danger text-white text-center animate__animated animate__fadeInUp" style="animation-delay: 0.9s">
                                    <div class="card-body">
                                        <h3 class="mb-0 text-white" style="font-weight: bold">{{ $stats['rejected'] }}</h3>
                                        <p class="mb-0">Ditolak</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h6>Pelamar Terbaru</h6>
                                        <a href="/hrd/candidate/apply" class="btn btn-sm btn-primary">Lihat Semua</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Posisi</th>
                                                    <th>Tanggal Apply</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($latestCandidates as $candidate)
                                                <tr class="animate__animated animate__fadeIn">
                                                    <td>{{ $candidate->nama_lengkap }}</td>
                                                    <td>{{ $candidate->posisi_dilamar }}</td>
                                                    <td>{{ $candidate->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        <span class="badge 
                                                            @switch($candidate->status)
                                                                @case('hired') badge-success @break
                                                                @case('interview_hrd') badge-warning @break
                                                                @case('interview_user') badge-info @break
                                                                @case('rejected') badge-danger @break
                                                                @case('screening') badge-secondary @break
                                                                @default badge-secondary
                                                            @endswitch">
                                                            {{ ucfirst(str_replace('_', ' ', $candidate->status)) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">Belum ada data pelamar</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h6>Statistik Proses (30 Hari Terakhir)</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="recruitmentChart" height="150"></canvas>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('recruitmentChart').getContext('2d');
    
    const chartData = @json($chartData);

    new Chart(ctx, {
        type: 'bar', 
        data: chartData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                tooltip: {
                    enabled: true,
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.parsed.y;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
});
</script>