@extends('dashboard.layouts.main')

@section('body')
    {{-- Main Form --}}
    <form action="/dashboard/users" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" 
            value="{{ old('username') }}" required 
            @if ($errors->hasAny('email', 'password', 'confirm_password', 'avatar', 'bio', 'is_admin'))
            @else
                autofocus
            @endif
            aria-describedby="usernameFeedback">
            @if($errors->has('username'))
                <div class="invalid-feedback" id="usernameFeedback">
                    {{ $errors->first('username') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
            value="{{ old('email') }}" required @error('email') autofocus @enderror aria-describedby="emailFeedback">
            @if($errors->has('email'))
                <div class="invalid-feedback" id="emailFeedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" 
            required @error('password') autofocus @enderror aria-describedby="passwordFeedback">
            @if($errors->has('password'))
                <div class="invalid-feedback" id="passwordFeedback">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" 
            required @error('confirm_password') autofocus @enderror aria-describedby="confirmPasswordFeedback">
            @if($errors->has('confirm_password'))
                <div class="invalid-feedback" id="confirmPasswordFeedback">
                    {{ $errors->first('confirm_password') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Profile Picture</label>
            <input class="form-control @error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar" 
            @error('avatar') autofocus @enderror aria-describedby="avatarFeedback">
            @if ($errors->has('avatar'))
                <div id="avatarFeedback" class="invalid-feedback">
                    {{ $errors->first('avatar') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Bio</label>
            <input type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" 
            value="{{ old('bio') }}" @error('bio') autofocus @enderror aria-describedby="bioFeedback">
            @if($errors->has('bio'))
                <div class="invalid-feedback" id="bioFeedback">
                    {{ $errors->first('bio') }}
                </div>
            @endif
        </div>
        <div class="mb-4">
            <label class="form-label">Is Admin?</label>
            <select name="is_admin" class="form-select @error('is_admin') is-invalid @enderror" @error('is_admin') autofocus @enderror
            aria-describedby="isAdminFeedback">
                <option value="0" {{ old('is_admin') == "0" ? 'selected' : '' }}>False</option>
                <option value="1" {{ old('is_admin') == "1" ? 'selected' : '' }}>True</option>
            </select>
            @if($errors->has('is_admin'))
                <div class="invalid-feedback" id="isAdminFeedback">
                    {{ $errors->first('is_admin') }}
                </div>
            @endif
        </div>
        <div class="mb-5 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection