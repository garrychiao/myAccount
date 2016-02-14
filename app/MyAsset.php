<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyAsset extends Model
{
    protected $fillable = array('name','income','expenditure','amount','remark','category');

    public function user()
    {
      return $this->belongsTo('App\User');
    }//
}
