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
          <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
            <span data-feather="users" class="align-text-bottom"></span>
            Users
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/contents*') ? 'active' : '' }}" href="/dashboard/contents">
            <span data-feather="layers" class="align-text-bottom"></span>
            Contents
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/discusses*') ? 'active' : '' }}" href="/dashboard/discusses">
            <span data-feather="align-left" class="align-text-bottom"></span>
            Discusses
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/favorites*') ? 'active' : '' }}" href="/dashboard/favorites">
            <span data-feather="star" class="align-text-bottom"></span>
            Favorites
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/comments*') ? 'active' : '' }}" href="/dashboard/comments">
            <span data-feather="message-square" class="align-text-bottom"></span>
            Comment
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/reports*') ? 'active' : '' }}" href="/dashboard/reports">
            <span data-feather="alert-triangle" class="align-text-bottom"></span>
            Reports
          </a>
        </li>
      </ul>
    </div>
  </nav>