<aside class="main-sidebar">
    <section class="sidebar">
        <div id="mainMenu">
            <ul class="sidebar-menu" data-widget="tree">

                
                <li>
                    <a href="<?php echo e(url('/')); ?>"><i class="fa fa-dashboard"></i>
                        <span><?php echo e(__('Dashboard')); ?></span></a>
                </li>

                <?php if(auth()->user()->can('create-employees') && auth()->user()->can('read-employees') && auth()->user()->can('update-employees') && auth()->user()->can('delete-employees')): ?>
                
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
                <?php endif; ?>

                
                <?php if(auth()->user()->can('create-organization') && auth()->user()->can('read-organization') && auth()->user()->can('update-organization') && auth()->user()->can('delete-organization')): ?>
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
                <?php endif; ?>

                
                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-bell"></i> <span><?php echo e(__('Notice Management')); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(auth()->user()->can('create-notices') && auth()->user()->can('read-notices') && auth()->user()->can('update-notices') && auth()->user()->can('delete-notices')): ?>
                            <li><a href="<?php echo e(url('/hrm/notice')); ?>"><?php echo e(__('Notices')); ?></a></li>
                        <?php endif; ?>
                        <?php if(auth()->user()->can('read-notices')): ?>
                            <li><a href="<?php echo e(url('/hrm/notice/show')); ?>"><span><?php echo e(__('Notice Board')); ?></span></a></li>
                        <?php endif; ?>
                    </ul>
                </li>

                
                <?php if(auth()->user()->can('create-salary') && auth()->user()->can('read-salary') && auth()->user()->can('update-salary') && auth()->user()->can('delete-salary')): ?>
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
                <?php endif; ?>

                
                <?php if(auth()->user()->can('create-certificate') && auth()->user()->can('read-certificate') && auth()->user()->can('update-certificate') && auth()->user()->can('delete-certificate')): ?>
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
                <?php endif; ?>

                
                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-send"></i> <span><?php echo e(__('Leave Management')); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(auth()->user()->can('create-leave-category')): ?>
                            <li><a href="<?php echo e(url('/setting/leave_categories/create')); ?>"><?php echo e(__('New Leave Category')); ?></a></li>
                        <?php endif; ?>
                        <?php if(auth()->user()->can('create-leave-category')): ?>
                            <li><a href="<?php echo e(url('/setting/leave_categories')); ?>"><?php echo e(__('Leave Category List')); ?></a></li>
                        <?php endif; ?>
                        <?php if(auth()->user()->can('create-leave-category')): ?>
                            <li><a href="<?php echo e(url('/hrm/application_lists')); ?>"><span><?php echo e(__('Leave Application List')); ?></span></a></li>
                        <?php endif; ?>
                        <?php if(auth()->user()->can('create-leave-application')): ?>
                            <li><a href="<?php echo e(url('/hrm/leave_application/create')); ?>"><span><?php echo e(__('New Leave Application')); ?></span></a></li>
                        <?php endif; ?>
                        <?php if(auth()->user()->can('create-leave-application')): ?>
                            <li><a href="<?php echo e(url('/hrm/leave_application')); ?>"><span><?php echo e(__('Leave Application Manage')); ?></span></a></li>
                        <?php endif; ?>
                        <?php if(auth()->user()->can('create-leave-reort')): ?>
                            <li><a href="<?php echo e(url('/hrm/leave-reports')); ?>"><span><?php echo e(__('Leave Reports')); ?></span></a></li>
                        <?php endif; ?>
                    </ul>
                </li>

                
                <?php if(auth()->user()->can('create-attendance') && auth()->user()->can('read-attendance') && auth()->user()->can('update-attendance') && auth()->user()->can('delete-attendance')): ?>
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
                <?php endif; ?>

                
                <?php if(auth()->user()->can('create-award') && auth()->user()->can('read-award') && auth()->user()->can('update-award') && auth()->user()->can('delete-award')): ?>
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
                <?php endif; ?>

                
                <?php if(auth()->user()->can('create-expense') && auth()->user()->can('read-expense') && auth()->user()->can('update-expense') && auth()->user()->can('delete-expense')): ?>
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
                <?php endif; ?>

                
                <?php if(auth()->user()->can('create-roles') && auth()->user()->can('read-roles') && auth()->user()->can('update-roles') && auth()->user()->can('delete-roles')): ?>
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
                <?php endif; ?>

            </ul>
        </div>
    </section>
    <!-- /.sidebar -->
</aside>
<?php /**PATH /var/www/html/College/KarmaPatro/resources/views/admin/layouts/left_side_bar.blade.php ENDPATH**/ ?>