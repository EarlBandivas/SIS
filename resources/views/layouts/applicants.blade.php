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
      <div class="modal-body">
        <div class="container-fluid">
        <div class="row">
         
          @foreach($enrollments as $enrollment)
              <h3>{{ $enrollment->first_name }}</h3>
              <h3>{{ $enrollment->last_name }}</h3>
              <h3>{{ $enrollment->course }}</h3>
              <h3>{{ $enrollment->age }}</h3>
              <h3>{{ $enrollment->first_name }}</h3>
              <h3>{{ $enrollment->first_name }}</h3>
          @endforeach
          
        </div>
  </div>
</div>
</table>


@endsection

