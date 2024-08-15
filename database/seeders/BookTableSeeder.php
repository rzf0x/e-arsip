<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Books::create([
            'no_book' => 1,
            'title_book' => 'Book Title 1',
            'year_publish' => 2020,
            'book_publisher' => 'Publisher 1',
            'status' => 'rusak',
            'foto' => 'path/to/foto1.jpg',
            'cupboard_number_id' => 1,
        ]);

        Books::create([
            'no_book' => 2,
            'title_book' => 'Book Title 2',
            'year_publish' => 2021,
            'book_publisher' => 'Publisher 2',
            'status' => 'hilang',
            'foto' => 'path/to/foto2.jpg',
            'cupboard_number_id' => 2,
        ]);

        Books::create([
            'no_book' => 3,
            'title_book' => 'Book Title 3',
            'year_publish' => 2019,
            'book_publisher' => 'Publisher 3',
            'status' => 'musnah',
            'foto' => 'path/to/foto3.jpg',
            'cupboard_number_id' => 1,
        ]);

        Books::create([
            'no_book' => 4,
            'title_book' => 'Book Title 4',
            'year_publish' => 2018,
            'book_publisher' => 'Publisher 4',
            'status' => 'layak',
            'foto' => 'path/to/foto4.jpg',
            'cupboard_number_id' => 2,
        ]);
    }
}
