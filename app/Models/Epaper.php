<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epaper extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'qty',
        'datetime',
        'is_publish',
        'extra1',
        'map_id',
        'created_by',
        'updated_by',
    ];
    public function epaperLinks()
    {
        return $this->hasMany(EpaperLink::class);
    }
}
