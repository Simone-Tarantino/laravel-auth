<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'email',
        'body',
        'post_id',
        'created_at',
        'updated_at'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
