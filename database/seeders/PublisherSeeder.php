<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publishers = [
            [
                'id_penerbit' => 'SP01',
                'nama' => 'Penerbit Informatika',
                'alamat' => 'Jl. Buah Batu No. 121',
                'kota' => 'Bandung',
                'Telepon' => '0813-2220-1946'
            ],
            [
                'id_penerbit' => 'SP02',
                'nama' => 'Andi Offset',
                'alamat' => 'Jl. Suryalaya IX No. 13',
                'kota' => 'Bandung',
                'Telepon' => '0878-3903-0688'
            ],
            [
                'id_penerbit' => 'SP03',
                'nama' => 'Danendra',
                'alamat' => 'Jl. Moch. Toha 44',
                'kota' => 'Bandung',
                'Telepon' => '022-5201215'
            ]
        ];

        foreach($publishers as $publisher){
            Publisher::create($publisher);
        }
    }
}
