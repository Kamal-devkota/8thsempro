<aside class="main-sidebar">
    <section class="sidebar">
        <div id="mainMenu">
            <ul class="sidebar-menu" data-widget="tree">

                
                <li>
                    <a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i>
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
                        <i class="fa fa-cog"></i> <span><?php echo e(__('Settings')); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('/setting/departments')); ?>"><?php echo e(__('Manage Departments')); ?> </a></li>
                        <li><a href="<?php echo e(url('/setting/designations')); ?>"><?php echo e(__('Manage Designations')); ?> </a></li>
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

            </ul>
        </div>
    </section>
    <!-- /.sidebar -->
</aside>
<?php /**PATH /var/www/html/KarmaPatro/resources/views/admin/layouts/left_side_bar.blade.php ENDPATH**/ ?>