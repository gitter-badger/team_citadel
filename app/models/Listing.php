<?php

class Listing extends Eloquent
{
    protected $table = 'listings';
    protected $guard = ['id', 'user_id'];
}
