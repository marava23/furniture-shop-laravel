<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model= User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'userName' => $this->faker->userName,
            'firstName' => $this->faker->name,
            'lastName' => $this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'password' =>md5('Sifra123'),
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at' => null,
            'role_id' => Role::where('name', 'user')->first('id')->id
        ];
    }
}
