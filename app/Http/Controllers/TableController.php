<?php

namespace App\Http\Controllers;

use App\Table;
use Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Yajra\Datatables\Datatables;

class TableController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tables = Table::all();
        return view('table.index')
            ->with(compact('tables'));
    }


    public function store()
    {
        Table::create(\Request::all());
        return json_encode(['success' => '1']);
    }

    public function destroy()
    {
        if (\Request::ajax()) {
            Table::destroy(Request::get('id'));
            return json_encode(['success' => '1']);
        }
    }

    public function edit()
    {
        if (Request::ajax()) {
           $table= Table::findOrFail(Request::get('id'));
            return json_encode($table);
        }
    }

    public function update()
    {

        $id = Request::get('id');
        $validator = Validator::make(Request::all(), [
            'name' => 'unique:tables,name,' .$id,
        ]);
        if ($validator->fails()) {
            return json_encode(['success'=>'0']);
        }else{
            $table= Table::find($id);
            $table->fill(Request::all())->save();
            return json_encode(['success'=>'1']);
        }
    }
    public function valid()
    {
        if (Request::ajax()) {
            $validator = Validator::make(['name' => \Request::get('name')], [
                'name' => 'required|unique:tables'
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
        return Datatables::of(Table::all())
            ->addColumn('action', function ($table) {
                return
                    '<a href="#" class="btn btn-xs btn-primary" data-id="'.$table->id.'" id="edit"><i class="glyphicon glyphicon-edit" ></i> Edit</a> ' .
                    '<a href="#" class="btn btn-xs btn-default" data-id="'.$table->id.'" id="delete"><i class="glyphicon glyphicon-edit" ></i> Delete</a>';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }
    
}


