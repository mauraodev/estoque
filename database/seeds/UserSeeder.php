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
            'name' => 'admin',
            'email' => 'maurao.dev@gmail.com',
            'password' => Hash::make('key@1451'),
            'company_id' => 1,
        ]);
    }
}
