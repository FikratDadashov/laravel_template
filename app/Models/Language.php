<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'image'
    ];

    public function status() {
        return $this->belongsTo(Status::class);
    }

}
