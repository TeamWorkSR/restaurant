<div class="modal fade create-form " role="dialog"  aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Item</h4>
            </div>
            {!! Form::open(['route'=>'item.store','method'=>'post','id'=>'createItem']) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('Category',null) !!}
                            {!! Form::select('category_id',$category ,null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Code',null) !!}
                            {!! Form::text('code',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Name',null) !!}
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Size',null) !!}
                            {!! Form::text('size',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('Price',null) !!}
                            {!! Form::text('price',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Quantity',null) !!}
                            {!! Form::text('qty',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Expired Date',null) !!}
                            {!! Form::text('expire',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::reset('Reset',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
                {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>