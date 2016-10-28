<?php

namespace App\Http\Controllers;

use App\Category;
use Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Facades\DataTable;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('category.index')->with(compact('categories'));
//        return view('category.index');
    }

    public function data()
    {
        $categories = Category::all();
        return view('category.data')->with(compact('categories'));
    }

    public function store()
    {
        if (\Request::ajax()) {
            Category::create(Request::all());
            return json_encode(['success' => '1']);
        }
    }

    public function destroy()
    {
        if (Request::ajax()) {
            Category::destroy(Request::get('id'));
            return json_encode(['success' => '1']);
        }
    }

    public function edit()
    {
        if (Request::ajax()) {
            $category = Category::findOrFail(Request::get('id'));
            return json_encode($category);
        }
    }

    public function update()
    {
        $id = Request::get('id');
        $validator = Validator::make(Request::all(), [
            'name' => 'unique:categories,name,' .$id,
        ]);
        if ($validator->fails()) {
            return json_encode(['success'=>'0']);
        }else{
            $category = Category::find($id);
            $category->fill(Request::all())->save();
            return json_encode(['success'=>'1']);
        }
    }

    public function valid()
    {
        if (Request::ajax()) {
            $validator = Validator::make(['name' => \Request::get('name')], [
                'name' => 'required|unique:categories'
            ]);
            if ($validator->fails()) {
                return json_encode(['valid' => false]);
            } else {
                return json_encode(['valid' => true]);
            }
        }

    }
}
