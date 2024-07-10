<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Statuses\UserStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make(12345678),
        ]);
        User::factory()->create([
            'name' => 'Create Admin',
            'email' => 'createAdmin@example.com',
            'password' => Hash::make(12345678),
            'role' => UserStatus::ADMIN,
        ]);
        User::factory()->create([
            'name' => 'delete Admin',
            'email' => 'deleteAdmin@example.com',
            'password' => Hash::make(12345678),
            'role' => UserStatus::ADMIN,
        ]);
        DB::table('permissions')->insert([
            ['name' => 'blog.create'],
            ['name' => 'blog.delete'],

        ]);
        DB::table('user-permission')->insert([
            [
                'permission_id' => 1,
                'user_id' => 2,

            ],
            [
                'permission_id' => 2,
                'user_id' => 3,

            ],

        ]);
    }
}
