<aside class="main-sidebar">
    <section class="sidebar">
        <div id="mainMenu">
            <ul class="sidebar-menu" data-widget="tree">

                {{-- Dashboard --}}
                <li>
                    <a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>
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
                        </ul>
                    </li>

                {{-- Organization Management --}}
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i> <span>{{ __('Organization') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/setting/departments') }}">{{ __('Manage Departments') }} </a></li>
                        <li><a href="{{ url('/setting/designations') }}">{{ __('Manage Designations') }} </a></li>
                        <li><a href="{{ url('/setting/client-types') }}"> {{ __('Manage Client Types') }} </a></li>
                        <li><a href="{{ url('/setting/award_categories') }}"> {{ __('Manage Award Categories') }}</a></li>
                        <li><a href="{{ url('/setting/working-days') }}"> {{ __('Set Working Day') }}</a></li>
                        <li><a href="{{ url('/setting/holidays') }}">{{ __('Holiday List') }} </a></li>
                        <li><a href="{{ url('/setting/personal-events') }}">{{ __('Personal Event') }} </a></li>
                    </ul>
                </li>

                {{-- Notice --}}
                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-bell"></i> <span>{{ __('Notice Management') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                    <li><a href="{{ url('/hrm/notice') }}">{{ __('Notices') }}</a></li>
                    <li><a href="{{ url('/hrm/notice/show') }}"><span>{{ __('Notice Board') }}</span></a></li>
                    </ul>
                </li>

                {{-- Payroll --}}
                 <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dollar"></i> <span>{{ __('Payroll Management') }}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/hrm/payroll') }}">{{ __('Manage Salary') }}</a></li>
                            <li><a href="{{ url('/hrm/payroll/salary-list') }}">{{ __('Salary List') }}</a></li>
                            <li><a href="{{ url('/hrm/payroll/increment/search') }}">{{ __(' New Increment') }}</a></li>
                            <li><a href="{{ url('/hrm/payroll/increment/list') }}">{{ __('Increment List') }}</a></li>
                            <li><a href="{{ url('/hrm/salary-payments') }}">{{ __(' Make Payment') }}</a></li>
                            <li><a href="{{ url('/hrm/generate-payslips/') }}">{{ __(' Generate Payslip') }}</a></li>
                            <li><a href="{{ url('/hrm/salary/sheet/search') }}">{{ __('Salary Sheet') }}</a></li>
                            <li><a href="{{ url('/hrm/bonuses') }}">{{ __('Manage Bonus') }}</a></li>
                            <li><a href="{{ url('/hrm/deductions') }}">{{ __('Manage Deduction') }}</a></li>
                            <li><a href="{{ url('/hrm/loans') }}">{{ __(' Loan Management') }}</a></li>
                            <li><a href="{{ url('/hrm/provident-funds') }}">{{ __(' Provident Fund') }}</a></li>
                        </ul>
                    </li>
                {{-- Expense --}}
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-minus"></i> <span>{{ __('Expense Management') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/hrm/expense/category/add') }}"><span>{{ __('New Expense Category') }}</span></a></li>
                        <li><a href="{{ url('/hrm/expense/category/list') }}"><span>{{ __('Expense Category List') }}</span></a></li>
                        <li><a href="{{ url('/hrm/expense/add-expense') }}"><span>{{ __('Create Expense') }}</span></a></li>
                        <li><a href="{{ url('/hrm/expense/manage-expense') }}"><span>{{ __('Expense List') }}</span></a></li>
                    </ul>
                </li>

                {{-- Leave Mgmt --}}
                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-send"></i> <span>{{ __('Leave Management') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        
                            <li><a href="{{ url('/setting/leave_categories/create') }}">{{ __('New Leave Category') }}</a></li>
                       
                        
                            <li><a href="{{ url('/setting/leave_categories') }}">{{ __('Leave Category List') }}</a></li>
                  
                            <li><a href="{{ url('/hrm/application_lists') }}"><span>{{ __('Leave Application List') }}</span></a></li>
                        
                            <li><a href="{{ url('/hrm/leave_application/create') }}"><span>{{ __('New Leave Application') }}</span></a></li>
                        
                            <li><a href="{{ url('/hrm/leave_application') }}"><span>{{ __('Leave Application Manage') }}</span></a></li>
                       
                            <li><a href="{{ url('/hrm/leave-reports') }}"><span>{{ __('Leave Reports') }}</span></a></li>
                        
                    </ul>
                </li>

                {{-- Attendance Management --}}
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar"></i> <span>{{ __('Attendance Management') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/hrm/attendance/manage') }}">{{ __('Manage Attendance') }} </a></li>
                        <li><a href="{{ url('/hrm/attendance/details/report/go') }}">{{ __(' Attendance Statement') }}</a></li>
                        <li><a href="{{ url('/hrm/attendance/report') }}">{{ __(' Attendance Report') }}</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-trophy"></i> <span>{{ __('Award Management') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        {{-- <li><a href="{{ url('/hrm/employee-awards/create') }}"><span>{{ __('New Award') }}</span></a></li> --}}
                        <li><a href="{{ url('/hrm/employee-awards') }}"><span>{{ __('Manage Award') }}</span></a></li>
                    </ul>
                </li>
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text"></i> <span>{{ __('Experience Certificate') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/hrm/noc/add') }}"> <span>{{ __('Add Certificate') }}</span></a></li>
                        <!-- <li><a href="{{ url('/hrm/noc/list') }}"> <span>{{ __('NOC List') }}</span></a></li> -->
                        <li><a href="{{ url('/hrm/certificate/list') }}"> <span>{{ __('Experience Certificate') }}</span></a></li>
                    </ul>
                </li>
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text"></i> <span>{{ __('Roles') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/admin/roles/add') }}"> <span>{{ __('Add Role') }}</span></a></li>
                        <li><a href="{{ url('/admin/roles/index') }}"> <span>{{ __('Roles') }}</span></a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </section>
    <!-- /.sidebar -->
</aside>
