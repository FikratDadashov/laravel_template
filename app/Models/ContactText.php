<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactText extends Model
{
    protected $table = 'contact_text';
    public $timestamps = false;
    protected $fillable = [
        'language_id',
        'contact_id',
        'address'
    ];

}
