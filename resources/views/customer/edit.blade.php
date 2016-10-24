<div class="modal fade edit-form " role="dialog"  aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Customer</h4>
            </div>
            {!! Form::open(['url'=>'update/customer','method'=>'post','id'=>'editCustomer']) !!}
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('Name',null) !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                    {!! Form::hidden('id') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Sex',null) !!}
                    {!! Form::select('sex',[''=>'','Male'=>'Male','Female'=>'Female'],'',['class'=>'form-control','id'=>'sex']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Telephone',null) !!}
                    {!! Form::text('tel',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Email',null) !!}
                    {!! Form::text('email',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Address',null) !!}
                    {!! Form::textarea('address',null,['class'=>'form-control']) !!}
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