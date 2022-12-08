<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialText extends Model
{
    protected $table = 'testimonial_text';
    public $timestamps = false;
    protected $fillable = [
        'text',
        'language_id',
        'testimonial_id'
    ];


}
