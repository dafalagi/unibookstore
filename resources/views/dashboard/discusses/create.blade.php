@extends('dashboard.layouts.main')

@section('body')
    {{-- Main Form --}}
    <form action="/dashboard/discusses" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" 
            value="{{ old('title') }}" 
            @if ($errors->hasAny('body', 'picture'))
            @else
                autofocus
            @endif
            aria-describedby="titleFeedback">
            @if ($errors->has('title'))
                <div id="titleFeedback" class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Content Details (Body)</label>
            <input id="body" type="hidden" name="body" value="{{ old('body') }}" @error('body') class="is-invalid" @enderror
            aria-describedby="bodyFeedback">
            <trix-editor input="body"></trix-editor>
            @if ($errors->has('body'))
                <div id="bodyFeedback" class="invalid-feedback">
                    {{ $errors->first('body') }}
                </div>
            @endif
        </div>
        <div class="mb-4">
            <label for="picture" class="form-label">Picture</label>
            <input class="form-control @error('picture') is-invalid @enderror" type="file" id="picture" name="picture" 
            @error('picture') autofocus @enderror aria-describedby="pictureFeedback">
            @if ($errors->has('picture'))
                <div id="pictureFeedback" class="invalid-feedback">
                    {{ $errors->first('picture') }}
                </div>
            @endif
        </div>
        <div class="mb-5 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection