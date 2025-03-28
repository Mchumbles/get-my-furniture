<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    use HasFactory;

    protected $table = 'furniture';

    protected $fillable = 
        ['name', 'category', 'description', 'price', 'height', 'width', 'depth'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
