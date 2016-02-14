<?php

namespace App\Http\Controllers;

use Auth;
use App\MyAsset;
use App\User;
use App\Categories;
use App\Http\Requests\MyAssetRequest;
use DB;

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
        $lists = MyAsset::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $categories = Categories::distinct()->select('name')->where('creater_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('myasset.index')->withLists($lists)->with('category',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lists = MyAsset::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $categories = Categories::distinct()->select('name')->where('creater_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('myasset.create')->withLists($lists)->with('category',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MyAssetRequest $request)
    {
        $plus = $request->income;
        $minus = $request->expenditure;
        $amount = $request->amount;
        $total = $amount + $plus - $minus;
        $myasset = MyAsset::create(
        array('name' => $request->name,
              'category' =>$request->category,
              'income' => $request->income,
              'expenditure' => $request->expenditure,
              'amount' => $total,
              'remark' => $request->remark,
            ));

        $myasset->user_id = Auth::user()->id;
        $myasset->save();

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
