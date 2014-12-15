<?php

use Carbon\Carbon;


class Conversation extends Pichkrement\Messenger\Models\Conversation {

    protected $table = 'conversations';
    public $timestamps = true;

    public static $rules = array(
        'name' => 'required|min:4',
        );

    protected $fillable = ['name'];

    public function messages(){
        return $this->hasMany('\Pichkrement\Messenger\Models\Message');     
    }

    public function users(){
        return $this->belongsToMany('\Pichkrement\Messenger\Models\User');
    }
}
