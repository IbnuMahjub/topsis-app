@extends('dashboard.layouts.main')
@section('content')

<div class="mb-3">
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kriteriaModal" id="createPropertyBtn">
     Tambah Data Order Baru
  </button>
</div>

<div class="card">
  <div class="card-body">
     <div class="table-responsive">
        <table id="example" class="table table-bordered" style="width:100%">
           <thead>
              <tr>
                 <th>Kriteria</th>
                 <th>Tipe</th>
                 <th>Bobot</th>
                 <th>Action</th>
              </tr>
           </thead>
           <tbody>
              @foreach ($kriteria as $item)
              <tr id="datakriteria-{{ $item->id }}">
                 <td>{{ $item->kriteria }}</td>
                 <td>{{ $item->tipe }}</td>
                 <td>{{ $item->bobot }}</td>
                 <td class="d-flex">
                  <a href="javascript:void(0)" class="btn btn-warning btn-sm me-2" onclick="editKriteria({{ $item->id}})">
                    <span data-feather="edit"></span> Edit
                  </a>
                  <a href="/property/{{ $item->id }}" class="btn btn-primary btn-sm me-2">Detail</a>
                  <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id }})">
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


<div class="modal fade" id="kriteriaModal" tabindex="-1" aria-labelledby="kriteriaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kriteriaModalLabel">Add Property</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="kriteriaForm">
          @csrf
          <div class="row">
            <div class="col mb-3">
              <label for="name_property" class="form-label">Name kriteria</label>
              <input type="text" class="form-control @error('kriteria') is-invalid @enderror" id="kriteria" name="kriteria">
              @error('name_property')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col mb-3">
              <label for="edit_category_id" class="form-label">tipe</label>
              <select class="form-control" id="category_id" name="tipe">
                <option value="">Select tipe</option>
                {{-- @foreach ($categories as $category)
                  <option value="{{ $category['id'] }}">{{ $category['name_category'] }}</option>
                @endforeach --}}
                <option value="Benefit">test</option>
                <option value="Cost">test2</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="bobot" class="form-label">Bobot</label>
              <input type="text" class="form-control" id="bobot">
            </div>
            {{-- <div class="col-md-6 mb-3">
              <label for="kota" class="form-label">Kota</label>
              <input type="text" class="form-control" id="kota">
            </div> --}}
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="SaveKriteriaBtn">Save Category</button>
      </div>
    </div>
  </div>
</div>


{{-- Edit Property Modal --}}
<div class="modal fade" id="editkriteriaModal" tabindex="-1" aria-labelledby="editkriteriaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editkriteriaModalLabel">Edit Property</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editkriteriaForm" method="POST">
          @csrf
          {{-- @method('POST') --}}
          {{-- <input type="hidden" id="edit_property_id" name="id"> --}}
          <input type="hidden" id="edit_kriteria_id" name="id">

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="edit_name_kriteria" class="form-label">Name kriteria</label>
              <input type="text" class="form-control" id="edit_name_kriteria" name="kriteria">
            </div>
            <div class="col-md-6 mb-3">
              <label for="edit_category_id" class="form-label">Category</label>
              <select class="form-control" id="edit_category_id" name="tipe">
                <option value="">Select Category</option>
                {{-- @foreach ($categories as $category)
                  <option value="{{ $category['id'] }}">{{ $category['name_category'] }}</option>
                @endforeach --}}
                <option value="Cost">test</option>
                <option value="Benefit">test2</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="bobot" class="form-label">Bobot</label>
              <input type="text" class="form-control" id="edit_bobot" name="bobot">
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="updatePropertyBtn">Update Property</button>
      </div>
    </div>
  </div>
</div>

@section('scripts')

<script>
$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(document).ready(function() {
    var table = $('#example').DataTable();

    $('#kriteriaModal').on('shown.bs.modal', function () {
        $('#category_id').select2({
            theme: "bootstrap-5",
            width: '100%',
            placeholder: $( this ).data( 'placeholder' ), 
            dropdownParent: $('#kriteriaModal') 
        });
    });

    // select2 edit modal
    $('#editkriteriaModal').on('shown.bs.modal', function () {
        $('#edit_category_id').select2({
            theme: "bootstrap-5",
            width: '100%',
            placeholder: "Choose...",
            allowClear: true,
            dropdownParent: $('#editkriteriaModal') 
        });
    });

     $('#SaveKriteriaBtn').on('click', function() {
        var formData = new FormData();
        formData.append('kriteria', $('#kriteria').val());
        formData.append('tipe', $('#tipe').val());
        formData.append('bobot', $('#bobot').val());

        $.ajax({
            url: '{{ route("kriteria.store") }}',
            type: 'POST',
            _token: '{{ csrf_token() }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log("Response from API:", response);
                if (response.success) {
                    table.row.add([
                        response.data.kriteria,
                        response.data.tipe,
                        response.data.bobot,
                        '<a href="javascript:void(0)" class="btn btn-warning btn-sm me-2" onclick="editCategory(' + response.data.id + ')">Edit</a>' +
                        '<button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(' + response.data.id + ')">Delete</button>'
                    ]).draw();

                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        confirmButtonText: 'OK'
                    });

                    $('#kriteriaModal').modal('hide');
                    $('#kriteriaForm')[0].reset();
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message || 'Something went wrong. Please try again!',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);

                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        $('#' + field).addClass('is-invalid'); // Add the 'is-invalid' class for the field
                        $('#' + field).next('.invalid-feedback').text(messages[0]); // Display error message
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to add property. Please try again later.',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
        });

  });

  // fungsi edit dan update
  function editKriteria(id) {
    $.ajax({
        url: '{{ url("kriteria") }}/' + id + '/edit',
        type: 'GET',
        success: function(response) {
            console.log("Response from API:", response);
            if (response.success) {
                $('#edit_kriteria_id').val(response.data.id);
                $('#edit_name_kriteria').val(response.data.kriteria);
                $('#edit_category_id').val(response.data.tipe);
                $('#edit_bobot').val(response.data.bobot);
                $('#editkriteriaModal').modal('show');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.message || 'Failed to fetch property data',
                    confirmButtonText: 'OK'
                });
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to fetch property data. Please try again later.',
                confirmButtonText: 'OK'
            });
        }
    });
}

