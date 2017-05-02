<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  protected $fillable = array('user_id','stockid');

  public function user()
  {
    return $this->belongsTo('App\User');
  }//
}
