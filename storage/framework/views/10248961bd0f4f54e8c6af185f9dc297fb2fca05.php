<?php $__env->startSection('title', __('Dashboard')); ?>

<?php $__env->startSection('main_content'); ?>

    <div class="content-wrapper fadeInDown">
        
        <section class="content-header">
            <h1><?php echo e(__('Dashboard')); ?></h1>
            <ol class="breadcrumb">
                <li><a href="#"><?php echo e(__(' Home')); ?></a></li>
                <li class="active"><?php echo e(__('Dashboard')); ?></li>
            </ol>
        </section>

        <?php ($user = Auth::user()); ?>

        <?php if($user->access_label == 1): ?>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><i class="fa fa-users"></i> <?php echo e(count($employees)); ?></h3>

                                    <center><b><?php echo e(__('Employees')); ?></b></center>
                                </div>
                                <div class="icon">

                                </div>
                                <a href="<?php echo e(url('/people/clients')); ?>" class="small-box-footer"><?php echo e(__('View More')); ?> <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><i class="fa fa-envelope"></i> <?php echo e(count($references)); ?></h3>

                                    <center><b><?php echo e(__('References')); ?></b></center>
                                </div>
                                <div class="icon">

                                </div>
                                <a href="<?php echo e(url('/people/references')); ?>"
                                    class="small-box-footer"><?php echo e(__('View More ')); ?><i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><i class="fa fa-users"></i> <?php echo e(count($clients)); ?></h3>

                                    <center><b><?php echo e(__('Clients')); ?></b></center>
                                </div>
                                <div class="icon">

                                </div>
                                <a href="<?php echo e(url('/people/employees')); ?>"
                                    class="small-box-footer"><?php echo e(__('View More ')); ?><i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><i class="fa fa-image"></i> <?php echo e(count($files)); ?></h3>

                                    <center> <b><?php echo e(__('Files')); ?></b></center>
                                </div>
                                <div class="icon">

                                </div>
                                <a href="<?php echo e(url('/folders')); ?>" class="small-box-footer"><?php echo e(__('View More')); ?> <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!-- =================Statistics start ========================-->
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
                        <?php
                        $notics = \App\Models\Notice::take(4)->get();
                        $holidays = \App\Models\Holiday::all();
                        $files = \App\Models\File::all();
                        
                        $personalevents = \App\Models\PersonalEvent::all();
                        
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card1">
                                    <div class="card-body">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row myrow">
                            <div class="col-lg-6">
                                <h2 class=""><?php echo e(__('Holidays')); ?></h2>
                                <table class="table table-bordered table-striped mt-0">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('SN')); ?></th>
                                            <th><?php echo e(__('Holiday')); ?></th>
                                            <th><?php echo e(__('Date')); ?></th>
                                            <th><?php echo e(__('Description')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sl = 1; ?>

                                        <?php $__currentLoopData = $holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holiday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($sl++); ?></td>
                                                <td><?php echo e($holiday->holiday_name); ?></td>
                                                <td><?php echo e($holiday->date); ?></td>
                                                <td><?php echo e($holiday->description); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <h2 class=""><?php echo e(__('Notices')); ?></h2>
                                <table class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('SN')); ?></th>
                                            <th><?php echo e(__('Title')); ?></th>
                                            <th><?php echo e(__('Description')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sl = 1; ?>

                                        <?php $__currentLoopData = $notics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($sl++); ?></td>
                                                <td><?php echo e($notic->notice_title); ?></td>
                                                <td><?php echo e($notic->description); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <script type="text/javascript">
                            var ctx = document.getElementById('myChart');
                            var myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ['Employees', 'Notices', 'Holidays', 'Files'],
                                    datasets: [{
                                        label: 'Evaluation report by pie chart',
                                        data: [<?php echo e(count($employees)); ?>, <?php echo e(count($notics)); ?>, <?php echo e(count($holidays)); ?>,
                                            <?php echo e(count($files)); ?>

                                        ],
                                        backgroundColor: [
                                            '#7bed9f',
                                            '#b71c1c',
                                            '#54a0ff',
                                            '#686de0',
                                        ],
                                        borderColor: [
                                            '#7bed9f',
                                            '#b71c1c',
                                            '#54a0ff',
                                            '#686de0',
                                        ],
                                        borderWidth: 0
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>

                        <!-- =================Statistics end ========================-->

                    </div>

                    <?php if(count($personal_events) > 0): ?>
                        <div class="box box-danger">
                            <div class="box-header">
                                <h3 class="box-title"><?php echo e(__('Events')); ?></h3>

                                <div class="box-tools">
                                    <div class="input-group input-group-sm mysearch">
                                        <input type="text" name="table_search" class="form-control pull-right"
                                            placeholder="<?php echo e(__('Search')); ?>">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th><?php echo e(__('SL#')); ?></th>
                                        <th><?php echo e(__('Event Name')); ?></th>
                                        <th><?php echo e(__('Start Date')); ?></th>
                                        <th><?php echo e(__('End Date')); ?></th>
                                        <th><?php echo e(__('Created By')); ?></th>
                                    </tr>
                                    <?php ($sl = 1); ?>
                                    <?php $__currentLoopData = $personal_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personal_event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($sl++); ?></td>
                                            <td><span
                                                    class="label label-primary"><?php echo e($personal_event->personal_event); ?></span>
                                            </td>
                                            <td><span
                                                    class="label label-warning"><?php echo e(date('d F Y', strtotime($personal_event->start_date))); ?></span>
                                            </td>
                                            <td><span
                                                    class="label label-warning"><?php echo e(date('d F Y', strtotime($personal_event->end_date))); ?></span>
                                            </td>
                                            <td><?php echo e($personal_event->name); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    <?php endif; ?>
                </div>
            </section>
            <!-- /.content -->
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/KarmaPatro/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>