<?php

namespace App\Http\Controllers;

use App\Exchange;
use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Datatables;

class ExchangeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('exchange.index');
    }
    public function data()
    {
        return Datatables::of(Exchange::all())
            ->addColumn('action', function ($exchange) {
                return
                    '<a href="#" class="btn btn-xs btn-primary" data-id="'.$exchange->id.'" id="edit"><i class="glyphicon glyphicon-edit" ></i> Edit</a> ' .
                    '<a href="#" class="btn btn-xs btn-default" data-id="'.$exchange->id.'" id="delete"><i class="glyphicon glyphicon-edit" ></i> Delete</a>';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }
}
