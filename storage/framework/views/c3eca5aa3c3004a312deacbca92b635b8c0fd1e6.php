<?php $__env->startSection('title', __('Roles')); ?>

<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo e(__('Roles')); ?>

            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?> </a></li>
                <li class="active"><?php echo e(__('Manage roles')); ?> </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('Manage roles')); ?> </h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <a href="<?php echo e(url('/admin/roles/add')); ?>" class="btn btn-primary btn-flat"><i
                                class="fa fa-plus"></i><?php echo e(__(' Add roles')); ?></a>
                    </div>

                    <div class="col-md-6">
                        <input type="text" id="myInput" class="form-control" placeholder="<?php echo e(__('Search..')); ?>">
                    </div>
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
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('SL#')); ?></th>
                                    <th><?php echo e(__('Role Name')); ?></th>
                                    <th><?php echo e(__('Created at')); ?></th>
                                    <th class="text-center"><?php echo e(__('Actions')); ?></th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php ($sl = 1); ?>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($sl++); ?></td>
                                        <td><?php echo e($role['name']); ?></td>
                                        <td><?php echo e(date('D d F Y h:ia', strtotime($role['created_at']))); ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo e(url('/admin/roles/edit/' . $role['id'])); ?>"><i
                                                    class="icon fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                            <a href="<?php echo e(url('/admin/roles/edit-permissions/' . $role['id'])); ?>"><i
                                                    class="icon fa fa-edit"></i> <?php echo e(__('Manage Permissions')); ?></a>
                                            <a href="<?php echo e(url('/admin/roles/delete/' . $role['id'])); ?>"><i
                                                    class="icon fa fa-trash"></i> <?php echo e(__('Delete')); ?></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KarmaPatro1\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>