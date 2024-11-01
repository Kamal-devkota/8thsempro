<?php $__env->startSection('title', __('Add Roles')); ?>

<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo e(__('Add Roles')); ?>

            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?> </a></li>
                <li class="active"><?php echo e(__('Add Roles')); ?> </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('Add Roles')); ?> </h3>
                </div>
                <!-- /.box-header -->
                <form action="<?php echo e(url('/admin/roles/store')); ?>" method="post" name="employee_award_add_form">
                    <?php echo e(csrf_field()); ?>

                    <div class="box-body">
                        <div class="row">
                            <!-- Notification Box -->
                            <div class="col-md-12">
                                <?php if(!empty(Session::get('message'))): ?>
                                    <div class="alert alert-success alert-dismissible" id="notification_box">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <i class="icon fa fa-check"></i> <?php echo e(Session::get('message')); ?>

                                    </div>
                                <?php elseif(!empty(Session::get('exception'))): ?>
                                    <div class="alert alert-warning alert-dismissible" id="notification_box">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <i class="icon fa fa-warning"></i> <?php echo e(Session::get('exception')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- /.Notification Box -->

                            <div class="col-md-6">

                                <label for="name"><?php echo e(__('Role Name')); ?> <span class="text-danger"></span></label>
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?> has-feedback">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Enter Role Name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <!-- /.form-group -->


                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i>
                                <?php echo e(__('Add')); ?></button>
                        </div>
                </form>
            </div>
            <!-- /.box -->


        </section>
        <!-- /.content -->
    </div>
    <script type="text/javascript">
        document.forms['employee_award_add_form'].elements['publication_status'].value =
            "<?php echo e(old('publication_status')); ?>";
    </script>

    <script type="text/javascript">
        //Month picker
        $('#monthpicker').datepicker({
            autoclose: true,
            format: "yyyy-mm",
            viewMode: "months",
            minViewMode: "months"
        });
        $('#monthpicker').datepicker('setDate', 'now');

        //Month picker
        $('#monthpicker2').datepicker({
            autoclose: true,
            format: "yyyy-mm",
            viewMode: "months",
            minViewMode: "months"
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/College/KarmaPatro/resources/views/admin/roles/add.blade.php ENDPATH**/ ?>