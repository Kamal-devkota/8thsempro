<?php $__env->startSection('title', __('Manage Permissions')); ?>

<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo e(__('Permissions')); ?>

            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?> </a></li>
                <li class="active"><?php echo e(__('Manage Permissions')); ?> </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('Manage Permissions')); ?> </h3>
                </div>
                <div class="box-body">
                    <!-- Notification Box -->
                    <div class="col-md-12">
                        <?php if(!empty(Session::get('message'))): ?>
                            <div class="alert alert-success alert-dismissible" id="notification_box">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-check"></i> <?php echo e(Session::get('message')); ?>

                            </div>
                        <?php elseif(!empty(Session::get('exception'))): ?>
                            <div class="alert alert-warning alert-dismissible" id="notification_box">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-warning"></i> <?php echo e(Session::get('exception')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- /.Notification Box -->
                    <form class="form-horizontal" method="POST"
                        action="/admin/roles/update-permissions/<?php echo e($role->id); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Module')); ?></th>
                                        <th><?php echo e(__('Permissions')); ?></th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    $default_modules = ['employees', 'clients', 'departments', 'designations', 'client-types', 'award-categories', 'leave-categories', 'working-day', 'holiday-list', 'personal-event', 'notices', 'notice-board', 'salary', 'increament', 'payslip', 'payment', 'salary-sheet', 'bonus', 'deduction', 'loan', 'provident-fund', 'expense', 'expense-category', 'leave-category', 'leave-application', 'leave-report', 'attendance', 'attendance-report', 'award', 'certificate', 'roles', 'update-permissions'];
                                    $default_permissions = ['create', 'read', 'update', 'delete'];
                                    ?>
                                    <?php $__currentLoopData = $default_modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(__(ucfirst($row))); ?></td>
                                            <td>
                                                <div class="col-3 form-check">
                                                    <?php $__currentLoopData = $default_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(in_array($permission . '-' . $row, $allpermissions)): ?>
                                                            <?php ($key = array_search($permission . '-' . $row, $allpermissions)); ?>
                                                            <input class="form-check-input"
                                                                id="permission_<?php echo e($key); ?>" name="permissions[]"
                                                                type="checkbox" value="<?php echo e($key); ?>" 
                                                                    <?php echo e(in_array($permission . '-' . $row, $permissions) ? 'Checked' : ''); ?>

                                                                >
                                                            <label for="permission_<?php echo e($key); ?>"
                                                                class="form-check-label"><?php echo e($permission); ?></label>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary float-right"><?php echo e(__('Update Permission')); ?></button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/College/KarmaPatro/resources/views/admin/roles/manage-permissions.blade.php ENDPATH**/ ?>