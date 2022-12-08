<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = [
        'image',
        'status_id',
    ];

    public function text(){
        return $this->hasMany(BlogText::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

}
