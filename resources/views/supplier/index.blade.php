@extends('layouts.app')
@section('breadcrumb')
    {!! Breadcrumbs::render('supplier') !!}
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
                    <th>Sex</th>
                    <th>Deport</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($suppliers as $supplier)
                    <tr>
                        <td>{!! $supplier->name !!}</td>
                        <td>{!! $supplier->sex !!}</td>
                        <td>{!! $supplier->deport !!}</td>
                        <td>{!! $supplier->tel !!}</td>
                        <td>{!! $supplier->email !!}</td>
                        <td>{!! $supplier->address !!}</td>
                        <td>
                            {!! Html::link('#','Delete',['data-id'=>$supplier->id,'id'=>'delete','class'=>'btn btn-danger btn-xs']) !!}
                            {!! Html::link('#','Edit',['data-id'=>$supplier->id,'id'=>'edit','class'=>'btn btn-default btn-xs']) !!}
                        </td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @include('supplier.create')
    @include('supplier.edit')
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#createSupplier').bootstrapValidator({
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
                deport: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },

            }
        }).ajaxForm({
            success: function () {
                $("#createSupplier").bootstrapValidator('resetForm', true);
                $('.create-form').modal('hide');
                window.location.reload(true);
            }
        });

        $('#editSupplier').bootstrapValidator({
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
                deport: {
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
                if (res.success == 1) {
                    $("#editSupplier").bootstrapValidator('resetForm', true);
                    $('.edit-form').modal('hide');
                    window.location.reload(true);
                } else if (res.success == 0) {
                    alert('exist');
                }

            }
        });
        $('body').delegate('#delete', 'click', function () {
            var id = $(this).data('id');
            $.confirm({
                title: 'Delete Confirm!',
//                content: 'Want to delete ?',
                confirmButtonClass: 'btn-info',
                cancelButtonClass: 'btn-danger',
                confirm: function () {
                    $.post('{!! url('destroy/supplier') !!}', {id: id}, function (result) {
                        var data = JSON.parse(result);
                        if (data.success == '1') {
                            $.alert('Deleted');
                            window.location.reload(true);
                        }
                    });
                },
                cancel: function () {
                    $.alert('Canceled!')
                }
            });
        })
        $('body').delegate('#edit', 'click', function () {
            var id = $(this).data('id');
//            $('.load-edit').load('category/'+id+'/edit');

            $.post('{!! url('edit/supplier') !!}', {id: id}, function (data) {
                var result = JSON.parse(data);
                $('input[name="name"]').val(result.name);
                $('input[name="id"]').val(result.id);
                $('select[name="sex"] option[value="' + result.sex + '"]').attr('selected', 'selected');
                $('textarea[name="address"]').val(result.address);
                $('input[name="email"]').val(result.email);
                $('input[name="deport"]').val(result.deport);
                $('input[name="tel"]').val(result.tel);
                console.log(result.sex);
            });
            $('.edit-form').modal('show');

        })
    });
</script>
@endpush