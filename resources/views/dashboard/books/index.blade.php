@extends('dashboard.layouts.main')

@section('body')
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>
            {{ session('success') }}
          </strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Aksi</th>
              <th scope="col">ID Buku</th>
              <th scope="col">Kategori</th>
              <th scope="col">Nama Buku</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col">Penerbit</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>
                      <a href="/dashboard/books/{{ $book->id_buku }}" class="badge bg-info">
                        <span data-feather="eye"></span>
                      </a>
                      <a href="/dashboard/books/{{ $book->id_buku }}/edit" class="badge bg-warning">
                        <span data-feather="edit"></span>
                      </a>
                      <form action="/dashboard/books/{{ $book->id_buku }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                          <span data-feather="x-circle"></span>
                        </button>
                      </form>
                    </td>
                    <td>{{ $book->id_buku }}</td>
                    <td>{{ $book->kategori }}</td>
                    <td>{{ $book->nama }}</td>
                    <td>{{ $book->harga }}</td>
                    <td>{{ $book->stok }}</td>
                    <td>{{ $book->penerbit }}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection