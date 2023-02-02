@extends('dashboard.layouts.main')

@section('body')
    @foreach ($columns as $column)
        <div class="mb-3">
            @if ($column == 'picture')
                <p>{{ $column }} : </p>
                @if($discuss->$column)
                    <img src="{{ asset('storage/'.$discuss->$column) }}" alt="{{ $discuss->title }}" class="img-fluid">
                @else
                    <img src="https://source.unsplash.com/640x480?space" alt="Default Picture" class="img-fluid">
                @endif
            @elseif($column == 'body')
            <p>{{ $column }} : </p>
            <article>{!! $discuss->$column !!}</article>
            @else
                <span>{{  $column  }} : {{  $discuss->$column  }}</span>
            @endif
        </div>
    @endforeach
@endsection