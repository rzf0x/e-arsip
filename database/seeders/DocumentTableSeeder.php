<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Document::create([
            'no' => 'doc-0001',
            'title' => 'Document Title 1',
            'desc' => 'Description 1',
            'year' => 2020,
            'sender' => 'Sender 1',
            'status' => 'rusak',
        ]);

        Document::create([
            'no' => 'doc-0002',
            'title' => 'Document Title 2',
            'desc' => 'Description 2',
            'year' => 2021,
            'sender' => 'Sender 2',
            'status' => 'hilang',
        ]);

        Document::create([
            'no' => 'doc-0003',
            'title' => 'Document Title 3',
            'desc' => 'Description 3',
            'year' => 2019,
            'sender' => 'Sender 3',
            'status' => 'musnah',
        ]);

        Document::create([
            'no' => 'doc-0004',
            'title' => 'Document Title 4',
            'desc' => 'Description 4',
            'year' => 2018,
            'sender' => 'Sender 4',
            'status' => 'layak',
        ]);
    }
}
