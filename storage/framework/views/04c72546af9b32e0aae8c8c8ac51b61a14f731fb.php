<!DOCTYPE html>
<html>
    <!-- head -->
    <?php echo $__env->make('admin.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /head -->
    <body class="hold-transition skin-purple-light sidebar-mini">

        <div class="wrapper">

            <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('admin.layouts.left_side_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->yieldContent('main_content'); ?>

            <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Add the side bar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>

        <?php echo $__env->make('admin.layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
    </body>


</html><?php /**PATH /var/www/html/KarmaPatro/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>