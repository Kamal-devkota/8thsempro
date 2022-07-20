@extends('admin.layouts.master')
@section('title', __('Add Roles'))

@section('main_content')
    <div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ __('Add Roles') }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }} </a></li>
                <li class="active">{{ __('Add Roles') }} </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Add Roles') }} </h3>
                </div>
                <!-- /.box-header -->
                <form action="{{ url('/admin/roles/store') }}" method="post" name="employee_award_add_form">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="row">
                            <!-- Notification Box -->
                            <div class="col-md-12">
                                @if (!empty(Session::get('message')))
                                    <div class="alert alert-success alert-dismissible" id="notification_box">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <i class="icon fa fa-check"></i> {{ Session::get('message') }}
                                    </div>
                                @elseif (!empty(Session::get('exception')))
                                    <div class="alert alert-warning alert-dismissible" id="notification_box">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                                    </div>
                                @endif
                            </div>
                            <!-- /.Notification Box -->

                            <div class="col-md-6">

                                <label for="name">{{ __('Role Name') }} <span class="text-danger"></span></label>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}" placeholder="{{ __('Enter Role Name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!-- /.form-group -->


                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i>
                                {{ __('Add') }}</button>
                        </div>
                </form>
            </div>
            <!-- /.box -->


        </section>
        <!-- /.content -->
    </div>
    <script type="text/javascript">
        document.forms['employee_award_add_form'].elements['publication_status'].value =
            "{{ old('publication_status') }}";
    </script>

    <script type="text/javascript">
        //Month picker
        $('#monthpicker').datepicker({
            autoclose: true,
            format: "yyyy-mm",
            viewMode: "months",
            minViewMode: "months"
        });
        $('#monthpicker').datepicker('setDate', 'now');

        //Month picker
        $('#monthpicker2').datepicker({
            autoclose: true,
            format: "yyyy-mm",
            viewMode: "months",
            minViewMode: "months"
        });
    </script>
@endsection
