<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $kategori=[
            [
            'id_kat' => '1',
                'nama_kat' => 'Database'
            ],
            [
                'id_kat' => '2',
                'nama_kat' => 'Frontend'
            ],
            [
                'id_kat' => '3',
                'nama_kat' => 'Backend'
            ]
        ];
        Kategori::insert($kategori);
    }
}
