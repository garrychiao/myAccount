<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
  protected $fillable = array('name','creater_id');

  public function user()
  {
    return $this->belongsTo('App\User');
  }//
}
