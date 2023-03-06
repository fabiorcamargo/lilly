<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portifolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'tags',
        'category',
        'bg',
    ];

    public function photos()
    {
        return $this->hasMany(PortifolioPhoto::class);
    }
    
}
