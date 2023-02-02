<!doctype html>
<html lang="en">
  @include('dashboard.layouts.head')
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/">Canopus</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form action="
  {{ Request::is('dashboard/users') ? '/dashboard/users' : '' }}
  {{ Request::is('dashboard/contents') ? '/dashboard/contents' : '' }}
  {{ Request::is('dashboard/discusses') ? '/dashboard/discusses' : '' }}
  {{ Request::is('dashboard/comments') ? '/dashboard/comments' : '' }}
  {{ Request::is('dashboard/favorites') ? '/dashboard/favorites' : '' }}
  {{ Request::is('dashboard/reports') ? '/dashboard/reports' : '' }}
  " class="w-100">
    <input class="form-control form-control-dark rounded-0 border-0" type="text" placeholder="Search" aria-label="Search" name="search"
    value="{{ request('search') }}">
  </form>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="btn btn-dark nav-link px-3">Logout <span data-feather="log-out"></span></button>
      </form>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    @include('dashboard.layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @if (Request::is('dashboard/users/create') || Request::is('dashboard/contents/create') || Request::is('dashboard/discusses/create')
            || Request::is('dashboard/reports/create') || Request::is('dashboard/favorites/create') || Request::is('dashboard/comments/create'))
          <h1 class="h2">Add New 
            {{ Request::is('dashboard/users/create') ? 'User' : '' }}
            {{ Request::is('dashboard/contents/create') ? 'Content' : '' }}
            {{ Request::is('dashboard/discusses/create') ? 'Discuss' : '' }}
            {{ Request::is('dashboard/favorites/create') ? 'Favorite' : '' }}
            {{ Request::is('dashboard/reports/create') ? 'Report' : '' }}
            {{ Request::is('dashboard/comments/create') ? 'Comment' : '' }}
          </h1>
        @elseif(Request::is('dashboard/users/*') || Request::is('dashboard/contents/*') || Request::is('dashboard/discusses/*')
        || Request::is('dashboard/reports/*') || Request::is('dashboard/favorites/*') || Request::is('dashboard/comments/*'))
          <h1 class="h2"> 
            {{ Request::is('dashboard/users/*') ? "User $user->username" : '' }}
            {{ Request::is('dashboard/contents/*') ? "Content $content->title" : '' }}
            {{ Request::is('dashboard/discusses/*') ? "Discuss $discuss->title" : '' }}
            {{ Request::is('dashboard/favorites/*') ? "Favorite $favorite->id" : '' }}
            {{ Request::is('dashboard/reports/*') ? "Report $report->id" : '' }}
            {{ Request::is('dashboard/comments/*') ? "Comment $comment->id" : '' }}
          </h1>
        @else
          @if (Request::is('dashboard'))
            <h1 class="h2">Welcome, {{ auth()->user()->username }}</h1>
          @else
            <h1 class="h2">
              {{ Request::is('dashboard/users') ? 'Users Table' : '' }}
              {{ Request::is('dashboard/contents') ? 'Contents Table' : '' }}
              {{ Request::is('dashboard/discusses') ? 'Discusses Table' : '' }}
              {{ Request::is('dashboard/favorites') ? 'Favorites Table' : '' }}
              {{ Request::is('dashboard/reports') ? 'Reports Table' : '' }}
              {{ Request::is('dashboard/comments') ? 'Comments Table' : '' }}
            </h1>  
          @endif
          <div class="btn-toolbar mb-2 mb-md-0">
            @if (Request::is('dashboard'))
            
            @else
              <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <a href="
              {{ Request::is('dashboard/users') ? 'users/create' : '' }}
              {{ Request::is('dashboard/contents') ? 'contents/create' : '' }}
              {{ Request::is('dashboard/discusses') ? 'discusses/create' : '' }}
              {{ Request::is('dashboard/favorites') ? 'favorites/create' : '' }}
              {{ Request::is('dashboard/reports') ? 'reports/create' : '' }}
              {{ Request::is('dashboard/comments') ? 'comments/create' : '' }}
              "
              class="text-decoration-none btn btn-sm btn-outline-primary">
                <span data-feather="plus"></span>
                Add New
              </a>
            @endif
          </div>
        @endif
      </div>
      @yield('body')
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="/js/dashboard.js"></script>
    <script>
      document.addEventListener('trix-file-accept', function(e) {
          e.preventDefault();
      })
    </script>
  </body>
</html>
