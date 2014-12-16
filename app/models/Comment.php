<?php

class Comment extends Eloquent
{
    protected $table = 'comments';
    protected $fillable = ['comment', 'commentable_id', 'commentable_type'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
