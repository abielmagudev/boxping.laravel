<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tony Stark',
            'email' => 'tonystark@avengers.com',
            'password' => bcrypt('password'),
        ])->assignRole('admin');

        return User::factory(10)->create();
    }
}
