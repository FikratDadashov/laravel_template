<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingText extends Model
{
    protected $table = 'setting_text';
    public $timestamps = false;

    protected $fillable = [
        'language_id',
        'mobile'
    ];

}
