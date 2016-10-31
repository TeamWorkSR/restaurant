<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use Yajra\Datatables\Datatables;

class ItemController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $items = Item::all();
        $category = Category::all()->lists('name','id');
        return view('item.index')
            ->with(compact('category'))
            ->with(compact('items'));
    }

    public function store()
    {
        Item::create(\Request::all());
        return json_encode(['success'=>'1']);
    }

    public function edit()
    {
        if (\Request::ajax()) {
            $item = Item::findOrFail(Request::get('id'));
            return json_encode($item);
        }
    }
    public function update()
    {

                $id = Request::get('id');
                $validator = Validator::make(Request::all(), [
                    'code' => 'unique:items,code,' .$id,
                ]);
                if ($validator->fails()) {
                    return json_encode(['success'=>'0']);
                }else{
                    $table= Item::find($id);
                    $table->fill(Request::all())->save();
                    return json_encode(['success'=>'1']);
                }
    }

    public function destroy()
    {
        if (\Request::ajax()) {
            Item::destroy(Request::get('id'));
            return json_encode(['success' => '1']);
        }
    }
    public function valid()
    {
        if (Request::ajax()) {
            $validator = Validator::make(['code' => \Request::get('code')], [
                'code' => 'required|unique:items'
            ]);
            if ($validator->fails()) {
                return json_encode(['valid' => false]);
            } else {
                return json_encode(['valid' => true]);
            }
        }

    }
    public function data()
    {
        return Datatables::of(Item::all())
            ->addColumn('action', function ($item) {
                return
                    '<a href="#" class="btn btn-xs btn-primary" data-id="'.$item->id.'" id="edit"><i class="glyphicon glyphicon-edit" ></i> Edit</a> ' .
                    '<a href="#" class="btn btn-xs btn-default" data-id="'.$item->id.'" id="delete"><i class="glyphicon glyphicon-edit" ></i> Delete</a>';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }
}
