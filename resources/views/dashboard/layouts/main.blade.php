<!doctype html>
<html lang="en">
  @include('dashboard.layouts.head')
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/dashboard">Unibook Store</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  @if (Request::is('dashboard/books') || Request::is('dashboard/reports') || Request::is('dashboard/publishers'))
    <form action="
    {{ Request::is('dashboard/books') ? '/dashboard/books' : '' }}
    {{ Request::is('dashboard/publishers') ? '/dashboard/publishers' : '' }}
    {{ Request::is('dashboard/reports') ? '/dashboard/reports' : '' }}
    " class="w-100">
      <input class="form-control form-control-dark rounded-0 border-0" type="text" placeholder="Search" aria-label="Search" name="search"
      value="{{ request('search') }}">
    </form>
  @endif
</header>

<div class="container-fluid">
  <div class="row">
    @include('dashboard.layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @if (Request::is('dashboard/books/create') || Request::is('dashboard/publishers/create'))
          <h1 class="h2">Tambah 
            {{ Request::is('dashboard/books/create') ? 'Buku' : '' }}
            {{ Request::is('dashboard/publishers/create') ? 'Penerbit' : '' }}
          </h1>
        @elseif(Request::is('dashboard/books/*') || Request::is('dashboard/publishers/*'))
          <h1 class="h2"> 
            {{ Request::is('dashboard/books/*') ? "Buku $book->nama" : '' }}
            {{ Request::is('dashboard/publishers/*') ? "Penerbit $publisher->nama" : '' }}
          </h1>
        @else
          @if (Request::is('dashboard'))
            <h1 class="h2">Selamat Datang di Dashboard Unibook Store</h1>
          @else
            <h1 class="h2">
              {{ Request::is('dashboard/books') ? 'Tabel Buku' : '' }}
              {{ Request::is('dashboard/publishers') ? 'Tabel Penerbit' : '' }}
              {{ Request::is('dashboard/reports') ? 'Daftar Buku Yang Memerlukan Pengadaan' : '' }}
            </h1>  
          @endif
          <div class="btn-toolbar mb-2 mb-md-0">
            @if (Request::is('dashboard') || Request::is('dashboard/reports'))
            
            @else
              <a href="
              {{ Request::is('dashboard/books') ? 'books/create' : '' }}
              {{ Request::is('dashboard/publishers') ? 'publishers/create' : '' }}
              "
              class="text-decoration-none btn btn-sm btn-outline-primary">
                <span data-feather="plus"></span>
                Tambah Data
              </a>
            @endif
          </div>
        @endif
      </div>
      @yield('body')
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>
    <script>
      document.addEventListener('trix-file-accept', function(e) {
          e.preventDefault();
      })
    </script>
  </body>
</html>
