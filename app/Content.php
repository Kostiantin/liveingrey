<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'text_ref', 'section_id', 'content', 'label', 'user_id'
    ];
}
