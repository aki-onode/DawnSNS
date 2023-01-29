<?php

use Illuminate\Database\Seeder;
use App\Models\Follow;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 2; $i <= 20; $i++) {
            Follow::create([
                'follow_id' => $i,
                'follower_id' => 1,
            ]);
        }
    }
}
