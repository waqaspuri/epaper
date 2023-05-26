<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpaperLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'coordinate',
        'link',
        'map_id',
        'epaper_id',
        'extra1',
    ];

    public function epaper()
    {
        return $this->belongsTo('Apps\Epaper');
    }

    public function mainPaper()
    {
        return $this->hasOne(Epaper::class, 'id','epaper_id');
    }
}
