<?php

namespace App\Http\Controllers;

use App\User;
use Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::where('id','!=',\Auth::user()->id);
        return view('user.index')->with(compact('users'));
    }

    public function store()
    {
        User::create(\Request::all());
        return json_encode(['success' => '1']);
    }

    public function valid()
    {
        if (Request::ajax()) {
            $validator = Validator::make(['email' => \Request::get('email')], [
                'email' => 'required|unique:users'
            ]);
            if ($validator->fails()) {
                return json_encode(['valid' => false]);
            } else {
                return json_encode(['valid' => true]);
            }
        }

    }

    public function destroy()
    {
        if (\Request::ajax()) {
            User::destroy(Request::get('id'));
            return json_encode(['success' => '1']);
        }
    }

    public function edit()
    {
        if (Request::ajax()) {
            $table= User::findOrFail(Request::get('id'));
            return json_encode($table);
        }
    }

    public function update()
    {

        $id = Request::get('id');
        $validator = Validator::make(Request::all(), [
            'email' => 'unique:users,email,' .$id,
        ]);
        if ($validator->fails()) {
            return json_encode(['success'=>'0']);
        }else{
            $table= User::find($id);
            $table->fill(Request::all())->save();
            return json_encode(['success'=>'1']);
        }
    }
}
