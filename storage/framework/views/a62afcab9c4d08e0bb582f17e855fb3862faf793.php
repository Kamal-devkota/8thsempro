<?php $__env->startSection('title', __('Certificate List')); ?>

<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo e(__('Certificate')); ?>

            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
                <li><a><?php echo e(__('HRM')); ?></a></li>
                <li class="active"><?php echo e(__('Certificate')); ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('Manage Certificate')); ?></h3>
                </div>
                <div class="box-body">

                    <div class="col-md-6">
                        <a href="<?php echo e(url('/setting/departments/create')); ?>" class="btn btn-primary btn-flat"><i
                                class="fa fa-plus"></i> <?php echo e(__('Add Certificate')); ?></a>
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
                                    <th><?php echo e(__('Employee')); ?></th>
                                    <th><?php echo e(__('Date')); ?></th>
                                    <th class="text-center"><?php echo e(__('Actions')); ?></th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php $nocs = \App\Models\Noc::all()->where('category', 2); ?>
                                <?php ($sl = 1); ?>
                                <?php $__currentLoopData = $nocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($sl++); ?></td>
                                        <td><?php echo e(\App\Models\User::find($noc->empid)->name); ?></td>
                                        <td class="text-center"><?php echo e($noc->created_at->format('d/m/Y')); ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo e(url('/hrm/certificate/generate/' . $noc->id)); ?>"><i
                                                    class="icon fa fa-file-text"></i> <?php echo e(__('Download')); ?></a>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/College/KarmaPatro/resources/views/admin/hrm/certificate/list.blade.php ENDPATH**/ ?>