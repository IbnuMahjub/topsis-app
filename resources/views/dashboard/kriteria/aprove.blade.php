@extends('dashboard.layouts.main')

@section('content')
<div class="card">
  <div class="card-body">
     <div class="table-responsive">
        <table id="example" class="table table-bordered" style="width:100%">
           <thead>
              <tr>
                 <th>Name Karyawan</th>
                 <th>nilai_preferensi</th>
                 <th>Status</th>
                 {{-- <th>Aksi</th> --}}
              </tr>
           </thead>
           <tbody>
              @foreach ($data as $item)
              <tr id="karyawan-{{ $item->id }}">
                 <td>{{ $item->nama_terbaik }}</td>
                 <td>{{ $item->nilai_preferensi  }}</td>
                 <td>
                    @if ($item->status == 1)
                      <span class="badge bg-success">Approved</span>
                    @else
                      <form action="{{ route('topsis.updateStatus', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                          <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>Not Approved</option>
                            <option value="1">Approved</option>
                          </select>
                        </div>
                      </form>
                    @endif
                  </td>
                  
              @endforeach
           </tbody>
        </table>
     </div>
  </div>
</div>


@section('scripts')
<script>
  $(document).ready(function() {
    var table = $('#example').DataTable();

  });
</script>
@endsection

@endsection
