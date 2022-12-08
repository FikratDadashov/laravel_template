<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    public $timestamps = false;
    protected $fillable = [
        'image',
        'status_id',
    ];

    public function text(){
        return $this->hasMany(ServiceText::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

}
