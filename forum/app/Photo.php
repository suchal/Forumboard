<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    /**
     * Fields that cannot be mass assigned.
     *
     * @var array
     */
    protected $guarded = ['id'];


    public $dir = "photos/";

    public function post(){
    	return $this->belongsTo(Post::class);
    }

    public function setNameAttribute($name){
        $this->attributes['name'] = $name;
        $this->attributes['path'] = $this->dir . $name;
        $this->attributes['thumbnail_path'] = $this->dir . '_'  . $name;
    }

}
