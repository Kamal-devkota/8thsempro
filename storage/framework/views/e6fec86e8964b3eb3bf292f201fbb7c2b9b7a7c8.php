<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo e(url('/dashboard')); ?>" class="logo">
        Karma Patro
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only"><?php echo e(__('Toggle navigation')); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if(!empty(auth()->user()->avatar)): ?>
                        <img src="<?php echo e(asset('profile_picture/'.auth()->user()->avatar)); ?>" class="user-image" alt="User Image">
                        <?php else: ?>
                        <img src="<?php echo e(asset('images/user.png')); ?>" class="user-image" alt="User Image">
                        <?php endif; ?>

                        <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
                    </a>
                    <ul class="dropdown-menu wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s">
                        <!-- User image -->
                        <li class="user-header">
                            <?php if(!empty(auth()->user()->avatar)): ?>
                                <img src="<?php echo e(asset('profile_picture/' . auth()->user()->avatar)); ?>"
                                    class="img-circle" alt="User Image">
                            <?php else: ?>
                                <img src="<?php echo e(asset('images/user.png')); ?>" class="img-circle" alt="User Image">
                            <?php endif; ?>
                            <p>
                                <?php echo e(Auth::user()->name); ?>

                                <small><?php echo e(__('Member Since')); ?>

                                    <?php echo e(date('d F Y', strtotime(Auth::user()->created_at))); ?> </small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo e(url('/profile/user-profile')); ?>"
                                    class="btn btn-default btn-flat"><?php echo e(__('Profile')); ?></a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo e(route('logout')); ?>" class="btn btn-default btn-flat"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(__('Sign out')); ?></a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>
<?php /**PATH C:\xampp\htdocs\KarmaPatro1\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>