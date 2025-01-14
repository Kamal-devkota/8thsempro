@extends('admin.layouts.master')
@section('title', __('Certificate List'))

@section('main_content')
    <div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ __('Certificate') }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
                <li><a>{{ __('HRM') }}</a></li>
                <li class="active">{{ __('Certificate') }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Manage Certificate') }}</h3>
                </div>
                <div class="box-body">

                    <div class="col-md-6">
                        <a href="{{ url('/setting/departments/create') }}" class="btn btn-primary btn-flat"><i
                                class="fa fa-plus"></i> {{ __('Add Certificate') }}</a>
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
                                    <th>{{ __('Employee') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th class="text-center">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php $nocs = \App\Models\Noc::all()->where('category', 2); ?>
                                @php($sl = 1)
                                @foreach ($nocs as $noc)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ \App\Models\User::find($noc->empid)->name }}</td>
                                        <td class="text-center">{{ $noc->created_at->format('d/m/Y') }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/hrm/certificate/generate/' . $noc->id) }}"><i
                                                    class="icon fa fa-file-text"></i> {{ __('Download') }}</a>
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
