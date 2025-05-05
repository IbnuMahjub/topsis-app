@extends('dashboard.layouts.main')

@section('content')

<div class="mb-3">
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#karyawanModal" id="createCategoryBtn">
    Add Employe
  </button>
</div>

<div class="card">
  <div class="card-body">
     <div class="table-responsive">
        <table id="example" class="table table-bordered" style="width:100%">
           <thead>
              <tr>
                 <th>Name Employee</th>
                 <th>Email</th>
                 <th>Jabatan</th>
                 <th>Aksi</th>
              </tr>
           </thead>
           <tbody>
              @foreach ($karyawan as $item)
              <tr id="karyawan-{{ $item->id }}">
                 <td>{{ $item->name }}</td>
                 <td>{{ $item->email }}</td>
                 <td>{{ $item->jabatan }}</td>
                 <td class="d-flex">
                  {{-- Edit Button --}}
                  <a href="javascript:void(0)" class="btn btn-warning btn-sm me-2" onclick="editKaryawan({{ $item->id }})">
                    <span data-feather="edit"></span> Edit
                  </a>
                  
                  {{-- Delete Button --}}
                    <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id  }})">
                      <span data-feather="x-circle"></span> Hapus
                    </button>
                </td>
              </tr>
              @endforeach
           </tbody>
        </table>
     </div>
  </div>
</div>

{{-- Add Category Modal --}}
<div class="modal fade" id="karyawanModal" tabindex="-1" aria-labelledby="karyawanModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="karyawanModalLabel">Add Employe</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="employeeForm">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveEmployeeBtn">Save Karyawan</button>
      </div>
    </div>
  </div>
</div>

{{-- Edit Category Modal --}}
<div class="modal fade" id="editKaryawanModal" tabindex="-1" aria-labelledby="editKaryawanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="editKaryawanModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editKaryawanForm" method="POST"> <!-- Method tetap POST -->
          @csrf
          <input type="hidden" name="_method" value="PUT"> 
          <input type="hidden" name="id" id="edit_karyawan_id">

          <div class="mb-3">
            <label for="edit_name" class="form-label">Name</label>
            {{-- <input type="text" class="form-control" id="name" name="name"> --}}
            <input type="text" class="form-control" id="edit_name" name="name">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            {{-- <input type="email" class="form-control" id="email" name="email"> --}}
            <input type="email" class="form-control" id="edit_email" name="email">
          </div>
          <div class="mb-3">
            <label for="jabatan" class="form-label">jabatan</label>
            {{-- <input type="text" class="form-control" id="jabatan" name="jabatan"> --}}
            <input type="text" class="form-control" id="edit_jabatan" name="jabatan">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Update Employee</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@section('scripts')
<script>
  $(document).ready(function() {
    var table = $('#example').DataTable();

    $('#saveEmployeeBtn').on('click', function() {
      var name = $('#name').val();
      var email = $('#email').val();
      var jabatan = $('#jabatan').val();

      $.ajax({
        url: '{{ route("karyawan.store") }}',
        type: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          name: name,
          email: email,
          jabatan: jabatan
        },
        success: function(response) {
          if (response.success) {
            console.log("Response from API:", response);
            table.row.add([
              response.data.name,  
              response.data.email, 
              response.data.jabatan, 
              '<a href="javascript:void(0)" class="btn btn-warning btn-sm me-2" onclick="editKaryawan(' + response.data.id + ')">Edit</a>' +
              '<button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(' + response.data.id + ')">Delete</button>'
            ]).draw();  

            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: response.message,
                confirmButtonText: 'OK'
            });

            $('#karyawanModal').modal('hide');
            $('#employeeForm')[0].reset();
          } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: response.message,
                confirmButtonText: 'OK'
            }); 
          }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: response.message,
                confirmButtonText: 'OK'
            });
        }
      });
    });

    window.editKaryawan = function(id) {
      $.ajax({
        url: '/karyawan/' + id + '/edit', 
        type: 'GET',
        success: function(response) {
          console.log("Response from API:", response);
          if (response) {
          $('#edit_karyawan_id').val(response.id);
          $('#edit_name').val(response.name);
          $('#edit_email').val(response.email);
          $('#edit_jabatan').val(response.jabatan);

            $('#editKaryawanModal').modal('show');
          } else {
            // console.error(response.message);
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to fetch category details.',
            });
          }
        },
        error: function() {
          Swal.fire({
              icon: 'error',
              title: 'Error!',
              text: 'An error occurred while fetching category details.',
          });
        }
      });
    };

    // Update Category
    $('#editKaryawanForm').on('submit', function(e) {
      e.preventDefault();
      var id = $('#edit_karyawan_id').val();
      var name = $('#edit_name').val();
      var email = $('#edit_email').val();
      var jabatan = $('#edit_jabatan').val();

      $.ajax({
        url: '/karyawan/' + id,
        type: 'PUT',
        data: {
          _token: '{{ csrf_token() }}',
          name: name,
          email: email,
          jabatan: jabatan
        },
        success: function(response) {
          if (response.success) {
            var row = $('#karyawan-' + id) ; 

            row.find('td').eq(0).text(response.data.name); 
            row.find('td').eq(1).text(response.data.email); 
            row.find('td').eq(2).text(response.data.jabatan);

            row.find('td').eq(3).html(
              '<a href="javascript:void(0)" class="btn btn-warning btn-sm me-2" onclick="editKaryawan(' + response.data.id + ')">Edit</a>' +
              '<button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(' + response.data.id + ')">Delete</button>' // Update delete button
            );

            Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: response.message,
              confirmButtonText: 'OK'
            });

            $('#editKaryawanModal').modal('hide');
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!',
              text: 'Failed to update category.',
            });
          }
        },
        error: function() {
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'An error occurred while updating category.',
          });
        }
      });
    });

    window.confirmDelete = function(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '/karyawan/' + id,  
            type: 'DELETE',
            data: {
              _token: '{{ csrf_token() }}',
            },
            success: function(response) {
              if (response.success) {
                table.row('#karyawan-' + id).remove().draw();
                Swal.fire({
                  icon: 'success',
                  title: 'Deleted!',
                  text: response.message,
                  confirmButtonText: 'OK'
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong while deleting category.',
                  confirmButtonText: 'OK'
                });
              }
            },
            error: function() {
              Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to delete category. Please try again later.',
                confirmButtonText: 'OK'
              });
            }
          });
        }
      });
    };

  });
</script>
@endsection

@endsection
