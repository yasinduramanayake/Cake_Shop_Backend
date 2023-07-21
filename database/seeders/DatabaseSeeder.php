<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Kumudu',
            'email' => 'kumudu@gmail.com',
            'password' => bcrypt('kumudu123#'),
            'address' => 'no:291/4,nawam mawatha , coat road , Kagalla',
            'mobile' => '0775516590',
            'role' => 'Admin'
        ]);
    }
}
