<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        // $items = DB::table('list')->get();
        $items = Lists::all();
        return view('index', ['items' => $items]);
    }
    // 追加＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋
    public function add(Request $request)
    {
        return view('/todo/create');
    }
    public function create(Request $request)
    {
        $this->validate($request, Lists::$rules);
        $lists = new Lists;
        $form = $request->all();
        unset($form['_token']);
        $lists->fill($form)->save();
        return redirect('/');
    }
    // 更新＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋
    public function edit(Request $request)
    {
        $lists = Lists::find($request->id);
        return view('/todo/update', ['form' => $lists]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Lists::$rules);
        $lists = Lists::find($request->id);
        $form = $request->all();
        unset($form['_token_']);
        $lists->fill($form)->save();
        return redirect('/');
    }
    // 削除＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋
    public function delete(Request $request)
    {
        return view('/todo/delete');
        // $lists = Lists::find($request->id);
        // return view('todo/delete', ['form' => $lists]);
    }
    public function remove(Request $request)
    {
        Lists::find($request->id)->delete();
        return redirect('/');
    }

}
