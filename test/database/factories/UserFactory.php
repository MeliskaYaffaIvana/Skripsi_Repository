<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\User::class;
    public function definition()
    {
         $nim = $this->faker->unique()->numerify('##########');
        return [
            'id' => md5($nim),
            'nama' => $this->faker->name,
            'nim' => $nim,
            'judul' => $this->faker->sentence,
            'deskripsi' => $this->faker->paragraph,
            'status' => 'mahasiswa',
            'password' => bcrypt($nim),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
