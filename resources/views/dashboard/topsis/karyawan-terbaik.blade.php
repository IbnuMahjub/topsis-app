@extends('dashboard.layouts.main')

@section('content')
<div class="card p-4">
    <h4 class="fw-bold mb-3">Riwayat Hasil Perhitungan TOPSIS</h4>

    @if($semuaHasil->isEmpty())
        <p>Belum ada hasil perhitungan TOPSIS.</p>
    @else
        @foreach($semuaHasil as $hasil)
            <div class="card mb-4 border">
                <div class="card-body">
                    <h5 class="mb-2 text-primary">{{ $hasil->nama_terbaik }} <small class="text-muted">({{ $hasil->created_at->format('d M Y H:i') }})</small></h5>
                    <p>Nilai Preferensi: <strong>{{ number_format($hasil->nilai_preferensi, 4) }}</strong></p>

                    {{-- Chart --}}
                    <canvas id="chart-{{ $hasil->id }}" height="100" class="mb-3"></canvas>

                    {{-- Detail --}}
                    <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#log-{{ $hasil->id }}">
                        Lihat Detail
                    </button>
                    <div class="collapse mt-3" id="log-{{ $hasil->id }}">
                        <div class="bg-light p-3 border rounded" style="overflow-x:auto;">
                            {!! $hasil->log_perhitungan !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection

@section('scripts')
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    @foreach($semuaHasil as $hasil)
    (function() {
        const logHTML = {!! json_encode($hasil->log_perhitungan) !!}; // lebih aman
        const parser = new DOMParser();
        const doc = parser.parseFromString(logHTML, 'text/html');
        const heading = Array.from(doc.querySelectorAll('h5')).find(h => h.textContent.includes('Hasil Akhir'));
        if (!heading) return;

        const ul = heading.nextElementSibling;
        if (!ul || ul.tagName !== 'UL') return;

        const labels = [];
        const data = [];

        ul.querySelectorAll('li').forEach(li => {
            const nama = li.querySelector('b')?.textContent.trim() || '';
            const match = li.textContent.match(/([0-9.]+)$/);
            const nilai = match ? parseFloat(match[1]) : 0;
            if (nama && !isNaN(nilai)) {
                labels.push(nama);
                data.push(nilai);
            }
        });

        console.log("Chart untuk ID {{ $hasil->id }}:", labels, data); // debug

        if (labels.length && data.length) {
            const canvas = document.getElementById('chart-{{ $hasil->id }}');
            if (!canvas) return;
            const ctx = canvas.getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Nilai Preferensi',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 1
                        }
                    }
                }
            });
        }
    })();
    @endforeach
});
</script>
@endsection

@endsection
