<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $filter){
        $query->when($filter ?? false, function($query, $search){
            return $query->where('id_penerbit', 'like', "%$search%")
                         ->orWhere('nama', 'like', "%$search%")
                         ->orWhere('alamat', 'like', "%$search%")
                         ->orWhere('kota', 'like', "%$search%")
                         ->orWhere('telepon', 'like', "%$search%");
        });
    }

    public function books(){
        return $this->hasMany(Book::class);
    }

    public function getRouteKeyName()
    {
        return 'id_penerbit';
    }
}
