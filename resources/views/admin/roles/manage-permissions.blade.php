@extends('admin.layouts.master')
@section('title', __('Manage Permissions'))

@section('main_content')
    <div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ __('Permissions') }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }} </a></li>
                <li class="active">{{ __('Manage Permissions') }} </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Manage Permissions') }} </h3>
                </div>
                <div class="box-body">
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
                    <form class="form-horizontal" method="POST"
                        action="/admin/roles/update-permissions/{{ $role->id }}">
                        @csrf
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('Module') }}</th>
                                        <th>{{ __('Permissions') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    $default_modules = ['employees', 'clients', 'departments', 'designations', 'client-types', 'award-categories', 'leave-categories', 'working-day', 'holiday-list', 'personal-event', 'notices', 'notice-board', 'salary', 'increament', 'payslip', 'payment', 'salary-sheet', 'bonus', 'deduction', 'loan', 'provident-fund', 'expense', 'expense-category', 'leave-category', 'leave-application', 'leave-report', 'attendance', 'attendance-report', 'award', 'certificate', 'roles', 'update-permissions'];
                                    $default_permissions = ['create', 'read', 'update', 'delete'];
                                    ?>
                                    @foreach ($default_modules as $row)
                                        <tr>
                                            <td>{{ __(ucfirst($row)) }}</td>
                                            <td>
                                                <div class="col-3 form-check">
                                                    @foreach ($default_permissions as $permission)
                                                        @if (in_array($permission . '-' . $row, $allpermissions))
                                                            @php($key = array_search($permission . '-' . $row, $allpermissions))
                                                            <input class="form-check-input"
                                                                id="permission_{{ $key }}" name="permissions[]"
                                                                type="checkbox" value="{{ $key }}" 
                                                                    {{ in_array($permission . '-' . $row, $permissions) ? 'Checked' : '' }}
                                                                >
                                                            <label for="permission_{{ $key }}"
                                                                class="form-check-label">{{ $permission }}</label>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">{{ __('Update Permission') }}</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection
