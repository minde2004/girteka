<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = [
        'text', 'status',
    ];
	
	public function messagesusers()
{
    return $this->hasMany('App\MessagesUsers', 'message_id');
}
}
