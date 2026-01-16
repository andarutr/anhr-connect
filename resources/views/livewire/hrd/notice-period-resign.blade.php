<div>
    <div class="widget-list mt-5">
        <div class="row">
            <div class="widget-holder col-md-12">
                <div class="widget-bg">
                    <div class="widget-heading widget-heading-border">
                        <h5 class="widget-title" style="display: flex; align-items: center; gap: 0.5rem;">Data Notice Period @livewire('partials.badge-jumlah-resign', ['status' => 'approved'], key('approved'))</h5>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h6>Notice Period</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Lengkap</th>
                                                    <th>Nik</th>
                                                    <th>Email</th>
                                                    <th>Position</th>
                                                    <th>Dept</th>
                                                    <th>Last Day</th>
                                                    <th>Paklaring</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($resigns as $re)
                                                @php
                                                    $lastDay = \Carbon\Carbon::parse($re->employee->resign_at)->addDays(30);
                                                    $now = \Carbon\Carbon::now();
                                                    $canDownload = $now->gte($lastDay);
                                                @endphp
                                                <tr class="animate__animated animate__fadeIn">
                                                    <td>{{ $re->employee->nama_lengkap }}</td>
                                                    <td>{{ $re->employee->nik }}</td>
                                                    <td>{{ $re->employee->email }}</td>
                                                    <td>{{ $re->employee->position }}</td>
                                                    <td>{{ $re->employee->department }}</td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($re->employee->resign_at)->addDays(30)->format('d M Y') }}
                                                    </td>
                                                    <td>
                                                        @if($canDownload)
                                                            <button 
                                                                class="btn btn-sm btn-primary" 
                                                                wire:click="downloadPaklaring({{ $re->id }})"
                                                                title="Download Paklaring">
                                                                <i class="feather feather-download"></i> Download
                                                            </button>
                                                        @else
                                                            <span class="text-muted">Tersedia {{ $lastDay->format('d M Y') }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                                @if($resigns->isEmpty())
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
</div>