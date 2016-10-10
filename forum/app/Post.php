<?php

namespace App;

use App\Category;
use App\City;
use App\Comment;
use App\Photo;
use App\Type;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Fields that cannot be mass assigned.
     *
     * @var array
     */
    protected $guarded = ['id', 'is_sticky'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function getSlug(){
    	return $this->id . '-' . str_replace(' ', '-',  $this->title);
    }

    public static function findFromSlug($slug){
    	$components = explode('-', $slug, 1);
    	$post = static::find($components[0]);
    	return $post;
    }

    public function photos(){
    	return $this->hasMany(Photo::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
