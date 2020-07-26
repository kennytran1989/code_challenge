<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $admin_credentials = [
            'full_name' => 'Admin',
            'role'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => \Illuminate\Support\Facades\Hash::make(123456)
        ];
        \App\Models\User::create($admin_credentials);
        $user_credentials = [
            'full_name' => 'Kenny Huy',
            'role'      => 'user',
            'email'     => 'kennyhuy@gmail.com',
            'password'  => \Illuminate\Support\Facades\Hash::make(123456)
        ];
        \App\Models\User::create($user_credentials);
    }
}
