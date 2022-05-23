<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        DB::table('users')->insert([
            'userName' => 'admin',
            'firstName' => 'Milos',
            'lastName' => 'Maravic',
            'email' => 'milos.maravic.269.19@ict.edu.rs',
            'password' => md5('Sifra123'),
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at' => null,
            'role_id' => 1
        ]);
        DB::table('users')->insert([
            'userName' => 'user',
            'firstName' => 'Milos',
            'lastName' => 'Maravic',
            'email' => 'maravicmilos1@gmail.com',
            'password' => md5('Sifra123'),
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at' => null,
            'role_id' => Role::where('name', 'user')->first('id')->id
        ]);
        User::factory()->count(20)->create();
    }
}
