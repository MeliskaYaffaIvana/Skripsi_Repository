<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
                'nim' => '1',
                'nama' => 'Admin',
                'judul' => 'Admin',
                'prodi' => 'TI',
                'deskripsi' => 'Admin',
                'password' => Hash::make('admin123'),
                'status'=>'administrator'
            ],
            [
                'nim' => '1941720020',
                'nama' => 'ika',
                'judul' => 'yaffa',
                'prodi' => 'TI',
                'deskripsi' => 'ivana',
                'password' => Hash::make('1941720020'),
                'status'=>'mahasiswa'
            ],
            [
                'nim' => '2241760021',
                'nama' => 'melis',
                'judul' => 'ka',
                'prodi' => 'SIB',
                'deskripsi' => 'yo',
                'password' => Hash::make('2241760021'),
                'status'=>'mahasiswa'
            ],
        ];
        foreach ($users as $userData) {
            $userData['id'] = User::getIdFromNim($userData['nim']);
            User::create($userData);
        }
    }
}