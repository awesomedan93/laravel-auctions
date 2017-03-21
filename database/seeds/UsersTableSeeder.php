<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nathan Nicolas',
            'email' => 'info@auctionsinatlanta.com',
            'password' => bcrypt('qwerty'),
        ]);
    }
}
