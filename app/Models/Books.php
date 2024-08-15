<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_book', 'title_book', 'year_publish', 'book_publisher', 'status', 'foto', 'cupboard_number_id'
    ];

    public function cupboardNumber()
    {
        return $this->belongsTo(CupboardNumber::class);
    }
}
