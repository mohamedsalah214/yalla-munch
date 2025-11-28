<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'admin@yallamunch.com';
        $user = User::firstOrNew(['email' => $email]);
        $user->name = 'admin';
        $user->email = $email;
        $user->password = Hash::make('123456');
        $user->save();
    }
}
