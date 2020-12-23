
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">Laravel CRUD Operation</a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link {{Request::is('/') ? 'active' : ''}}"  href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('add') ? 'active' : ''}}" href="{{url('/add')}}">Add</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>