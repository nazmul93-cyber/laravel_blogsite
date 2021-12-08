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
        // for ($i = 0; $i < 100; $i++) {
        //     DB::table('students')->insert([
        //         'name' => Str::random(5),
        //         'course' => Str::random(5),
        //         'email' => Str::random(5) . '@gmail.com',
        //         'phone' => Str::random(6),
        //     ]);
        // }
        // for ($i = 0; $i < 100; $i++) {
        //     DB::table('books')->insert([
        //         'name' => Str::random(5),
        //     ]);
        // }
        for ($i = 0; $i < 1000; $i++) {
            DB::table('companies')->insert([
                'name' => Str::random(5).".org",
            ]);
            for($j = 0; $j < 50; $j++){
                DB::table('employees')->insert([
                    'name' => Str::random(5),
                    'email' => Str::random(5)."@gmail.com",
                    'company_id' => $i+1,
                    'birthday' => Str::random(8),
                ]);
            }
        }
//        for($i=0; $i<50000; $i++){
//            $int= mt_rand(1262055681,1262055681);
//            DB::table('logins')->insert([
//                'employee_id' => $i+1,
//                'ip_address' => rand(8,16),
//                'created_at' => date("Y-m-d H:i:s",$int),
//            ]);
//        }
//        for($i=0; $i<10; $i++){
//            DB::table('features')->insert([
//                'title' => Str::random(10),
//                'status' => 'completed',
//            ]);
//        }
    }
}
