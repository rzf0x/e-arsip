<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';
    protected $fillable = ['no', 'title', 'desc', 'year', 'sender', 'status', 'tipe_doc', 'file'];
}
