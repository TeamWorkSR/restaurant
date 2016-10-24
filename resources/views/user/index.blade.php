@extends('layouts.app')
@section('breadcrumb')
    {!! Breadcrumbs::render('user') !!}
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
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Telephone</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->sex !!}</td>
                        <td>{!! $user->tel !!}</td>
                        <td>{!! $user->address !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>
                            {!! Html::link('#','Delete',['data-id'=>$user->id,'id'=>'delete','class'=>'btn btn-danger btn-xs']) !!}
                            {!! Html::link('#','Edit',['data-id'=>$user->id,'id'=>'edit','class'=>'btn btn-default btn-xs']) !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @include('user.create')
    @include('user.edit')
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#createUser').bootstrapValidator({
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                sex: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                tel: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                email: {
                    validators: {
                        emailAddress: {
                            message: 'The value is not a valid email address'
                        },
                        notEmpty: {
                            message: 'required and cannot be empty'
                        },

                        remote: {
                            type: 'post',
                            url: '{!! url('validate/user') !!}',
                            message: 'The item is already exist'
                        }
                    }
                },

            }
        }).ajaxForm({
            success: function () {
                $("#createUser").bootstrapValidator('resetForm', true);
                $('.create-form').modal('hide');
                window.location.reload(true);
            }
        });

        $('#editUser').bootstrapValidator({
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                sex: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                tel: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },

            }
        }).ajaxForm({
            success: function (data) {
                var res = JSON.parse(data);
                if (res.success==1) {
                    $("#editUser").bootstrapValidator('resetForm', true);
                    $('.edit-form').modal('hide');
                    window.location.reload(true);
                }else if (res.success==0) {
                    alert('exist');
                }

            }
        });


        $('body').delegate('#delete','click',function () {
            var id=$(this).data('id');
            $.confirm({
                title: 'Delete Confirm!',
//                content: 'Want to delete ?',
                confirmButtonClass: 'btn-info',
                cancelButtonClass: 'btn-danger',
                confirm: function(){
                    $.post('{!! url('destroy/user') !!}',{id:id},function (result) {
                        var data = JSON.parse(result);
                        if(data.success=='1') {
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

            $.post('{!! url('edit/user') !!}',{id:id},function(data) {
                var result = JSON.parse(data);
                $('input[name="name"]').val(result.name);
                $('input[name="id"]').val(result.id);
                $('select[name="sex"] option[value="'+result.sex+'"]').attr('selected','selected');
                $('textarea[name="address"]').val(result.address);
                $('input[name="email"]').val(result.email);
                $('input[name="tel"]').val(result.tel);
            });
            $('.edit-form').modal('show');

        })
    });
</script>
@endpush