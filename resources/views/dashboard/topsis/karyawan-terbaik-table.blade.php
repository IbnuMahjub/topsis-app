@extends('dashboard.layouts.main')

@section('content')
<div class="card p-4">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

  <h4 class="fw-bold mb-3">Riwayat Hasil Karyawan Terbaik TOPSIS</h4>

  @if($semuaHasil->isEmpty())
    <p>Belum ada hasil perhitungan yang disimpan.</p>
  @else
    @foreach($semuaHasil as $hasil)
    <div class="card mb-3 border border-primary">
        <div class="card-body">
        <div class="d-flex justify-content-between align-items-start">
            <div>
            <h5 class="card-title text-primary">{{ $hasil->nama_terbaik }}</h5>
            <p class="mb-1">Nilai Preferensi: <strong>{{ number_format($hasil->nilai_preferensi, 4) }}</strong></p>
            <p class="text-muted">Tanggal: {{ \Carbon\Carbon::parse($hasil->created_at)->format('d M Y H:i') }}</p>
            </div>
            @can('admin')
            <form method="POST" action="{{ route('topsis.destroy', $hasil->id) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
            @endcan
        </div>

        <button class="btn btn-sm btn-outline-primary mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#log-{{ $hasil->id }}">
            Lihat Detail
        </button>
        <div class="collapse mt-3" id="log-{{ $hasil->id }}">
            <div class="bg-light border p-3" style="overflow-x: auto;">
            {!! $hasil->log_perhitungan !!}
            </div>
        </div>
        </div>
    </div>
    @endforeach

  @endif
</div>
@endsection
