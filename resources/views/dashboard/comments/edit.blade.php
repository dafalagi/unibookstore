@extends('dashboard.layouts.main')

@section('body')
    {{-- Main Form --}}
    <form action="/dashboard/comments/{{ $comment->id }}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label class="form-label">Discuss Title</label>
            <input type="text" class="form-control @error('discuss_title') is-invalid @enderror" name="discuss_title"
            value="{{ old('discuss_title', $comment->discuss->title ?? false) }}" 
            @if ($errors->hasAny('body'))
            @else
                autofocus
            @endif>
        </div>
        <div class="mb-4">
            <label class="form-label">Comment Details (Body)</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $comment->body) }}" @error('body') class="is-invalid" @enderror
            aria-describedby="bodyFeedback">
            <trix-editor input="body"></trix-editor>
            @if($errors->has('body'))
                <div class="invalid-feedback" id="bodyFeedback">
                    {{ $errors->first('body') }}
                </div>
            @endif
        </div>
        <div class="mb-5 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection