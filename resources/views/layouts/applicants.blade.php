@extends('adminpage.admin')

@section('content')
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Course</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($enrollments as $enrollment)
            <tr>
                <td>{{ $enrollment->first_name }}</td>
                <td>{{ $enrollment->last_name }}</td>
                <td>{{ $enrollment->course }}</td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm" data-userid="{{ $enrollment->user_id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <i class="mdi mdi-eye-circle" ></i>
                    

                  </button>
                  <button type="button" class="btn btn-success btn-sm"><i class="mdi mdi-check-circle"></i></button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="mdi mdi-alpha-x-circle"></i></button>
              
              </td>
            </tr>
        @endforeach

  </tbody>
 
      
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Student Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-lg">
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item w-50">First Name</li>
            <li class="list-group-item w-50" id="modalFirstName"></li>
          </ul>
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item w-50">Middle Name</li>
            <li class="list-group-item w-50" id="modalMiddleName"></li>
          </ul>
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item w-50">Last Name</li>
            <li class="list-group-item w-50" id="modalLastName"></li>
          </ul>
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item w-50">Course</li>
            <li class="list-group-item w-50" id="modalCourse"></li>
          </ul>
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item w-50">Age</li>
            <li class="list-group-item w-50" id="modalAge"></li>
          </ul>
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item w-50">Gender</li>
            <li class="list-group-item w-50" id="modalGender"></li>
          </ul>
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item w-50">Barangay</li>
            <li class="list-group-item w-50" id="modalBarangay"></li>
          </ul>
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item w-50">Municipality</li>
            <li class="list-group-item w-50" id="modalMunicipality"></li>
          </ul>
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item w-50">Province</li>
            <li class="list-group-item w-50" id="modalProvince"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var exampleModal = document.getElementById('exampleModal');

    exampleModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Button that triggered the modal
        var userId = button.getAttribute('data-userid'); // Get user_id

        // Fetch data from Laravel API
        fetch(`/enrollment/user/${userId}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert("Error: " + data.error);
                    return;
                }
                // Update modal content dynamically
                document.getElementById('modalFirstName').textContent = data.first_name;
                document.getElementById('modalMiddleName').textContent = data.middle_name;
                document.getElementById('modalLastName').textContent = data.last_name;
                document.getElementById('modalCourse').textContent = data.course;
                document.getElementById('modalAge').textContent = data.age;
                document.getElementById('modalGender').textContent = data.gender;
                document.getElementById('modalBarangay').textContent = data.barangay;
                document.getElementById('modalMunicipality').textContent = data.municipality;
                document.getElementById('modalProvince').textContent = data.province;
            })
            .catch(error => {
                console.error("Error fetching data:", error);
            });
    });
});
</script>
</table>


@endsection

