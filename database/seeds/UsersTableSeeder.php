<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultToken = '8ZwdVGvFUjU9r1JfdjJ8ZkiiJKNT6I75XH4KLm3Dr10LuGrEWhrL56YrjDgqeQWhegzs3GrUHdG7cN5T';
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
            'api_token' => hash('sha256', $defaultToken)
        ]);
    }
}
