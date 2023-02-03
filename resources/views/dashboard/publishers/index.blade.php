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
              <th scope="col">ID Penerbit</th>
              <th scope="col">Nama Penerbit</th>
              <th scope="col">Alamat</th>
              <th scope="col">Kota</th>
              <th scope="col">Telepon</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($publishers as $publisher)
                <tr>
                    <td>
                      <a href="/dashboard/publishers/{{ $publisher->id_penerbit }}" class="badge bg-info">
                        <span data-feather="eye"></span>
                      </a>
                      <a href="/dashboard/publishers/{{ $publisher->id_penerbit }}/edit" class="badge bg-warning">
                        <span data-feather="edit"></span>
                      </a>
                      <form action="/dashboard/publishers/{{ $publisher->id_penerbit }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                          <span data-feather="x-circle"></span>
                        </button>
                      </form>
                    </td>
                    <td>{{ $publisher->id_penerbit }}</td>
                    <td>{{ $publisher->nama }}</td>
                    <td>{{ $publisher->alamat }}</td>
                    <td>{{ $publisher->kota }}</td>
                    <td>{{ $publisher->telepon }}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection