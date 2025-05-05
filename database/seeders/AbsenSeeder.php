<?php

namespace Database\Seeders;

use App\Models\absen;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['hadir', 'izin', 'sakit', 'alpha'];

        $users = User::where('id', '!=', 1)->get();

        $start = Carbon::create(now()->year - 1, 6, 1); // 1 Juni tahun lalu
        $end = Carbon::create(now()->year, 3, 31); // 31 Maret tahun ini

        foreach ($users as $user) {
            $date = $start->copy();

            while ($date->lte($end)) {
                if (!$date->isWeekend()) { // hanya hari kerja (Senin - Jumat)
                    absen::create([
                        'user_id' => $user->id,
                        'tanggal' => $date->toDateString(),
                        'status' => $statuses[array_rand($statuses)],
                        'jam_masuk' => now()->setTime(rand(7, 9), rand(0, 59)),
                        'jam_keluar' => now()->setTime(rand(16, 18), rand(0, 59)),
                    ]);
                }
                $date->addDay();
            }
        }
    }
}
