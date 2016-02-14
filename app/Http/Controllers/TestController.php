<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class TestController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = DB::table('categories')
        ->join('my_assets', function ($join) {
            $join->on('my_assets.category', '=', 'categories.id')
                 ->where('my_assets.user_id', '=', 'categories.creater_id');
        })->select(DB::raw('my_assets.name as name1, categories.name as name2, income, expenditure, amount'))->get();
    //var_dump($users);
    foreach ($users as $user) {
      echo $user->income."<br>";
      echo $user->expenditure."<br>";
      echo $user->amount."<br>";
      echo $user->name1."<br>";
      echo $user->name2."<br><br>";
    }

  }
}
