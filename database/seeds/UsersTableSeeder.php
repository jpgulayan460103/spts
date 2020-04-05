<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'password' => 'admin',
            ]
        ];
        foreach ($users as $user) {
            $created_user = User::create($user);
            echo "\e[0;31m Created user: \e[0m";
            echo "\e[0;34m username:\e[0m $created_user->username ";
            echo "\e[0;34m password:\e[0m admin ";
            echo "\n";
        }
    }
}
