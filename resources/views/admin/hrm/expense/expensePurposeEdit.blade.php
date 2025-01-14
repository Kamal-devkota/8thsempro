@extends('admin.layouts.master')
@section('title', __('Update Expense Category'))

@section('main_content')
    <div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ __('UPDATE EXPENSES CATEGORY') }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
                <li><a>{{ __('HRM') }}</a></li>
                <li><a href="{{ url('/hrm/expense/manage-expense') }}">{{ __('expense') }}</a></li>
                <li class="active">{{ __('category') }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Update expeses') }}</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{ url('/hrm/expense/category/update') }}" method="post" name="add_form_expense">
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


                                @foreach ($expcats as $expcat)
                                    <input type="hidden" name="id" value="{{ $expcat->id }}">

                                    <label for="balance_amount">{{ __('Expense Purpose Name') }}</label>
                                    <div class="form-group">
                                        <input type="text" name="exp_name" class="form-control"
                                            value="{{ $expcat->exp_name }}">
                                    </div>
                                @endforeach

                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ url('/hrm/expense/manage-expense') }}" class="btn btn-danger btn-flat"><i
                                class="icon fa fa-close"></i> {{ __('Cancel') }}</a>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i>
                            {{ __('Category Update') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->


        </section>
        <!-- /.content -->
    </div>
    <script type="text/javascript">
        document.forms['add_form_expense'].elements['publication_status'].value = "{{ old('publication_status') }}";
    </script>
@endsection
