<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Stock;
use App\YahooStock;


class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $stock = Stock::where('user_id', Auth::id())->orderBy('id', 'desc')->pluck('stock_id');

      $objYahooStock = new YahooStock;
      $objYahooStock->addFormat("snl1d1t1cvj1");
      var_dump($stock);
      foreach ($stock as $stock_list) {
        $objYahooStock->addStock($stock_list);
      }
      //$objYahooStock->addStock("yhoo");
      //$objYahooStock->addStock("goog");
      //$objYahooStock->addStock("vgz");

      return view('stock.index')->with('fetch_result',$objYahooStock->getQuotes());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $myasset = Stock::create(
      array('user_id' => Auth::id(),
            'stockid' => $request->StockName,
          ));

      $myasset->save();

      return redirect('/stock');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
