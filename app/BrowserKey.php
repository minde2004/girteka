<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrowserKey extends Model
{
    protected $fillable = [
        'user_id', 'key', 'browser',
    ];
}
