<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    public $timestamps = false;
    protected $fillable = [
        'mobile',
        'email',
        'facebook',
        'instagram'
    ];

    public function text(){
        return $this->hasMany(ContactText::class);
    }

}
