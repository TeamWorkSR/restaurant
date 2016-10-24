@extends('layouts.app')
@section('breadcrumb')
    {!! Breadcrumbs::render('item') !!}
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
                    <th>Category</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Expired Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{!! $item->category->name !!}</td>
                        <td>{!! $item->code !!}</td>
                        <td>{!! $item->name !!}</td>
                        <td>{!! $item->size !!}</td>
                        <td>{!! $item->price !!}</td>
                        <td>{!! $item->expire !!}</td>
                        <td>
                            {!! Html::link('#','Delete',['data-id'=>$item->id,'id'=>'delete','class'=>'btn btn-danger btn-xs']) !!}
                            {!! Html::link('#','Edit',['data-id'=>$item->id,'id'=>'edit','class'=>'btn btn-default btn-xs']) !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @include('item.create')
    @include('item.edit')
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#createItem').bootstrapValidator({
            fields: {
                code: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        },
                        remote: {
                            type: 'post',
                            url: '{!! url('validate/item') !!}',
                            message: 'The item is already exist'
                        }
                    }
                },
                name: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                size: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                price: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                qty: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                expire: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                }
            }
        }).ajaxForm({
            success: function () {
                $("#createItem").bootstrapValidator('resetForm', true);
                $('.create-form').modal('hide');
                window.location.reload(true);
            }
        });

        $('#editItem').bootstrapValidator({
            fields: {
                code: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                name: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                size: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                price: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                expire: {
                    validators: {
                        notEmpty: {
                            message: 'required and cannot be empty'
                        }
                    }
                },
                qty: {
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
                if (res.success == 1) {
                    $("#editItem").bootstrapValidator('resetForm', true);
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
                    $.post('{!! url('destroy/item') !!}', {id: id}, function (result) {
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
            $.post('{!! url('edit/item') !!}', {id: id}, function (data) {
                var result = JSON.parse(data);
                $('select[name="category_id"] option[value="' + result.category_id + '"]').attr('selected', 'selected');
                $('input[name="code"]').val(result.code);
                $('input[name="name"]').val(result.name);
                $('input[name="id"]').val(result.id);
                $('input[name="price"]').val(result.price);
                $('input[name="expire"]').val(result.expire);
                $('input[name="qty"]').val(result.qty);
                $('input[name="size"]').val(result.size);
            });
            $('.edit-form').modal('show');

        })
    });
</script>
@endpush