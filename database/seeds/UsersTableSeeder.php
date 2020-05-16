<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$JdXF2RjjIgSTIfezSfA9O..Z3mV.OP9vZpbGJlV.cb4CgOB9tNOL6',
                'remember_token' => null,
                'emp_code'       => '',
                'mobile'         => '',
            ],
        ];

        User::insert($users);
    }
}
