<div class="modal fade create-form " role="dialog"  aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Category</h4>
            </div>
            {!! Form::open(['route'=>'category.store','method'=>'post','id'=>'createCategory']) !!}
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('Name',null) !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
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