<?php $__env->startSection('title', __('Manage Attendance')); ?>

<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo e(__('ATTENDANCE')); ?>

            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?> </a></li>
                <li><a><?php echo e(__('Attendance')); ?> </a></li>
                <li class="active"><?php echo e(__(' Manage Attendance')); ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('Manage Attendance')); ?> </h3>
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
                    <div class="col-md-12">
                        <form action="<?php echo e(url('/hrm/attendance/set')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="input-group margin">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="date" class="form-control" id="datepicker">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-info btn-flat"><i
                                                    class="icon fa fa-arrow-right"></i><?php echo e(__('Go')); ?> </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /. end col -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/College/KarmaPatro/resources/views/admin/hrm/attendance/manage_attendance.blade.php ENDPATH**/ ?>