@extends('dashboard.layouts.main')

@section('body')
    {{-- Main Form --}}
    <form action="/dashboard/reports" method="POST" enctype="multipart/form-data">
        @csrf
        @php
            if(session()->has('oldData'))
            {
                $oldData = session('oldData');
            }
        @endphp
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label">Content Title</label>
            <input type="text" class="form-control @error('content_title') is-invalid @enderror" name="content_title"
            value="{{ old('content_title', $oldData['content_title'] ?? false) }}" 
            @if ($errors->hasAny('discuss_title', 'comment_id'))
            @else
                autofocus
            @endif
            aria-describedby="content_titleFeedback">
            @if($errors->has('content_title'))
                <div class="invalid-feedback" id="content_titleFeedback">
                    {{ $errors->first('content_title') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Discuss Title</label>
            <input type="text" class="form-control @error('discuss_title') is-invalid @enderror" name="discuss_title" 
            value="{{ old('discuss_title', $oldData['discuss_title'] ?? false) }}" @error('discuss_title') autofocus @enderror 
            aria-describedby="discuss_titleFeedback">
            @if($errors->has('discuss_title'))
                <div class="invalid-feedback" id="discuss_titleFeedback">
                    {{ $errors->first('discuss_title') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Comment ID</label>
            <input type="text" class="form-control @error('comment_id') is-invalid @enderror" name="comment_id" 
            value="{{ old('comment_id', $oldData['comment_id'] ?? false) }}" @error('comment_id') autofocus @enderror 
            aria-describedby="comment_idFeedback">
            @if($errors->has('comment_id'))
                <div class="invalid-feedback" id="comment_idFeedback">
                    {{ $errors->first('comment_id') }}
                </div>
            @endif
        </div>
        <div class="mb-4">
            <label class="form-label">Values</label>
            <div class="form-group">
                <label><input type="checkbox" name="values[]" value="Ujaran Kebencian"> Ujaran kebencian</label>
                <label><input type="checkbox" name="values[]" value="Informasi Palsu"> Informasi Palsu</label>
                <label><input type="checkbox" name="values[]" value="Kata-kata Tidak Pantas"> Kata-kata Tidak Pantas</label>
                <label><input type="checkbox" name="values[]" value="Spam"> Spam</label>
                <label><input type="checkbox" name="values[]" value="Pornografi"> Pornografi</label>
                <label><input type="checkbox" name="values[]" value="Lainnya"> Lainnya</label>
            </div>  
        </div>
        <div class="mb-5 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection