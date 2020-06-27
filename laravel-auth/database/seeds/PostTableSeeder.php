<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts= 10;
        for ( $i=0;  $i <$posts;  $i++ ) {
            $newPost = new Post();

            $title = $faker->text(50);

            $newPost->user_id = 1;
            $newPost->title = $title;
            $newPost->body = $faker->paragraph(3, true);
            $newPost->slug = Str::slug($title, '-');

            $newPost->save();
        }
    }
}
