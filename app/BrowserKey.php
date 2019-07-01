<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrowserKey extends Model
{
    protected $fillable = [
        'user_id', 'key', 'browser',
    ];
	
	public function usersbrowserkey()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
}
