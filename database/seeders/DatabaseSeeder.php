<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Dosen::create([
            'nama' => 'dosen 1',
            'nip' => 'dosen1',
            'password' => bcrypt('qazwsx')
        ]);

        Dosen::create([
            'nama' => 'dosen 2',
            'nip' => 'dosen2',
            'password' => bcrypt('qazwsx')
        ]);

        Dosen::create([
            'nama' => 'dosen 3',
            'nip' => 'dosen3',
            'password' => bcrypt('qazwsx')
        ]);

        Admin::create([
            'username' => 'admin',
            'password' => bcrypt('qazwsx')
        ]);

        Mahasiswa::create([
            'nama' => 'mahasiswa',
            'nim' => 'mahasiswa',
            'password' => bcrypt('qazwsx'),
            'semester' => '1',
        ]);

        Mahasiswa::create([
            'nama' => 'mahasiswa1',
            'nim' => 'mahasiswa1',
            'password' => bcrypt('qazwsx'),
            'semester' => '1',
        ]);

    }
}
