@extends('admin.layouts.master')
@section('title', __('Roles'))

@section('main_content')
    <div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ __('Roles') }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }} </a></li>
                <li class="active">{{ __('Manage roles') }} </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Manage roles') }} </h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <a href="{{ url('/admin/roles/add') }}" class="btn btn-primary btn-flat"><i
                                class="fa fa-plus"></i>{{ __(' Add roles') }}</a>
                    </div>

                    <div class="col-md-6">
                        <input type="text" id="myInput" class="form-control" placeholder="{{ __('Search..') }}">
                    </div>
                    <!-- Notification Box -->
                    <div class="col-md-12">
                        @if (!empty(Session::get('message')))
                            <div class="alert alert-success alert-dismissible" id="notification_box">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-check"></i> {{ Session::get('message') }}
                            </div>
                        @elseif (!empty(Session::get('exception')))
                            <div class="alert alert-warning alert-dismissible" id="notification_box">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                            </div>
                        @endif
                    </div>
                    <!-- /.Notification Box -->
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('SL#') }}</th>
                                    <th>{{ __('Role Name') }}</th>
                                    <th>{{ __('Created at') }}</th>
                                    <th class="text-center">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @php($sl = 1)
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $role['name'] }}</td>
                                        <td>{{ date('D d F Y h:ia', strtotime($role['created_at'])) }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/admin/roles/edit/' . $role['id']) }}"><i
                                                    class="icon fa fa-edit"></i> {{ __('Edit') }}</a>
                                            <a href="{{ url('/admin/roles/edit-permissions/' . $role['id']) }}"><i
                                                    class="icon fa fa-edit"></i> {{ __('Manage Permissions') }}</a>
                                            <a href="{{ url('/admin/roles/delete/' . $role['id']) }}"><i
                                                    class="icon fa fa-trash"></i> {{ __('Delete') }}</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection
