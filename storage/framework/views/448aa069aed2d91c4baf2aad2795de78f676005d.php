<aside class="main-sidebar">
    <section class="sidebar">
        <div id="mainMenu">
            <ul class="sidebar-menu" data-widget="tree">

                
                <li>
                    <a href="<?php echo e(url('/')); ?>"><i class="fa fa-dashboard"></i>
                        <span><?php echo e(__('Dashboard')); ?></span></a>
                </li>

                
                
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i> <span><?php echo e(__('Employee Management')); ?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo e(url('/employees')); ?>"><?php echo e(__('Employees')); ?></a></li>
                            <li><a href="<?php echo e(url('/clients')); ?>"> <?php echo e(__('Clients')); ?></a></li>
                        </ul>
                    </li>

                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i> <span><?php echo e(__('Organization')); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('/setting/departments')); ?>"><?php echo e(__('Manage Departments')); ?> </a></li>
                        <li><a href="<?php echo e(url('/setting/designations')); ?>"><?php echo e(__('Manage Designations')); ?> </a></li>
                        <li><a href="<?php echo e(url('/setting/client-types')); ?>"> <?php echo e(__('Manage Client Types')); ?> </a></li>
                        <li><a href="<?php echo e(url('/setting/award_categories')); ?>"> <?php echo e(__('Manage Award Categories')); ?></a></li>
                        <li><a href="<?php echo e(url('/setting/working-days')); ?>"> <?php echo e(__('Set Working Day')); ?></a></li>
                        <li><a href="<?php echo e(url('/setting/holidays')); ?>"><?php echo e(__('Holiday List')); ?> </a></li>
                        <li><a href="<?php echo e(url('/setting/personal-events')); ?>"><?php echo e(__('Personal Event')); ?> </a></li>
                    </ul>
                </li>

                
                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-bell"></i> <span><?php echo e(__('Notice Management')); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                    <li><a href="<?php echo e(url('/hrm/notice')); ?>"><?php echo e(__('Notices')); ?></a></li>
                    <li><a href="<?php echo e(url('/hrm/notice/show')); ?>"><span><?php echo e(__('Notice Board')); ?></span></a></li>
                    </ul>
                </li>

                
                 <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dollar"></i> <span><?php echo e(__('Payroll Management')); ?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo e(url('/hrm/payroll')); ?>"><?php echo e(__('Manage Salary')); ?></a></li>
                            <li><a href="<?php echo e(url('/hrm/payroll/salary-list')); ?>"><?php echo e(__('Salary List')); ?></a></li>
                            <li><a href="<?php echo e(url('/hrm/payroll/increment/search')); ?>"><?php echo e(__(' New Increment')); ?></a></li>
                            <li><a href="<?php echo e(url('/hrm/payroll/increment/list')); ?>"><?php echo e(__('Increment List')); ?></a></li>
                            <li><a href="<?php echo e(url('/hrm/salary-payments')); ?>"><?php echo e(__(' Make Payment')); ?></a></li>
                            <li><a href="<?php echo e(url('/hrm/generate-payslips/')); ?>"><?php echo e(__(' Generate Payslip')); ?></a></li>
                            <li><a href="<?php echo e(url('/hrm/salary/sheet/search')); ?>"><?php echo e(__('Salary Sheet')); ?></a></li>
                            <li><a href="<?php echo e(url('/hrm/bonuses')); ?>"><?php echo e(__('Manage Bonus')); ?></a></li>
                            <li><a href="<?php echo e(url('/hrm/deductions')); ?>"><?php echo e(__('Manage Deduction')); ?></a></li>
                            <li><a href="<?php echo e(url('/hrm/loans')); ?>"><?php echo e(__(' Loan Management')); ?></a></li>
                            <li><a href="<?php echo e(url('/hrm/provident-funds')); ?>"><?php echo e(__(' Provident Fund')); ?></a></li>
                        </ul>
                    </li>
                
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-minus"></i> <span><?php echo e(__('Expense Management')); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('/hrm/expense/category/add')); ?>"><span><?php echo e(__('New Expense Category')); ?></span></a></li>
                        <li><a href="<?php echo e(url('/hrm/expense/category/list')); ?>"><span><?php echo e(__('Expense Category List')); ?></span></a></li>
                        <li><a href="<?php echo e(url('/hrm/expense/add-expense')); ?>"><span><?php echo e(__('Create Expense')); ?></span></a></li>
                        <li><a href="<?php echo e(url('/hrm/expense/manage-expense')); ?>"><span><?php echo e(__('Expense List')); ?></span></a></li>
                    </ul>
                </li>

                
                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-send"></i> <span><?php echo e(__('Leave Management')); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        
                            <li><a href="<?php echo e(url('/setting/leave_categories/create')); ?>"><?php echo e(__('New Leave Category')); ?></a></li>
                       
                        
                            <li><a href="<?php echo e(url('/setting/leave_categories')); ?>"><?php echo e(__('Leave Category List')); ?></a></li>
                  
                            <li><a href="<?php echo e(url('/hrm/application_lists')); ?>"><span><?php echo e(__('Leave Application List')); ?></span></a></li>
                        
                            <li><a href="<?php echo e(url('/hrm/leave_application/create')); ?>"><span><?php echo e(__('New Leave Application')); ?></span></a></li>
                        
                            <li><a href="<?php echo e(url('/hrm/leave_application')); ?>"><span><?php echo e(__('Leave Application Manage')); ?></span></a></li>
                       
                            <li><a href="<?php echo e(url('/hrm/leave-reports')); ?>"><span><?php echo e(__('Leave Reports')); ?></span></a></li>
                        
                    </ul>
                </li>

                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar"></i> <span><?php echo e(__('Attendance Management')); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('/hrm/attendance/manage')); ?>"><?php echo e(__('Manage Attendance')); ?> </a></li>
                        <li><a href="<?php echo e(url('/hrm/attendance/details/report/go')); ?>"><?php echo e(__(' Attendance Statement')); ?></a></li>
                        <li><a href="<?php echo e(url('/hrm/attendance/report')); ?>"><?php echo e(__(' Attendance Report')); ?></a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-trophy"></i> <span><?php echo e(__('Award Management')); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        
                        <li><a href="<?php echo e(url('/hrm/employee-awards')); ?>"><span><?php echo e(__('Manage Award')); ?></span></a></li>
                    </ul>
                </li>
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text"></i> <span><?php echo e(__('Experience Certificate')); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('/hrm/noc/add')); ?>"> <span><?php echo e(__('Add Certificate')); ?></span></a></li>
                        <!-- <li><a href="<?php echo e(url('/hrm/noc/list')); ?>"> <span><?php echo e(__('NOC List')); ?></span></a></li> -->
                        <li><a href="<?php echo e(url('/hrm/certificate/list')); ?>"> <span><?php echo e(__('Experience Certificate')); ?></span></a></li>
                    </ul>
                </li>
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text"></i> <span><?php echo e(__('Roles')); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('/admin/roles/add')); ?>"> <span><?php echo e(__('Add Role')); ?></span></a></li>
                        <li><a href="<?php echo e(url('/admin/roles/index')); ?>"> <span><?php echo e(__('Roles')); ?></span></a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </section>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\xampp\htdocs\KarmaPatro1\resources\views/admin/layouts/left_side_bar.blade.php ENDPATH**/ ?>