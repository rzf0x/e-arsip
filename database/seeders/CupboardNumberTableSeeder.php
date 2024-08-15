<?php

namespace Database\Seeders;

use App\Models\CupboardNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CupboardNumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'number' => 'Lemari 1',
                'description' => 'lorem ipsum dolor sit amet'
            ],
            [
                'number' => 'Lemari 2',
                'description' => 'lorem ipsum dolor sit amet'
            ],
        ];

        CupboardNumber::insert($data);
    }
}
