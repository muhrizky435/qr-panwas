<?php

namespace Database\Seeders;

use App\Models\panwas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class panwasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $panwas = [
            [
                'no' => '1',
                'nama' => 'Danu'
            ],
            [
                'no' => '2',
                'nama' => 'Danu'
            ]
        ];

        panwas::insert($panwas);
    }
}
