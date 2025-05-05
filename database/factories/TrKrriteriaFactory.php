<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TrKriteria;

class TrKriteriaFactory extends Factory
{
    protected $model = TrKriteriaFactory::class;

    public function definition(): array
    {
        $kriteriaList = [
            ['kriteria' => 'Kehadiran', 'bobot' => 20, 'tipe' => 'benefit'],
            ['kriteria' => 'Pengalaman Kerja', 'bobot' => 30, 'tipe' => 'benefit'],
            ['kriteria' => 'Jenjang Pendidikan', 'bobot' => 25, 'tipe' => 'benefit'],
            ['kriteria' => 'Disiplin', 'bobot' => 15, 'tipe' => 'benefit'],
            ['kriteria' => 'Kesalahan Kerja', 'bobot' => 10, 'tipe' => 'cost'],
        ];

        $item = $this->faker->unique()->randomElement($kriteriaList);

        return [
            'kriteria' => $item['kriteria'],
            'bobot' => $item['bobot'],
            'tipe' => $item['tipe'],
        ];
    }
}
