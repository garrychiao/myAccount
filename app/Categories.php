<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
  protected $fillable = array('category_name','creater_id','category_type');

  public function user()
  {
    return $this->belongsTo('App\User');
  }//
}
