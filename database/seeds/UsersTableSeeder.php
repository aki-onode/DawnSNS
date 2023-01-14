<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'username' => 'user' . $i,
                'mail' => 'test' . $i . '@mail.com',
                'password' => Hash::make('pass' . $i),
                'bio' => '私はtest_user' . $i . 'です。',
            ]);
        }
    }
}
