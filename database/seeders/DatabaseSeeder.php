<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //     for ($i=0; $i < 10000; $i++) { 
        //         DB::table('articles')->insert([
        //            'title' => Str::random(5),
        //            'content' => Str::random(10),  

        //        ]);
        //    }

        // \App\Models\User::factory(10)->create();
        // for ($i=0; $i < 100; $i++) { 
        //     DB::table('users')->insert([
        //         'name' => Str::random(5),
        //         'email' => Str::random(5).'@gmail.com',
        //         'designation' => Str::random(4),
        //     ]);
        // }
        for ($i = 0; $i < 100; $i++) {
            DB::table('students')->insert([
                'name' => Str::random(5),
                'course' => Str::random(5),
                'email' => Str::random(5) . '@gmail.com',
                'phone' => Str::random(6),
            ]);
        }
    }
}
