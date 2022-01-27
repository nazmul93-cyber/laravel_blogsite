<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
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

//    User::factory(10)->create();
//    Post::factory(15)->create();
    Comment::factory(10)->create();



//        $user = User::factory()->create([                           //specifying just one value
//            'name' => 'naz al',
//        ]);
//    Post::factory(15)->create([
//        'user_id' => $user->id,
//    ]);









        // functioning codes
//       User::truncate();
//       Post::truncate();
//       Category::truncate();
//
//    $user = User::factory()->create();
//
//    $personal = Category::create([
//        'name' => 'Personal',
//        'slug' => 'personal',
//    ]);
//    $work = Category::create([
//        'name' => 'Work',
//        'slug' => 'work',
//    ]);
//    $family = Category::create([
//        'name' => 'Family',
//        'slug' => 'family',
//    ]);
//
//    Post::create([
//        'user_id' => $user->id,
//        'category_id' => $family->id,
//        'title' => 'My First Family Post',
//        'slug' => 'my-1st-family-post',
//        'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque egestas congue quisque egestas diam in. Diam in arcu cursus euismod quis viverra nibh. ',
//        'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque egestas congue quisque egestas diam in. Diam in arcu cursus euismod quis viverra nibh. Lectus quam id leo in vitae turpis massa sed elementum. Molestie nunc non blandit massa enim. Sapien faucibus et molestie ac feugiat sed. Amet facilisis magna etiam tempor orci. Viverra ipsum nunc aliquet bibendum enim facilisis. Elementum nisi quis eleifend quam adipiscing vitae proin sagittis. In dictum non consectetur a erat nam at lectus. Non curabitur gravida arcu ac tortor dignissim convallis aenean. Et sollicitudin ac orci phasellus egestas. Non consectetur a erat nam at lectus. Nibh tortor id aliquet lectus proin nibh nisl. Diam maecenas ultricies mi eget mauris pharetra. Enim praesent elementum facilisis leo vel. Morbi tempus iaculis urna id volutpat lacus. Sed lectus vestibulum mattis ullamcorper.',
//    ]);
//    Post::create([
//        'user_id' => $user->id,
//        'category_id' => $work->id,
//        'title' => 'My First Work Post',
//        'slug' => 'my-1st-work-post',
//        'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque egestas congue quisque egestas diam in. Diam in arcu cursus euismod quis viverra nibh. ',
//        'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque egestas congue quisque egestas diam in. Diam in arcu cursus euismod quis viverra nibh. Lectus quam id leo in vitae turpis massa sed elementum. Molestie nunc non blandit massa enim. Sapien faucibus et molestie ac feugiat sed. Amet facilisis magna etiam tempor orci. Viverra ipsum nunc aliquet bibendum enim facilisis. Elementum nisi quis eleifend quam adipiscing vitae proin sagittis. In dictum non consectetur a erat nam at lectus. Non curabitur gravida arcu ac tortor dignissim convallis aenean. Et sollicitudin ac orci phasellus egestas. Non consectetur a erat nam at lectus. Nibh tortor id aliquet lectus proin nibh nisl. Diam maecenas ultricies mi eget mauris pharetra. Enim praesent elementum facilisis leo vel. Morbi tempus iaculis urna id volutpat lacus. Sed lectus vestibulum mattis ullamcorper.',
//    ]);
//    Post::create([
//        'user_id' => $user->id,
//        'category_id' => $personal->id,
//        'title' => 'My First Personal Post',
//        'slug' => 'my-1st-personal-post',
//        'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque egestas congue quisque egestas diam in. Diam in arcu cursus euismod quis viverra nibh. ',
//        'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque egestas congue quisque egestas diam in. Diam in arcu cursus euismod quis viverra nibh. Lectus quam id leo in vitae turpis massa sed elementum. Molestie nunc non blandit massa enim. Sapien faucibus et molestie ac feugiat sed. Amet facilisis magna etiam tempor orci. Viverra ipsum nunc aliquet bibendum enim facilisis. Elementum nisi quis eleifend quam adipiscing vitae proin sagittis. In dictum non consectetur a erat nam at lectus. Non curabitur gravida arcu ac tortor dignissim convallis aenean. Et sollicitudin ac orci phasellus egestas. Non consectetur a erat nam at lectus. Nibh tortor id aliquet lectus proin nibh nisl. Diam maecenas ultricies mi eget mauris pharetra. Enim praesent elementum facilisis leo vel. Morbi tempus iaculis urna id volutpat lacus. Sed lectus vestibulum mattis ullamcorper.',
//    ]);











  // previously done - all functioning
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
//        for ($i = 0; $i < 1000; $i++) {
//            DB::table('companies')->insert([
//                'name' => Str::random(5).".org",
//            ]);
//            for($j = 0; $j < 50; $j++){
//                DB::table('employees')->insert([
//                    'name' => Str::random(5),
//                    'email' => Str::random(5)."@gmail.com",
//                    'company_id' => $i+1,
//                    'birthday' => Str::random(8),
//                ]);
//            }
//        }
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
