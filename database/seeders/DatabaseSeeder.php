<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\tr_krriteria;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'sekar',
        //     'username' => 'sekar',
        //     'email' => 'sekar@gmail.com',
        //     'password' => bcrypt('12345'),
        //     'jabatan' => 'Staff'
        // ]);

        User::create([
            'name' => 'daus',
            'username' => 'daus',
            'email' => 'daus@gmail.com',
            'password' => bcrypt('12345'),
            'jabatan' => 'Manager',
            'is_admin' => 1

        ]);

        User::create([
            'name' => 'captain',
            'username' => 'captain',
            'email' => 'captain@gmail.com',
            'password' => bcrypt('12345'),
            'jabatan' => 'Captain',
            'is_admin' => 2

        ]);

        // tr_krriteria::factory(10)->create();
        // $this->call([
        //     AbsenSeeder::class,
        // ]);

        $kriteriaList = [
            ['kriteria' => 'Kehadiran', 'bobot' => 20, 'tipe' => 'benefit'],
            ['kriteria' => 'Pengalaman Kerja', 'bobot' => 30, 'tipe' => 'benefit'],
            ['kriteria' => 'Jenjang Pendidikan', 'bobot' => 25, 'tipe' => 'benefit'],
            ['kriteria' => 'Disiplin', 'bobot' => 15, 'tipe' => 'benefit'],
            ['kriteria' => 'Kesalahan Kerja', 'bobot' => 10, 'tipe' => 'cost'],
        ];

        foreach ($kriteriaList as $kriteria) {
            tr_krriteria::create($kriteria);
        }
    }
}
