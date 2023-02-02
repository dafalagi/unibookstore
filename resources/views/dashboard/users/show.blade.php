@extends('dashboard.layouts.main')

@section('body')
    @foreach ($columns as $column)
        <div class="mb-3">
            @if ($column == 'avatar')
                <p>{{ $column }} : </p>
                <img src="{{ asset('storage/'.$user->$column) }}" alt="{{ $user->username }} Avatar" class="img-fluid">
            @else
                <span>{{ $column }} : {{ $user->$column }}</span>
            @endif
        </div>
    @endforeach
@endsection