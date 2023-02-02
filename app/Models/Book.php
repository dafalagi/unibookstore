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

    public function scopeFilter($query, $filter){
        $query->when($filter ?? false, function($query, $search){
            return $query->where('id_buku', 'like', "%$search%")
                         ->orWhere('nama', 'like', "%$search%")
                         ->orWhere('kategori', 'like', "%$search%")
                         ->orWhere('penerbit', 'like', "%$search%");
        });
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function getRouteKeyName()
    {
        return 'id_buku';
    }
}
