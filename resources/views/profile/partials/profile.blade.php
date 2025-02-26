@extends('studentpage.student')

@section('content')
<section>
<div class="col-md-8">
    <div class="card card-user">
        <div class="card-header">
            <h5 class="card-title">Edit Profile</h5>
        </div>
        <div class="card-body">
           @include('componennts.alerts')

            @foreach($enrollments as $enrollment)
            <form action="{{ route('enrollments.update', ['user_id' => $enrollment->user_id]) }}" method="POST">
                @csrf
                @method('PUT') <!-- Spoofing PUT request for Laravel -->
                
                <div class="row">
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $enrollment->first_name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 pl-1">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $enrollment->last_name }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="barangay" class="form-control" value="{{ $enrollment->barangay }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 pr-1">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="municipality" class="form-control" value="{{ $enrollment->municipality }}" required>
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>Province</label>
                            <input type="text" name="province" class="form-control" value="{{ $enrollment->province }}" required>
                        </div>
                    </div>
                    <div class="col-md-4 pl-1">
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="contact_number" class="form-control" value="{{ $enrollment->contact_number }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-warning btn-round">Update Profile</button>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>


     
    
</section>

@endsection
