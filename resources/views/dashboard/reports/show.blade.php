@extends('dashboard.layouts.main')

@section('body')
    @foreach ($columns as $column)
        <div class="mb-3">
            @if ($column == 'values')
                <span>{{ $column }} : {{ collect($report->values)->implode(' | ') }}</span>
            @else
                <span>{{ $column }} : {{  $report->$column  }}</span>
            @endif
        </div>
    @endforeach
@endsection