@extends('dashboard.layouts.main')

@section('body')
    @foreach ($columns as $column)
        <div class="mb-3">
            @if ($column == 'pictures')
                <p>{{ $column }} : </p>
                @if ($content->pictures)
                    @foreach ($content->pictures as $picture)
                        <img src="{{ asset('storage/'.$picture) }}" alt="{{ $content->title }}" class="img-fluid">
                    @endforeach
                @else
                    <img src="https://source.unsplash.com/640x480?space" alt="Default Image" class="img-fluid">
                @endif
            @elseif($column == 'mainpicture')
                <p>{{ $column }} : </p>
                @if($content->mainpicture)
                    <img src="{{ asset('storage/'.$content->mainpicture) }}" alt="{{ $content->title }}" class="img-fluid">
                @else
                    <img src="https://source.unsplash.com/640x480?space" alt="Default Image" class="img-fluid">
                @endif
            @elseif($column == 'body')
                <p>{{ $column }} : </p><article>{!! $content->$column !!}</article>
            @else
                <span>{{ $column }} : {{ $content->$column }}</span>
            @endif
        </div>
    @endforeach
@endsection