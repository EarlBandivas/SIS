@extends('studentpage.student')

@section('content')

@include('components.alerts')

<form action="{{ route('enrollments.store') }}" method="POST">
    @csrf
    <div class="container-sm row justify-content-center">
        <div class="col-9">
            <div class="row justify-content-center">
                <div class="col-4">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="col-4">
                    <label class="form-label">Middle Name</label>
                    <input type="text" name="middle_name" class="form-control">
                </div>
                <div class="col-4">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
                <div class="col-4">
                    <label class="form-label">Barangay</label>
                    <input type="text" name="barangay" class="form-control" required>
                </div>
                <div class="col-4">
                    <label class="form-label">Municipality</label>
                    <input type="text" name="municipality" class="form-control" required>
                </div>
                <div class="col-4">
                    <label class="form-label">Province</label>
                    <input type="text" name="province" class="form-control" required>
                </div>
            </div>
            <div class="row justify-content-start mt-2 gy-3">
                <div class="col-2">
                    <label class="form-label">Age</label>
                    <input type="number" name="age" class="form-control" required>
                </div>
                <div class="col-4">
                    <label class="form-label">Gender</label>
                    <input type="text" name="gender" class="form-control" required>
                </div>
                <div class="col-4">
                    <label class="form-label">Contact Number</label>
                    <input type="text" name="contact_number" class="form-control" required>
                </div>
                <div class="col-6">
                    <label class="form-label">Course</label>
                    <input type="text" name="course" class="form-control" required>
                </div>
            </div>
            <div class="col-3 mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>





@endsection