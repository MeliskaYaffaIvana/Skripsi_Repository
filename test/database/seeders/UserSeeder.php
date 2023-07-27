<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserAdmin;
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
                'deskripsi' => 'Admin',
                'password' => Hash::make('admin123'),
                'status'=>'administrator'
            ],
        ];
        foreach ($users as $userData) {
            $userData['id'] = User::getIdFromNim($userData['nim']);
            UserAdmin::create($userData);
        }
    }
}