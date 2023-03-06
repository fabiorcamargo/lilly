<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortifolioPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'portifolio_id',
        'name',
        'description',
        'folder',
        'file',
        'category',
    ];

}
