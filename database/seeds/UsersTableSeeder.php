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
                'password'       => '$2y$10$YVpX.aAwT4AMzlDYktjJ5u6PaNsfigqwAO7YAmNKshL48718x.LvW',
                'remember_token' => null,
                'emp_code'       => '',
                'mobile'         => '',
            ],
        ];

        User::insert($users);
    }
}
