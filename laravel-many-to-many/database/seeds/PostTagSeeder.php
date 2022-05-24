<?php

use Illuminate\Database\Seeder;

use App\Tag;

use App\Post;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        foreach ($posts as $post) {

            $postTags = Tag::inRandomOrder()
                    ->limit(rand(1, 4))->get();
            
            $post->tags()->attach($postTags->pluck('id')->all());
        }

    }
}
