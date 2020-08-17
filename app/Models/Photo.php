<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{   
    
    protected $fillable = ['album_id', 'title', 'photo', 'size', 'description'];
    protected $hidden = [
        'album_id',
    ];

    public function Album(){
        return $this->belongsTo(Album::class);
    }
}
