@extends('dashboard.layouts.main')

@section('body')
    {{-- Main Form --}}
    <form action="/dashboard/publishers" method="POST">
        @csrf
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label">ID Penerbit</label>
            <input type="text" class="form-control @error('id_penerbit') is-invalid @enderror" name="id_penerbit" 
            value="{{ old('id_penerbit', session('id_penerbit')) }}" required 
            @if ($errors->hasAny('nama', 'alamat', 'kota', 'telepon'))
            @else
                autofocus
            @endif
            aria-describedby="id_penerbit_feedback">
            @if($errors->has('id_penerbit'))
                <div class="invalid-feedback" id="id_penerbit_feedback">
                    {{ $errors->first('id_penerbit') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Penerbit</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" 
            value="{{ old('nama', session('nama')) }}" required @error('nama') autofocus @enderror aria-describedby="nama_feedback">
            @if($errors->has('nama'))
                <div class="invalid-feedback" id="nama_feedback">
                    {{ $errors->first('nama') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" 
            value="{{ old('alamat', session('alamat')) }}" required @error('alamat') autofocus @enderror aria-describedby="alamat_feedback">
            @if($errors->has('alamat'))
                <div class="invalid-feedback" id="alamat_feedback">
                    {{ $errors->first('alamat') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Kota</label>
            <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" 
            value="{{ old('kota', session('kota')) }}" required @error('kota') autofocus @enderror aria-describedby="kota_feedback">
            @if($errors->has('kota'))
                <div class="invalid-feedback" id="kota_feedback">
                    {{ $errors->first('kota') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Telepon</label>
            <input class="form-control @error('telepon') is-invalid @enderror" type="text" name="telepon" 
            value="{{ old('telepon', session('telepon')) }}" @error('telepon') autofocus @enderror aria-describedby="telepon_feedback">
            @if ($errors->has('telepon'))
                <div id="telepon_feedback" class="invalid-feedback">
                    {{ $errors->first('telepon') }}
                </div>
            @endif
        </div>
        <div class="mb-5 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
@endsection