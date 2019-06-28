<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = [
        'title', 'text', 'status',
    ];
	
	public function messagesusers()
{
    return $this->hasMany('App\MessagesUsers', 'message_id');
}
}
