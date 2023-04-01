<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
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
            'username' => 'Meliska',
                'password' => Hash::make('ikaaa123'),
                'status'=>'mahasiswa'
            ],
            [
                'username' => 'Administrator',
                'password' => Hash::make('admin123'),
                'status'=>'administrator'
            ],
        ];
        User::insert($users);
    }
}
