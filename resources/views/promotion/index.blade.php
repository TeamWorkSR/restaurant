@extends('layouts.app')
@section('breadcrumb')
    {!! Breadcrumbs::render('promotion') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
{{--<a href="{!! route('table.create') !!}"></a>--}}
            {!! Html::link(route('table.create'),'Add New',['class'=>'btn btn-primary']) !!}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <table class="table data dataTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection