<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{

//  use SoftDeletes;

  public $timestamps = false;
  protected $fillable = ['title','description','content','published_at','category_id','image','user_id'];
    //

  public function category(){
    return $this->belongsTo(category::class);
  }

  public function tag(){
    return $this->belongsToMany(tag::class);
  }

  public function hasTag($tagsid){
    return in_array('$tagsid', $this->tag->pluck('id')->toArray());
  }
  public function user(){
    return $this->belongsTo(User::class);

  }
}
