<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            Post::create([
                'user_id' => $i,
                'post' => 'テスト投稿' . $i,
            ]);
        }
    }
}
