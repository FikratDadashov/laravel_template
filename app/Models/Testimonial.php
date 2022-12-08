<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonial';
    public $timestamps = false;
    protected $fillable = [
        'image',
        'status_id',
    ];

    public function text(){
        return $this->hasMany(TestimonialText::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

}
