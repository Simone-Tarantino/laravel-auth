<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) { 
            $newPost = new Post;
            $newPost->user_id = 1;
            $newPost->title = $faker->realText(20, 1);
            $newPost->body = $faker->realText(100, 2);
            $newPost->slug = Str::finish(Str::slug($newPost->title), rand(1, 1000000));

            $newPost->save();
        }
    }
}
