<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessagesUsers extends Model
{
    protected $fillable = [
        'message_id', 'user_id',
    ];
	public function messages()
	{
		return $this->belongsTo('App\Messages', 'message_id');
	}
}
