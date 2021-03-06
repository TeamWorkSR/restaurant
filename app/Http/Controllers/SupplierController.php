<?php

namespace App\Http\Controllers;

use App\Supplier;
use Request;

use App\Http\Requests;
use Yajra\Datatables\Datatables;

class SupplierController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index')->with(compact('suppliers'));
    }

    public function store()
    {
        Supplier::create(\Request::all());
        return json_encode(['success' => '1']);
    }
    public function edit()
    {
        if (Request::ajax()) {
            $supplier= Supplier::findOrFail(Request::get('id'));
            return json_encode($supplier);
        }
    }

    public function destroy()
    {
        if (\Request::ajax()) {
            Supplier::destroy(\Request::get('id'));
            return json_encode(['success' => '1']);
        }
    }
    public function update()
    {

        /*        $id = Request::get('id');
                $validator = Validator::make(Request::all(), [
                    'name' => 'unique:tables,name,' .$id,
                ]);
                if ($validator->fails()) {
                    return json_encode(['success'=>'0']);
                }else{
                    $table= Table::find($id);
                    $table->fill(Request::all())->save();
                    return json_encode(['success'=>'1']);
                }*/
        $id = Request::get('id');
        $table= Supplier::find($id);
        $table->fill(Request::all())->save();
        return json_encode(['success'=>'1']);
    }

    public function data()
    {
        return Datatables::of(Supplier::all())
            ->addColumn('action', function ($supplier) {
                return
                    '<a href="#" class="btn btn-xs btn-primary" data-id="'.$supplier->id.'" id="edit"><i class="glyphicon glyphicon-edit" ></i> Edit</a> ' .
                    '<a href="#" class="btn btn-xs btn-default" data-id="'.$supplier->id.'" id="delete"><i class="glyphicon glyphicon-edit" ></i> Delete</a>';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }

}
