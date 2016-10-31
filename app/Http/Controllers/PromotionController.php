<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\Http\Requests;
use Yajra\Datatables\Datatables;
class PromotionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('promotion.index');
    }
    public function data()
    {
        return Datatables::of(Promotion::all())
            ->addColumn('action', function ($table) {
                return
                    '<a href="#" class="btn btn-xs btn-primary" data-id="'.$table->id.'" id="edit"><i class="glyphicon glyphicon-edit" ></i> Edit</a> ' .
                    '<a href="#" class="btn btn-xs btn-default" data-id="'.$table->id.'" id="delete"><i class="glyphicon glyphicon-edit" ></i> Delete</a>';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }
}
