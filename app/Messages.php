<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = ['message', 'icon', 'color'];
    protected $hidden = [];
}
