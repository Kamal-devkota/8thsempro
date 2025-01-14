<?php
use Carbon\Carbon;
?>

<?php $__env->startSection('title', __('Leave Application')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo e(__('APPLICATION')); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i><?php echo e(__('Dashboard')); ?> </a></li>
            <li><a><?php echo e(__('Leave')); ?></a></li>
            <li class="active"><?php echo e(__('Leave application')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Leave application')); ?></h3>
            </div>
            <div class="box-body">
                <div  class="col-md-6">
                <a href="<?php echo e(url('/hrm/leave_application/create')); ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> <?php echo e(__('Add leave application')); ?></a>
            </div>
                <div  class="col-md-6">
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
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?php echo e(__('SL#')); ?></th>
                                <th><?php echo e(__('Reason')); ?></th>
                                <th><?php echo e(__('Starts Date')); ?></th>
                                <th><?php echo e(__('End Date')); ?></th>
                                <th><?php echo e(__('Leave Days')); ?></th>
                                <th><?php echo e(__('Leave category')); ?></th>
                                <th><?php echo e(__('Created at')); ?></th>
                                <th class="text-center"><?php echo e(__('Status')); ?></th>
                                <th class="text-center"><?php echo e(__('Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                        <?php ($sl = 1); ?>
                        <?php $__currentLoopData = $leave_applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($sl++); ?></td>
                            <td><?php echo e(\Illuminate\Support\Str::limit($leave_application['reason'], 65)); ?></td>
                            <td><?php echo e(date('d/m/Y', strtotime($leave_application['start_date']))); ?></td>
                            <td><?php echo e(date('d/m/Y', strtotime($leave_application['end_date']))); ?></td>
                            <td class="text-center">
                                <?php ($leave_days = Carbon::parse($leave_application['start_date'])->diffInDays(Carbon::parse($leave_application['end_date']))+1); ?>
                                <?php echo e($leave_days); ?>

                            </td>
                            <td><?php echo e($leave_application['leave_category']); ?></td>
                            <td><?php echo e(date("D d F Y h:ia", strtotime($leave_application['created_at']))); ?></td>
                            <td class="text-center">
                            <?php if($leave_application['publication_status'] == 0): ?>
                            <a href="" class="btn btn-warning btn-xs btn-flat btn-block" data-toggle="tooltip" data-original-title="Pending"> <?php echo e(__('Pending')); ?> </a>
                            <?php elseif($leave_application['publication_status'] == 1): ?>
                              <a href="" class="btn btn-success btn-xs btn-flat btn-block" data-toggle="tooltip" data-original-title="Accepted"> <?php echo e(__('Accepted')); ?></i></a>
                            <?php else: ?>
                              <a href="" class="btn btn-danger btn-xs btn-flat btn-block" data-toggle="tooltip" data-original-title="Not Accepted"> <?php echo e(__('Not Accepted')); ?></a>
                            <?php endif; ?>
                          </td>
                          <td class="text-center">
                           <a href="<?php echo e(url('/hrm/leave_application/' .$leave_application['id'])); ?>"><i class="icon fa fa-file-text"></i> <?php echo e(__('Details')); ?></a>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KarmaPatro1\resources\views/admin/hrm/leave_application/manage_application.blade.php ENDPATH**/ ?>