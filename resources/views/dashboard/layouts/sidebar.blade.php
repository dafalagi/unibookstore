<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/books*') ? 'active' : '' }}" href="/dashboard/books">
            <span data-feather="book" class="align-text-bottom"></span>
            Buku
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/publishers*') ? 'active' : '' }}" href="/dashboard/publishers">
            <span data-feather="layers" class="align-text-bottom"></span>
            Penerbit
          </a>
        </li>
      </ul>
    </div>
  </nav>