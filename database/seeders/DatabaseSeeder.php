<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $pass = 'anypass123';
        User::create([
          'name' => 'Manuel',
          'email' => 'manuel112@gmail.com',
          'password' => Hash::make($pass),
          'role' => 'users',
          'active' => 0,
          ]);
          
          
        User::create([
          'name' => 'Demy',
          'email' => 'demcaj2017@gmail.com',
          'password' => Hash::make('anypass123'),
          'role' => 'admin',
          'active' => 1,
          ]);
        
        
        User::create([
          'name' => 'Selene Gomez',
          'email' => 'selene734@gmail.com',
          'password' => Hash::make('SeleneThis123'),
          'role' => 'user',
          'active' => 0,
          ]);
    }
}
