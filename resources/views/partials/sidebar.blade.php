

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
 

    <!-- Show "View Subjects" if the user is a student -->
    @if(auth()->user()->role === 'student')
    <li class="nav-item">
      <a class="nav-link" href="{{ route('enrollment') }}">
      <i class="mdi mdi mdi-account-card menu-icon"></i>
        <span class="menu-title">Enrollment</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="mdi mdi-book menu-icon"></i>
        <span class="menu-title">Subjects</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="mdi mdi-numeric-9-plus-circle menu-icon"></i>
        <span class="menu-title">Grades</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('profile') }}">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">Profile</span>
      </a>
    </li>
  
    @endif

    <!-- Show "View Students" if the user is an admin -->
    @if(auth()->user()->role === 'admin')
    <li class="nav-item">
      <a class="nav-link" href="{{ route('applicants.index') }}">
        <i class="mdi mdi-account-group menu-icon"></i>
        <span class="menu-title">View Applicants</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('classlist') }}">
        <i class="mdi mdi-account-group menu-icon"></i>
        <span class="menu-title">Class List</span>
      </a>
    </li>
    @endif

  </ul>
</nav>

