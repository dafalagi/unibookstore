@extends('dashboard.layouts.main')

@section('body')
    <div class="mb-3">
        <p>ID Buku : {{ $book->id_buku }}</p>
        <p>Kategori : {{ $book->kategori }}</p>
        <p>Harga : {{ $book->harga }}</p>
        <p>Stok : {{ $book->stok }}</p>
        <p>Penerbit : {{ $book->penerbit }}</p>
    </div>
@endsection