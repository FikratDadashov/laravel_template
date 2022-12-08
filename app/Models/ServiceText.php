<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceText extends Model
{
    protected $table = 'service_text';
    protected $fillable = [
        'text',
        'language_id',
        'service_id'
    ];


}
