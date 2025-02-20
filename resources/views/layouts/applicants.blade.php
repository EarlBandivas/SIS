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
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Student Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
        <div class="row justify-content-center">
         
          @foreach($enrollments as $enrollment)
         
            <div class="row gy-2">
              <ul class="list-group list-group-horizontal ">
                <li class="list-group-item w-50">First Name</li>
                <li class="list-group-item w-50">{{ $enrollment->first_name }}</li>
              </ul>
              <ul class="list-group list-group-horizontal ">
                <li class="list-group-item w-50">Last Name</li>
                <li class="list-group-item w-50">{{ $enrollment->last_name }}</li>
              </ul>
              <ul class="list-group list-group-horizontal ">
                <li class="list-group-item w-50">Course</li>
                <li class="list-group-item w-50">{{ $enrollment->course }}</li>
              </ul>
              <ul class="list-group list-group-horizontal ">
                <li class="list-group-item w-50">Age</li>
                <li class="list-group-item w-50">{{ $enrollment->age }}</li>
              </ul>
              <ul class="list-group list-group-horizontal ">
                <li class="list-group-item w-50">Gender</li>
                <li class="list-group-item w-50">{{ $enrollment->gender }}</li>
              </ul>
              <ul class="list-group list-group-horizontal ">
                <li class="list-group-item w-50">Barangay</li>
                <li class="list-group-item w-50">{{ $enrollment->barangay }}</li>
              </ul>
              <ul class="list-group list-group-horizontal ">
                <li class="list-group-item w-50">Municipality</li>
                <li class="list-group-item w-50">{{ $enrollment->municipality }}</li>
              </ul>
              <ul class="list-group list-group-horizontal ">
                <li class="list-group-item w-50">Province</li>
                <li class="list-group-item w-50">{{ $enrollment->province }}</li>
              </ul>
            </div>
        
              
              
              
              
              
          @endforeach
          
        </div>
  </div>
</div>
</table>


@endsection

