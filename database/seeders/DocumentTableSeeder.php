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
            'file' => 'file-1.pdf',
            'status' => 'inaktif',
            'tipe_doc' => 'tatalaksana_pelayanan_publik'
        ]);

        Document::create([
            'no' => 'doc-00021',
            'title' => 'Document Title 12',
            'desc' => 'Description 1',
            'year' => 2021,
            'sender' => 'Sender 1',
            'file' => 'file-1.pdf',
            'status' => 'inaktif',
            'tipe_doc' => 'tatalaksana_pelayanan_publik'
        ]);

        Document::create([
            'no' => 'doc-0003',
            'title' => 'Document Title 3',
            'desc' => 'Description 3',
            'year' => 2019,
            'sender' => 'Sender 3',
            'file' => 'file-1.pdf',
            'status' => 'inaktif',
            'tipe_doc' => 'kelembagaan_anjab'
        ]);

        Document::create([
            'no' => 'doc-0004',
            'title' => 'Document Title 4',
            'desc' => 'Description 4',
            'year' => 2018,
            'sender' => 'Sender 4',
            'file' => 'file-1.pdf',
            'status' => 'aktif',
            'tipe_doc' => 'inovasi_pelayanan_publik'
        ]);

        Document::create([
            'no' => 'doc-0004',
            'title' => 'Document Title 4',
            'desc' => 'Description 4',
            'year' => 2018,
            'sender' => 'Sender 4',
            'file' => 'file-1.pdf',
            'status' => 'aktif',
            'tipe_doc' => 'peningkatan_kinerja_reformasi_birokrasi'
        ]);
    }
}
