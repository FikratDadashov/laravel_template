<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogText extends Model
{
    protected $table = 'blog_text';
    protected $fillable = [
        'text',
        'language_id',
        'blog_id',
        'created_at',
        'updated_at'
    ];


}
