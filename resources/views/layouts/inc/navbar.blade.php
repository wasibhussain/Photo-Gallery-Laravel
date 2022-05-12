<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ Request::is('index') ? 'active' : '' }}" >
        <a class="nav-link"  href="{{route('index')}}">Home</a>
      </li>
      <li class="nav-item {{ Request::is('create') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('create') }}">Create Album</a>
      </li>
    </ul>
  </div>
</nav>
