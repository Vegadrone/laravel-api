<?php

use App\Models\Post;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        for ($i = 0; $i < 100; $i++) {
            $newPost = new Post();
            $newPost->user_id = $faker->randomElement($users)->id;
            $newPost->title = $faker->realText(50);
            $newPost->post_image = "https://picsum.photos/300/180?random=1";
            $newPost->post_date = $faker->dateTimeThisYear();
            $newPost->post_content = $faker->paragraphs(5, true);
            $newPost->save();
        };
    }
}
