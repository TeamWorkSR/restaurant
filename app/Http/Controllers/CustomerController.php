<?php

namespace App\Http\Controllers;

use App\Customer;
use Request;

use App\Http\Requests;

class CustomerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::all();
        return view('customer.index')->with(compact('customers'));
    }

    public function store()
    {
        Customer::create(\Request::all());
        return json_encode(['success'=>'1']);
    }

    public function edit()
    {
        if (\Request::ajax()) {
            $customer = Customer::findOrFail(Request::get('id'));
            return json_encode($customer);
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
        $table= Customer::find($id);
        $table->fill(Request::all())->save();
        return json_encode(['success'=>'1']);
    }

    public function destroy()
    {
        if (\Request::ajax()) {
            Customer::destroy(Request::get('id'));
            return json_encode(['success' => '1']);
        }
    }
    public function lists()
    {
        return Customer::all();
    }
}
