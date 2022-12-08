<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideText extends Model
{
    protected $table = 'slide_text';
    public $timestamps = false;
    protected $fillable = [
        'text',
        'language_id',
        'slide_id',
    ];


}
