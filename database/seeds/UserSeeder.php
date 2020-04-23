<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Yuri Dimas',
            'email' => 'yuridimas00@gmail.com',
            'email_verified_at' => (new datetime()),
            'password' => bcrypt('12345678'),
            'avatar' => 'default.jpg',
            'created_at' => (new datetime()),
            'updated_at' => (new datetime()),
        ]);
    }
}
