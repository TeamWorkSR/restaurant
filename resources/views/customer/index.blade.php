@extends('layouts.app')
@section('breadcrumb')
    {!! Breadcrumbs::render('customer') !!}
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
            <table class="table data dataTable" id="datalist">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Address</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                {{--<tr v-for="customer in customers">
                    <td>@{{ customer.name }}</td>
                    <td>@{{ customer.sex }}</td>
                    <td>@{{ customer.address }}</td>
                    <td>@{{ customer.tel }}</td>
                    <td>@{{ customer.email }}</td>
                    <td>@{{ customer.email }}</td>
                </tr>--}}
                @foreach($customers as $customer)
                    <tr>
                        <td>{!! $customer->name !!}</td>
                        <td>{!! $customer->sex !!}</td>
                        <td>{!! $customer->address !!}</td>
                        <td>{!! $customer->tel !!}</td>
                        <td>{!! $customer->email !!}</td>
                        <td>
                            {!! Html::link('#','Delete',['data-id'=>$customer->id,'id'=>'delete','class'=>'btn btn-danger btn-xs']) !!}
                            {!! Html::link('#','Edit',['data-id'=>$customer->id,'id'=>'edit','class'=>'btn btn-default btn-xs']) !!}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    @include('customer.create')
    @include('customer.edit')
@endsection
@push('scripts')
<script type="text/javascript">
    new Vue({
        el: '#datalist',
        methods: {
            fetchCustomers: function () {
                this.$http.get('{!! url('list/customer') !!}', function (data) {
                    this.$set('customers', data)
                });
            }
        },
        ready: function () {
            this.fetchCustomers();
        }

    })
</script>
@endpush

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#createCustomer').bootstrapValidator({
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
            success: function () {
                $("#createCustomer").bootstrapValidator('resetForm', true);
                $('.create-form').modal('hide');
                window.location.reload(true);
            }
        });

        $('#editCustomer').bootstrapValidator({
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
                    $("#editCustomer").bootstrapValidator('resetForm', true);
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
                    $.post('{!! url('destroy/customer') !!}',{id:id},function (result) {
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

            $.post('{!! url('edit/customer') !!}',{id:id},function(data) {
                var result = JSON.parse(data);
                $('input[name="name"]').val(result.name);
                $('input[name="id"]').val(result.id);
                $('select[name="sex"] option[value="'+result.sex+'"]').attr('selected','selected');
                $('textarea[name="address"]').val(result.address);
                $('input[name="email"]').val(result.email);
                $('input[name="tel"]').val(result.tel);
                console.log(result.sex);
            });
            $('.edit-form').modal('show');

        })
    });
</script>
@endpush