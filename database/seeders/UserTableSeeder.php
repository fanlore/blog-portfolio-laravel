<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Администратор',
            'email' => 'admin@mail.ru',
            'image' => 'http://placehold.it/300x200&text=Hello+World',
            'password' => 'admin12345678',
        ]);
        $user1 = User::create([
            'name' => 'Андрей',
            'email' => 'andy@mail.ru',
            'image' => 'http://placehold.it/300x200&text=Hello+World',
            'password' => 'andrey12345678',
        ]);
        $user2 = User::create(
        [
            'name' => 'Иван',
            'email' => 'ivan@mail.ru',
            'image' => 'http://placehold.it/300x200&text=Hello+World',
            'password' => 'vanya12345678',
        ]
        );
        $admin->assignRole('admin');
        $user1->assignRole('user');
        $user2->assignRole('user');


    }
}
