<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'username' => 'TEST' .$i,
                'mail' => '@test.com',
                'password' => Hash::make('1111'),
                'bio' => 'test_bio',
                'images' => 'public/images/icon1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
