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
              <th scope="col">Action</th>
              @foreach ($columns as $column)
                <th scope="col">{{ $column }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @foreach ($contents as $content)
                <tr>
                    <td>
                      <a href="/dashboard/contents/{{ $content->slug }}" class="badge bg-info">
                        <span data-feather="eye"></span>
                      </a>
                      <a href="/dashboard/contents/{{ $content->slug }}/edit" class="badge bg-warning">
                        <span data-feather="edit"></span>
                      </a>
                      <form action="/dashboard/contents/{{ $content->slug }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                          <span data-feather="x-circle"></span>
                        </button>
                      </form>
                    </td>
                    @foreach ($columns as $column)
                      @if ($column == 'pictures')
                        <td>{{ collect($content->pictures)->implode(' | ') }}</td>
                      @else
                        <td>{{ $content->$column }}</td>  
                      @endif
                    @endforeach
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection