<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room_gallery extends Model
{
    protected $fillable = [
        'title', 'order', 'status',
    ];
}