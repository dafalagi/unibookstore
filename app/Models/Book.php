<?php

namespace App\Models;

use App\Enums\BookCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'kategori' => BookCategory::class,
    ];

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
}
