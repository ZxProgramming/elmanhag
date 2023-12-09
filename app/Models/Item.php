<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room_gallery extends Model
{
    protected $fillable = [
        'room_id', 'img', 'ordering', 'status',
    ];
}