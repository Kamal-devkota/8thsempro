
<?php $__env->startSection('title', __('Add Expense Category')); ?>

<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo e(__('ADD EXPENSES CATEGORY')); ?>

            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
                <li><a><?php echo e(__('HRM')); ?></a></li>
                <li><a href="<?php echo e(url('/hrm/expense/manage-expense')); ?>"><?php echo e(__('expense')); ?></a></li>
                <li class="active"><?php echo e(__('category')); ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('Add expeses')); ?></h3>
                </div>
                <!-- /.box-header -->
                <form action="<?php echo e(url('/hrm/expense/category/store')); ?>" method="post" name="add_form_expense">
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



                                <label for="balance_amount"><?php echo e(__('Expense Purpose Name')); ?></label>
                                <div class="form-group">
                                    <input type="text" name="exp_name" class="form-control"
                                        placeholder="<?php echo e(__('Enter Purpose Name')); ?>">
                                </div>


                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="<?php echo e(url('/hrm/expense/manage-expense')); ?>" class="btn btn-danger btn-flat"><i
                                class="icon fa fa-close"></i> <?php echo e(__('Cancel')); ?></a>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i>
                            <?php echo e(__('Add Category')); ?></button>
                    </div>
                </form>
            </div>
            <!-- /.box -->


        </section>
        <!-- /.content -->
    </div>
    <script type="text/javascript">
        document.forms['add_form_expense'].elements['publication_status'].value = "<?php echo e(old('publication_status')); ?>";
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/College/KarmaPatro/resources/views/admin/hrm/expense/expensePurposeAdd.blade.php ENDPATH**/ ?>