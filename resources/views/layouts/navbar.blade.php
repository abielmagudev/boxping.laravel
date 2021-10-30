<nav class="navbar navbar-expand navbar-light bg-white mb-5" id="app-navbar" style="padding:0.7rem 1rem">
  <div class="container-fluid">
    <span class="navbar-brand"></span>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle small" href="#" id="navbar-dropdown-user" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ auth()->user()->name }}
        </a>
        <ul class="dropdown-menu border-0 shadow" aria-labelledby="navbar-dropdown-user" style="left:-20px;top:50px">
          <li>
            <a class="dropdown-item" href="#">Mi cuenta</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Preferencias</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Actividades</a>
          </li>
          <li class="">
            <hr class="dropdown-divider text-light">
          </li>
          <li>
            <form id="close-session" action="{{ route('logout') }}" method="post">
              @csrf
              <button class="dropdown-item" type="submit">Cerrar sesión</button>
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
