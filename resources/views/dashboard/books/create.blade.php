@extends('dashboard.layouts.main')

@section('body')
    {{-- Main Form --}}
    <form action="/dashboard/books" method="POST">
        @csrf
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label">ID Buku</label>
            <input type="text" class="form-control @error('id_buku') is-invalid @enderror" name="id_buku" 
            value="{{ old('id_buku', session('id_buku')) }}" required 
            @if ($errors->hasAny('nama', 'kategori', 'harga', 'stok', 'penerbit'))
            @else
                autofocus
            @endif
            aria-describedby="id_buku_feedback">
            @if($errors->has('id_buku'))
                <div class="invalid-feedback" id="id_buku_feedback">
                    {{ $errors->first('id_buku') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Buku</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" 
            value="{{ old('nama', session('nama')) }}" required @error('nama') autofocus @enderror aria-describedby="nama_feedback">
            @if($errors->has('nama'))
                <div class="invalid-feedback" id="nama_feedback">
                    {{ $errors->first('nama') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori (Case Sensitive)</label>
            <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" 
            value="{{ old('kategori', session('kategori')) }}" required @error('kategori') autofocus @enderror aria-describedby="kategori_feedback">
            @if($errors->has('kategori'))
                <div class="invalid-feedback" id="kategori_feedback">
                    {{ $errors->first('kategori') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" 
            value="{{ old('harga', session('harga')) }}" required @error('harga') autofocus @enderror aria-describedby="harga_feedback">
            @if($errors->has('harga'))
                <div class="invalid-feedback" id="harga_feedback">
                    {{ $errors->first('harga') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input class="form-control @error('stok') is-invalid @enderror" type="text" name="stok" 
            value="{{ old('stok', session('stok')) }}" @error('stok') autofocus @enderror aria-describedby="stok_feedback">
            @if ($errors->has('stok'))
                <div id="stok_feedback" class="invalid-feedback">
                    {{ $errors->first('stok') }}
                </div>
            @endif
        </div>
        <div class="mb-4">
            <label class="form-label">Penerbit</label>
            <select name="penerbit" class="form-select @error('penerbit') is-invalid @enderror" @error('penerbit') autofocus @enderror
            aria-describedby="penerbit_feedback">
                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->nama }}" {{ old('penerbit', session('penerbit')) == $publisher->nama ? 'selected' : '' }}>{{ $publisher->nama }}</option>
                @endforeach
            </select>
            @if($errors->has('penerbit'))
                <div class="invalid-feedback" id="penerbit_feedback">
                    {{ $errors->first('penerbit') }}
                </div>
            @endif
        </div>
        <div class="mb-5 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
@endsection