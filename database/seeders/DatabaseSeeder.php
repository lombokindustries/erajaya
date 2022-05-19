<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'firstname' => 'M.',
        //     'lastname' => 'Ardiansyah',
        //     'hp' => '087839146177',
        //     'email' => 'admin@admin.com',
        //     'password' => 'adminadmin',
        //     'role' => 'sa',
        //     'status'=>'vr',
        // ]);
    }
}
