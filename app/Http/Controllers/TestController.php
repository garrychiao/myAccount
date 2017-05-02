<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\YahooStock;

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
    $objYahooStock = new YahooStock;

    $objYahooStock->addFormat("snl1d1t1cvj1");


    $objYahooStock->addStock("6575.TWO");
    $objYahooStock->addStock("yhoo");
    $objYahooStock->addStock("goog");
    $objYahooStock->addStock("vgz");

    return view('stock.index')->with('fetch_result',$objYahooStock->getQuotes());

  }

  public function create(Request $request)
  {
    echo $request->StockName;
    $objYahooStock = new YahooStock;

    $objYahooStock->addFormat("snl1d1t1cvj1");
    $objYahooStock->addStock($request->StockName);

    //$objYahooStock->addStock("6575.TWO");
    //$objYahooStock->addStock("yhoo");
    //$objYahooStock->addStock("goog");
    //$objYahooStock->addStock("vgz");

    return view('stock.index')->with('fetch_result',$objYahooStock->getQuotes());

  }
}
