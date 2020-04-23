<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{

    protected $fillable = ['name'];
    //

    public function post(){
      return $this->belongsToMany(post::class);
    }
}
