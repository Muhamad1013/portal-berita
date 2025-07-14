@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
        @php use Illuminate\Support\Facades\Storage; @endphp
        <h5 class="mb-3 fw-bold text-danger fs-4">Dashboard Admin</h5>
        <div class="container-fluid">
            {{-- Kartu Statistik --}}
            <div class="row mb-4">
                @php
                    $cards = [
                        ['label' => 'Total Berita', 'count' => $totalBerita, 'icon' => 'bi-newspaper', 'route' => route('admin.news.index')],
                        ['label' => 'Total Kategori', 'count' => $totalKategori, 'icon' => 'bi-tags', 'route' => route('admin.categories.index')],
                        ['label' => 'Total Pengguna', 'count' => $totalPengguna, 'icon' => 'bi-people', 'route' => route('admin.users.index')],
                    ];
                @endphp

                @foreach ($cards as $card)
                    <div class="col-md-4 mb-3">
                        <a href="{{ $card['route'] }}" class="text-decoration-none">
                            <div class="rounded shadow-sm p-4 h-100 bg-white hover-card border border-light-subtle">
                                <div class="d-flex align-items-center justify-content-center mb-3">
                                    <i class="bi {{ $card['icon'] }} fs-2 text-danger me-2"></i>
                                </div>
                                <h5 class="fw-bold text-center text-dark">{{ $card['count'] }}</h5>
                                <p class="text-muted text-center">{{ $card['label'] }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Kategori, Perbandingan, Statistik & Berita Terbaru --}}
            <div class="row row-cols-1 row-cols-md-2 g-4 mb-4">
                {{-- 5 Kategori Paling Aktif --}}
                <div class="col">
                    <div class="bg-white p-4 rounded shadow-sm border border-light-subtle h-100">
                        <h6 class="fw-bold text-danger mb-4 fs-5">5 Kategori Paling Aktif</h6>
                        @forelse ($topKategori as $index => $kategori)
                            <div class="d-flex mb-3 align-items-center gap-3 p-3 hover-card">
                                <div class="fs-4 fw-bold text-danger mb-0">#{{ $index + 1 }}</div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold text-dark mb-1">{{ $kategori->name }}</h6>
                                    <p class="text-muted mb-0">Jumlah Berita: {{ $kategori->news_count }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">Belum ada data kategori.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Perbandingan Top 5 Kategori --}}
                <div class="col">
                    <div class="bg-white p-4 rounded shadow-sm border border-light-subtle h-100">
                        <h6 class="fw-bold text-danger mb-3 fs-5">Perbandingan Top 5 Kategori</h6>
                        <div class="m-4">
                            @foreach ($topKategori as $kategori)
                                @php $persen = round(($kategori->news_count / max($totalBerita, 1)) * 100, 1); @endphp
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-semibold text-dark">{{ $kategori->name }}</span>
                                        <span class="small text-muted">{{ $persen }}%</span>
                                    </div>
                                    <div class="progress" style="height: 0.75rem;">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                            style="width: {{ $persen }}%;" aria-valuenow="{{ $persen }}" aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- 5 Berita Terbaru --}}
                <div class="col">
                    <div class="bg-white p-4 rounded shadow-sm border border-light-subtle h-100">
                        <h6 class="fw-bold text-danger mb-4 fs-5">5 Berita Terbaru</h6>
                        <ul class="list-unstyled">
                            @forelse ($topBerita as $news)
                                <li class="mb-3">
                                    <a href="{{ route('admin.news.index') }}" class="text-decoration-none text-dark d-block">
                                        <span class="fw-semibold">{{ $news->title }}</span><br>
                                        <small class="text-muted">{{ $news->created_at->format('d M Y') }}</small>
                                    </a>
                                </li>
                            @empty
                                <p class="text-muted">Belum ada berita.</p>
                            @endforelse
                        </ul>
                    </div>
                </div>

                {{-- Statistik Tambahan Berita --}}
                <div class="col">
                    <div class="bg-white p-4 rounded shadow-sm border border-light-subtle h-100">
                        <h6 class="fw-bold text-danger mb-4 fs-5">Statistik Tambahan Berita</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">Total Berita: <span class="fw-bold text-dark">{{ $totalBerita }}</span></li>
                            <li class="mb-2">Hari Aktif Posting: <span class="fw-bold text-dark">{{ $beritaHarian->count() }}</span></li>
                            <li class="mb-2">Rata-rata Berita/Hari:
                                <span class="fw-bold text-dark">
                                    {{ $beritaHarian->count() > 0 ? round($totalBerita / $beritaHarian->count(), 1) : 0 }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            {{-- Visualisasi Data --}}
            <div class="bg-white rounded shadow-sm p-4 border border-light-subtle mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-danger mb-0 fs-4">Visualisasi Data</h5>
                    <div class="d-flex gap-2">
                        <select id="visualType" class="form-select form-select-sm w-auto">
                            <option value="kategori">Kategori</option>
                            <option value="berita">Berita</option>
                        </select>
                        <select id="chartType" class="form-select form-select-sm w-auto">
                            <option value="bar">Bar Chart</option>
                            <option value="pie">Pie Chart</option>
                        </select>
                        <button class="btn btn-sm btn-outline-danger" onclick="downloadChart()">
                            <i class="bi bi-download"></i> Unduh
                        </button>
                    </div>
                </div>
                <div style="height: 60vh;">
                    <canvas id="chart" style="width: 100%; height: 100%;"></canvas>
                </div>
            </div>
        </div>

        {{-- Chart JS --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('chart').getContext('2d');
            let chart;

            const dataKategori = {
                labels: {!! json_encode($beritaPerKategori->pluck('name')) !!},
                data: {!! json_encode($beritaPerKategori->pluck('news_count')) !!}
            };

            const dataBerita = {
                labels: {!! json_encode($beritaHarian->pluck('tanggal')) !!},
                data: {!! json_encode($beritaHarian->pluck('total')) !!}
            };

            function renderChart(type, dataset) {
                if (chart) chart.destroy();

                chart = new Chart(ctx, {
                    type: type,
                    data: {
                        labels: dataset.labels,
                        datasets: [{
                            label: 'Jumlah Berita',
                            data: dataset.data,
                            backgroundColor: [
                                '#6366F1', '#34D399', '#F59E0B', '#EF4444', '#10B981',
                                '#60A5FA', '#A78BFA', '#F472B6', '#F87171', '#FCD34D'
                            ],
                            fill: type === 'line',
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: type !== 'pie'
                            }
                        },
                        scales: type !== 'pie' ? {
                            y: {
                                beginAtZero: true,
                                ticks: { precision: 0 }
                            }
                        } : {}
                    }
                });
            }

            function downloadChart() {
                const a = document.createElement('a');
                a.href = chart.toBase64Image();
                a.download = 'visualisasi_berita.png';
                a.click();
            }

            document.getElementById('visualType').addEventListener('change', function () {
                const chartType = document.getElementById('chartType').value;
                const dataset = this.value === 'kategori' ? dataKategori : dataBerita;
                renderChart(chartType, dataset);
            });

            document.getElementById('chartType').addEventListener('change', function () {
                const visualType = document.getElementById('visualType').value;
                const dataset = visualType === 'kategori' ? dataKategori : dataBerita;
                renderChart(this.value, dataset);
            });

            // Render default chart
            renderChart('bar', dataKategori);
        </script>

        {{-- Hover Card --}}
        <style>
            .hover-card {
                transition: all 0.2s ease;
            }

            .hover-card:hover {
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
                transform: translateY(-5px);
            }
        </style>
@endsection
