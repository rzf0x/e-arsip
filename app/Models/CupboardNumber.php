<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CupboardNumber extends Model
{
    use HasFactory;

    protected $table = 'cupboard_numbers';

    protected $fillable = [
        'number', 'description'
    ];

    public function books()
    {
        return $this->hasMany(Books::class);
    }
}
