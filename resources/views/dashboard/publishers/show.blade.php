@extends('dashboard.layouts.main')

@section('body')
    <div class="mb-3">
        <p>ID Penerbit : {{ $publisher->id_penerbit }}</p>
        <p>Alamat : {{ $publisher->alamat }}</p>
        <p>Kota : {{ $publisher->kota }}</p>
        <p>Telepon : {{ $publisher->telepon }}</p>
    </div>
@endsection