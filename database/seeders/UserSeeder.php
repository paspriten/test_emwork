<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'User Seeder',
            'email' => 'admin@emwork.com',
            'password' => Hash::make('password'), // ใช้รหัสผ่าน "password"
        ]);
    }
}
