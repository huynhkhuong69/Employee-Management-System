<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Hung Pham',
                'email' => 'hung.pham@sjsu.edu',
                'password' => Hash::make('hp123456'),
                'avatar' => 'images/avatars/hung.jpg',
                'is_admin' => true,
            ],
            [
                'name' => 'Khuong Huynh',
                'email' => 'huynhkhuong69@yahoo.com',
                'password' => Hash::make('kh123456'),
                'avatar' => 'images/avatars/khuong.jpg',
                'is_admin' => true,
            ],
            [
                'name' => 'Vivian Letran',
                'email' => 'vivsletran@gmail.com',
                'password' => Hash::make('vi123456'),
                'avatar' => 'images/avatars/vivian.jpg',
                'is_admin' => true,
            ],
            [
                'name' => 'Huyen Phan',
                'email' => 'huyen.phan@sjsu.edu',
                'password' => Hash::make('hp123456'),
                'avatar' => 'images/avatars/huyen.jpg',
                'is_admin' => true,
            ],
            [
                'name' => 'Test User',
                'email' => 'test@gmail.com',
                'password' => Hash::make('tt123456'),
                'avatar' => 'images/avatars/test_user.png',
                'is_admin' => false,
            ],
        ];
        User::insert($users);
    }
}
