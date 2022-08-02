<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        Employee::create([
          'nik' => $faker->nik(),
          'name' => 'Admin Pengelola',
          'email' => 'admin@gmail.com',
          'phone' => '085533221190',
          'gender' => 'laki',
          'photo' =>  $faker->image(),
          'address' => 'Jl. Soetomo'
        ]);

    }
}
