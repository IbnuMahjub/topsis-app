@extends('dashboard.layouts.main')
@section('content')

<div class="mb-3">
  <a href="/units/create" class="btn btn-primary">
     Add unit
  </a>
</div>

<div class="card">
  <div class="card-body">
     <div class="table-responsive">
        <table id="example" class="table table-bordered" style="width:100%">
           <thead>
              <tr>
                 <th>Name property</th>
                 <th>harga_unit</th>
                 <th>Tipe Unit</th>
                 <th>Action</th>
              </tr>
           </thead>
           <tbody>
              {{-- @foreach ($units as $item)
              <tr id="unit-{{ $item['id'] }}">
                 <td>{{ $item['property']['name'] }}</td>
                 <td>{{ $item['harga_unit'] }}</td>
                 <td>{{ $item['tipe'] }}</td>
                 <td class="d-flex">
                  <a href="/unit/{{ $item['id'] }}/edit" class="btn btn-warning btn-sm me-2">
                    <span data-feather="edit"></span> Edit
                  </a>
                  <a href="/unit/{{ $item['id'] }}" class="btn btn-primary btn-sm me-2">Detail</a>
                  <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item['id'] }})">
                    <span data-feather="x-circle"></span> Hapus
                  </button>
                </td>
              </tr>
              @endforeach --}}
           </tbody>
        </table>
     </div>
  </div>
</div>


@section('scripts')
<script>
  
</script>
@endsection

@endsection
