<?php

namespace App;

use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Fields that cannot be mass assigned.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function post(){
    	return $this->belongsTo(Post::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
    
}
