<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'amelia24si@mahasiswa.pcr.ac.id',
        //     'password' => Hash::make('555555')
        // ]);

        
    }
}
