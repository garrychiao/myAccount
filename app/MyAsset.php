<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyAsset extends Model
{
    protected $fillable = array('user_id','category_id','title','amount','date','remark');

    public function user()
    {
      return $this->belongsTo('App\User');
    }//
}
