@extends('layouts.app')
@section('breadcrumb')
    {!! Breadcrumbs::render('table') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            {{--<a href="{!! route('table.create') !!}"></a>--}}
            {!! Html::link('#','Add New',
                ['class'=>'btn btn-primary btn-flat',
                'data-toggle'=>'modal','data-target'=>'.create-form']) !!}
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
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tables as $table)
                    <tr>
                        <td>{!! $table->id !!}</td>
                        <td>{!! $table->name !!}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm btn-xs">Action</button>
                                <button type="button" class="btn btn-default btn-sm btn-xs dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>{!! Html::link('#','Delete',['data-id'=>$table->id,'id'=>'delete']) !!}</li>
                                    <li>{!! Html::link('#','Edit',['data-id'=>$table->id,'id'=>'edit']) !!}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @include('table.create')
    @include('table.edit')

@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#createTable').bootstrapValidator({
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        },
                         remote: {
                         type: 'post',
                         url: '{!! url('validate/table') !!}',
                         message: 'The item is already exist'
                         }
                    }
                }
            }
        }).ajaxForm({
            success: function () {
                $("#createTable").bootstrapValidator('resetForm', true);
                $('.create-form').modal('hide');
                window.location.reload(true);
            }
        });

        $('#editTable').bootstrapValidator({
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                }
            }
        }).ajaxForm({
            success: function (data) {
                var res = JSON.parse(data);
                if (res.success==1) {
                    $("#editTable").bootstrapValidator('resetForm', true);
                    $('.edit-form').modal('hide');
                    window.location.reload(true);
                }else if (res.success==0) {
                    alert('exist');
                }

            }
        });


        $('body').delegate('#delete','click',function () {
            var id=$(this).data('id');

            alert(id);
            $.confirm({
                title: 'Delete Confirm!',
//                content: 'Want to delete ?',
                confirmButtonClass: 'btn-info',
                cancelButtonClass: 'btn-danger',
                confirm: function(){
                    $.post('{!! url('destroy/table') !!}',{id:id},function (result) {
                        var data = JSON.parse(result);
                        if(data.success=='1') {
                            $.alert('Deleted');
                            window.location.reload(true);
                        }
                    });
                },
                cancel: function(){
                    $.alert('Canceled!')
                }
            });
        })
        $('body').delegate('#edit','click',function () {
            var id=$(this).data('id');
//            $('.load-edit').load('category/'+id+'/edit');

            $.post('{!! url('edit/table') !!}',{id:id},function(data) {
                var result = JSON.parse(data);
                $('input[name="name"]').val(result.name);
                $('input[name="id"]').val(result.id);
            });
            $('.edit-form').modal('show');

        })
    });
</script>
@endpush