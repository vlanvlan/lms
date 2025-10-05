<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Ega',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'avatar' => null,
                'bio' => null,
            ]
        );

        $role = Role::where('name', 'admin')->first();

        if ($role) {
            $user->assignRole($role);
        }
    }
}
