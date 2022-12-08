<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    public $timestamps = false;

    protected $fillable = [
        'logo',
        'phone',
        'telephone',
        'email',
        'instagram',
        'whatsapp',
        'facebook'
    ];

    public function text()
    {
        return $this->hasMany(SettingText::class);
    }

}
