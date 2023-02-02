<?php

namespace Database\Seeders;

use App\Enums\BookCategory;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'publisher_id' => 1,
                'id_buku' => 'K1001',
                'kategori' => BookCategory::Keilmuan,
                'nama_buku' => 'Analisis & Perancangan Sistem Informasi',
                'harga' => 50000,
                'stok' => 60,
                'penerbit' => 'Penerbit Informatika'
            ],
            [
                'publisher_id' => 1,
                'id_buku' => 'K1002',
                'kategori' => BookCategory::Keilmuan,
                'nama_buku' => 'Artificial Intelligence',
                'harga' => 45000,
                'stok' => 60,
                'penerbit' => 'Penerbit Informatika'
            ],
            [
                'publisher_id' => 1,
                'id_buku' => 'K2003',
                'kategori' => BookCategory::Keilmuan,
                'nama_buku' => 'Autocad 3 Dimensi',
                'harga' => 40000,
                'stok' => 25,
                'penerbit' => 'Penerbit Informatika'
            ],
            [
                'publisher_id' => 1,
                'id_buku' => 'B1001',
                'kategori' => BookCategory::Bisnis,
                'nama_buku' => 'Bisnis Online',
                'harga' => 75000,
                'stok' => 9,
                'penerbit' => 'Penerbit Informatika'
            ],
            [
                'publisher_id' => 1,
                'id_buku' => 'K3004',
                'kategori' => BookCategory::Keilmuan,
                'nama_buku' => 'Cloud Computing Technology',
                'harga' => 85000,
                'stok' => 15,
                'penerbit' => 'Penerbit Informatika'
            ],
            [
                'publisher_id' => 1,
                'id_buku' => 'B1002',
                'kategori' => BookCategory::Bisnis,
                'nama_buku' => 'Etika Bisnis dan Tanggung Jawab Sosial',
                'harga' => 67500,
                'stok' => 20,
                'penerbit' => 'Penerbit Informatika'
            ],
            [
                'publisher_id' => 2,
                'id_buku' => 'N1001',
                'kategori' => BookCategory::Novel,
                'nama_buku' => 'Cahaya Di Penjuru Hati',
                'harga' => 68000,
                'stok' => 10,
                'penerbit' => 'Andi Offset'
            ],
            [
                'publisher_id' => 3,
                'id_buku' => 'N1002',
                'kategori' => BookCategory::Novel,
                'nama_buku' => 'Aku Ingin Cerita',
                'harga' => 48000,
                'stok' => 12,
                'penerbit' => 'Danendra'
            ]
        ];

        foreach($books as $book){
            Book::create($book);
        }
    }
}
