<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2024-08-07 02:09:44',
                'verification_token' => '',
                'two_factor_code'    => '',
                'street'             => '',
                'phone_number'       => '',
            ],
        ];

        User::insert($users);
    }
}
