<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Mr. Super Admin',
            'email' => 'superadmin@gmail.com',
            'phone' => '01737933939',
            'type' => 'super',
            'password' => bcrypt('rootsuperadmin'),
            'created_at' => '2023-03-09',
        ]);

        DB::table('users')->insert([
            'name' => 'Mr. Admin',
            'email' => 'admin@gmail.com',
            'phone' => '01822442222',
            'type' => 'admin',
            'password' => bcrypt('rootadmin'),
            'created_at' => '2023-03-09',
        ]);

        DB::table('users')->insert([
            'name' => 'Mr. Author',
            'email' => 'author@gmail.com',
            'phone' => '01822442222',
            'type' => 'author',
            'password' => bcrypt('rootauthor'),
            'created_at' => '2023-03-09',
        ]);

        DB::table('users')->insert([
            'name' => 'Mr. User',
            'email' => 'user@gmail.com',
            'phone' => '01822442222',
            'type' => 'user',
            'password' => bcrypt('rootuser'),
            'created_at' => '2023-03-09',
        ]);
    }
}
