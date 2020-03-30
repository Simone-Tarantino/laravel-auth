<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'body',
        'slug',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
