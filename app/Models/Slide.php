<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slide';
    public $timestamps = false;
    protected $fillable = [
        'image',
        'status_id',
    ];

    public function text(){
        return $this->hasMany(SlideText::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

}
