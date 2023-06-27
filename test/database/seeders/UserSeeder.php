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
                'nim' => '1941720020',
                'nama' => 'Meliska',
                'judul' => 'Docker',
                'deskripsi' => 'Repository',
                'password' => Hash::make('ikaaa123'),
                'status'=>'mahasiswa'
            ],
            [
                'nim' => '1',
                'nama' => 'Admin',
                'judul' => 'Admin',
                'deskripsi' => 'Admin',
                'password' => Hash::make('admin123'),
                'status'=>'administrator'
            ],
        ];
        foreach($users as $user){
        User::create([
            'nim' => $user['nim'],
            'nama' => $user['nama'],
            'judul' => $user['judul'],
            'deskripsi' => $user['deskripsi'],
            'password' => $user['password'],
            'status' => $user['status'],
            'id' => User::getIdFromNim($user['nim']),
        ]);
        \App\Models\User::factory()->count(5)->create(); 
        }
    }
}