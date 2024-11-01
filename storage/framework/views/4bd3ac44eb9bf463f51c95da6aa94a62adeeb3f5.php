<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(__('Admin Login')); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo e(asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/bower_components/Ionicons/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/dist/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/dist/css/shiplo.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/plugins/iCheck/square/blue.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
</head>

<body class="hold-transition login-page">

    <section class="LoginBg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4" style="background-color: aliceblue">
                    <div class="Login_form">
                        <div class="Heading text-center">
                            <h3>
                                <?php echo e(__('Karma Patro')); ?> 
                                <span>
                                    <img src="<?php echo e(asset('images/karmaIcon.png')); ?>" />
                                </span>
                            </h3>
                        </div>
                        <form action="<?php echo e(route('login')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <div class="over_box">
                                    <label for="InputEmail1"
                                        class="Label<?php echo e($errors->has('email') ? ' has-error' : ''); ?> has-feedback"><?php echo e(__('Email Address')); ?></label>
                                    <input type="email" name="email" value="admin@gmail.com" class="Input"
                                        aria-describedby="emailHelp">
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="over_box">
                                    <label for="InputPassword"
                                        class="<?php echo e($errors->has('password') ? ' has-error' : ''); ?> has-feedback"><?php echo e(__('Password')); ?></label>
                                    <input type="password" name="password" value="123456" class="Input">
                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group Buttons text-center">
                                <button type="submit" class="btn Admin"><?php echo e(__('Admin Login')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <!-- /.login-box -->
    <!-- jQuery 3 -->
    <script src="<?php echo e(asset('backend/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo e(asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo e(asset('backend/plugins/iCheck/icheck.min.js')); ?>"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>
<?php /**PATH /var/www/html/College/KarmaPatro/resources/views/admin/login.blade.php ENDPATH**/ ?>