$('#updatePropertyBtn').on('click', function() {
    // var id = $('#edit_kriteria_id').val();
    // var formData = new FormData();
    // var imageFile = $('#edit_image')[0].files[0];

    // if (imageFile) {
    //     formData.append('image', imageFile);
    // } else {
    //     console.log('No image file selected.');
    // }

    // formData.append('kriteria', $('#edit_name_kriteria').val());
    // formData.append('tipe', $('#edit_category_id').val());
    // formData.append('bobot', $('#edit_bobot').val());
    // formData.append('_method', 'PUT');
    // e.preventDefault();
    var id = $('#edit_kriteria_id').val();
    var kriteria = $('#edit_name_kriteria').val();
    var tipe = $('#edit_category_id').val();
    var bobot = $('#edit_bobot').val();

    $.ajax({
        url: '/kriteria/' + id,
        type: 'PUT',
        // data: formData,
        data: {
            _token: '{{ csrf_token() }}',
            kriteria: kriteria,
            tipe: tipe,
            bobot: bobot
        },
        // processData: false,
        // contentType: false,
        success: function(response) {
            console.log("Response from API:", response);
            if (response.success) {
                var row = $('#datakriteria-' + id);
                row.find('td:eq(0)').text(response.data.kriteria); 
                row.find('td:eq(1)').text(response.data.tipe); 
                row.find('td:eq(2)').text(response.data.bobot); 
                // row.find('td:eq(3)').html('<img src="' + response.data.image + '" alt="Property Image" style="width: 100px;">'); // Image
                
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });

                // Hide the edit modal
                $('#editkriteriaModal').modal('hide');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.message || 'Failed to update property',
                    confirmButtonText: 'OK'
                });
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to update property. Please try again later.',
                confirmButtonText: 'OK'
            });
        }
    });
});

// $('#editkriteriaForm').on('submit', function(e) {
//     e.preventDefault();
//     var id = $('#edit_kriteria_id').val();
//     var kriteria = $('#edit_name_kriteria').val();
//     var tipe = $('#edit_category_id').val();
//     var bobot = $('#edit_bobot').val();

//     $.ajax({
//         url: '/kriteria/' + id,
//         type: 'PUT',
//         data: {
//             _token: '{{ csrf_token() }}',
//             kriteria: kriteria,
//             tipe: tipe,
//             bobot: bobot
//         },
//         success: function(response) {
//             console.log("Response from API:", response);
//             if (response.success) {
//                 var row = $('#datakriteria-' + id);
//                 row.find('td:eq(0)').text(response.data.kriteria); 
//                 row.find('td:eq(1)').text(response.data.bobot); 
//                 row.find('td:eq(2)').text(response.data.tipe); 
//                 // row.find('td:eq(3)').html('<img src="' + response.data.image + '" alt="Property Image" style="width: 100px;">'); // Image
                
//                 Swal.fire({
//                     icon: 'success',
//                     title: 'Success!',
//                     text: response.message,
//                     confirmButtonText: 'OK'
//                 });

//                 // Hide the edit modal
//                 $('#editkriteriaModal').modal('hide');
//             } else {
//                 Swal.fire({
//                     icon: 'error',
//                     title: 'Oops...',
//                     text: response.message || 'Failed to update property',
//                     confirmButtonText: 'OK'
//                 });
//             }
//         },
//         error: function(xhr, status, error) {
//             console.error(xhr.responseText);
//             Swal.fire({
//                 icon: 'error',
//                 title: 'Error!',
//                 text: 'Failed to update property. Please try again later.',
//                 confirmButtonText: 'OK'
//             });
//         }
//     });
// });

function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteProperty(id);
        }
    });
}

function deleteProperty(id) {
    $.ajax({
        url: '{{ url("kriteria") }}/' + id,
        type: 'DELETE',
        data: {
            _token: '{{ csrf_token() }}',  
        },
        success: function(response) {
            console.log("Response from API:", response);
            if (response.success) {
                $('#property-' + id).remove();
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
                    text: response.message || 'Failed to delete property.',
                    confirmButtonText: 'OK'
                });
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to delete property. Please try again later.',
                confirmButtonText: 'OK'
            });
        }
    });
}



  
</script>
@endsection

@endsection
