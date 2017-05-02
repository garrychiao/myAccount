<?php

namespace App\Http\Controllers;

use Auth;
use App\MyAsset;
use App\User;
use App\Categories;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MyAssetController extends Controller
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
        $now = Carbon::now()->addDay();
        $twelve_months_ago = Carbon::now()->subMonths(12);

        $categories = Categories::where('creater_id',Auth::id())->orderBy('id', 'asc')->get();
        $records = MyAsset::join('categories','my_assets.category_id','=','categories.id')
        ->select('my_assets.*','categories.category_type','categories.category_name')
        ->where('user_id',Auth::id())
        ->whereBetween('date', [$twelve_months_ago, $now])
        ->orderBy('id', 'asc')->get();

        $data = compact('categories','records');
        return view('myasset.index',$data);
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = MyAsset::create(array(
          'user_id'=>Auth::id(),
          'category_id' => $request->category_id,
          'title' => $request->title,
          'amount' => $request->amount,
          'date' => $request->date
        ));
        $category->save();

        return redirect('/myasset');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $myasset = MyAsset::findOrFail($id);
        $categories = Categories::distinct()->select('name')->where('creater_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('myasset.edit')->with('myasset', $myasset)->with('category',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(MyAssetRequest $request, $id)
    {
      $pre = MyAsset::findOrFail($id);
      $plus = $request->income-$pre->income;
      $minus = $request->expenditure-$pre->expenditure;
      $amount = $request->amount;
      $total = $amount + $plus - $minus;
      $differece = $plus - $minus;
      $myasset = MyAsset::where('id',$id)
      ->update(array('name' => $request->name,
                     'category' => $request->category,
                     'income' => $request->income,
                     'expenditure' => $request->expenditure,
                     'amount' => $total,
                     'remark' => $request->remark,
                    ));
      MyAsset::where([['id','>',$id],['user_id',Auth::id()],])->increment('amount',$differece);
      return redirect('/myasset');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $myasset = MyAsset::find($id);
        $myasset->delete();

        return \Redirect::route('myasset.index')
            ->with('message', 'Task deleted!');
    }
}
