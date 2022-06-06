<aside class="main-sidebar">
    <section class="sidebar">
        <div id="mainMenu">
            <ul class="sidebar-menu" data-widget="tree">

                {{-- Dashboard --}}
                <li>
                    <a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>
                        <span>{{ __('Dashboard') }}</span></a>
                </li>

                {{-- Employee Management --}}
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>{{ __('Employee Management') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/employees') }}">{{ __('Employees') }}</a></li>
                        <li><a href="{{ url('/clients') }}"> {{ __('Clients') }}</a></li>
                        {{-- <li><a href="{{ url('/references') }}"><i
                                    class="fa fa-circle-o"></i>{{ __('References') }}</a></li>
                        <li><a href="{{ url('/references/create') }}"><i
                                    class="fa fa-circle-o"></i>{{ __(' New Reference') }}</a></li> --}}
                    </ul>
                </li>

                {{-- Settings --}}
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i> <span>{{ __('Settings') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/setting/departments') }}">{{ __('Manage Departments') }} </a></li>
                        <li><a href="{{ url('/setting/designations') }}">{{ __('Manage Designations') }} </a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-bell"></i> <span>{{ __('Notice Management') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        {{-- <li><a href="{{ url('hrm/notice/create') }}">{{ __('New Notice') }}</a></li> --}}
                        <li><a href="{{ url('/hrm/notice') }}">{{ __('Notices') }}</a></li>
                        <li><a href="{{ url('/hrm/notice/show') }}"><span>{{ __('Notice Board') }}</span></a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </section>
    <!-- /.sidebar -->
</aside>
