
<?php $__env->startSection('title', __('Salary Sheet')); ?>
<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    <?php echo e(__('Salary Sheet')); ?>

    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i><?php echo e(__('Dashboard')); ?> </a></li>
      <li><a><?php echo e(__('Salary')); ?></a></li>
      <li class="active"><?php echo e(__('Salary Sheet')); ?></li>
    </ol>
  </section>
  <section class="content">
    <div class="Main_Div">
      <div class="card card-primary card-outline">
        <div class="card-header Su clearfix">
          <div class="Left_One float-left w-50">
            <h3 class="card-title FormTitle"><?php echo e(__('Salary Sheet')); ?></h3>
          </div>
          <div class="Left_Two text-right float-left w-50">
            <button class="btn StateB Print"><?php echo e(__('print')); ?> </button>
          </div>
        </div>
        <div class="card-body Border_bg">
          <div class="state_hader clearfix">
            <div class="state_logo float-left w-50">
              <?php if(!empty(auth()->user()->avatar)): ?>
              <img src="<?php echo e(asset('/profile_picture/'.auth()->user()->avatar)); ?>" class="img-fluid" alt="User Image">
              <?php else: ?>
              <img src="<?php echo e(asset('/profile_picture/blank_profile_picture.png')); ?>" class="img-fluid" alt="User Image">
              <?php endif; ?>
            </div>
            <div class="state_title float-left w-50">
              <h3 class="mb-0"><?php echo e(__('Salary Sheet Of')); ?> <?php echo e(date("F Y", strtotime($salary_month))); ?></h3>
              <p class="mb-0"><?php echo e(auth()->user()->name); ?></p>
              <div class="Employee_dtl pt-2">
                <p class="mb-0"><?php echo e(auth()->user()->present_address); ?></p>
                <p class="mb-0"><?php echo e(__('')); ?>From <?php echo e(date("F Y", strtotime($salary_month))); ?></p>
                <p class="mb-0"><?php echo e(__('Contact:')); ?> <?php echo e(auth()->user()->contact_no_one); ?></p>
              </div>
            </div>
          </div>
          <div class="personal_info py-3 mt-3 clearfix">
            <div class="Present_add float-left">
              <p class="mb-0 FB"><?php echo e(__('Address')); ?></p>
              <p class="mb-0"><?php echo e(auth()->user()->present_address); ?></p>
            </div>
            <div class="Parmanent_add float-left">
              <p class="mb-0 FB"><?php echo e(__('From')); ?> </p>
              <p class="mb-0"><?php echo e(date("F Y", strtotime($salary_month))); ?></p>
            </div>
            <div class="Dates_official float-left">
              <p class="mb-0 FB"><?php echo e(auth()->user()->email); ?></p>
              <p class="mb-0"><?php echo e(__('Contact:')); ?> <?php echo e(auth()->user()->contact_no_one); ?></p>
            </div>
          </div>
          <div class="salary_table">
            <table class="table table-bordered">
              <tr class="bg-info">
                <th><?php echo e(__('sl#')); ?></th>
                <th><?php echo e(__('Employee Name')); ?></th>
                <th><?php echo e(__('Designation')); ?></th>
                <th><?php echo e(__('Gross Salary')); ?></th>
                <th><?php echo e(__('Total Deduction')); ?></th>
                <th><?php echo e(__('Net Salary')); ?></th>
                <th><?php echo e(__('Provident Fund')); ?></th>
                <th><?php echo e(__('Payment Total')); ?></th>
              </tr>
              <?php
              $salarypayments = \App\Models\SalaryPayment::all()->where('payment_month',$salary_month);
              $grosstotal = \App\Models\SalaryPayment::all()->where('payment_month',$salary_month)->sum('gross_salary');
              $didcttotal = \App\Models\SalaryPayment::all()->where('payment_month',$salary_month)->sum('total_deduction');
              $nettotal = \App\Models\SalaryPayment::all()->where('payment_month',$salary_month)->sum('net_salary');
              $pftotal = \App\Models\SalaryPayment::all()->where('payment_month',$salary_month)->sum('provident_fund');
              $paymenttotal = \App\Models\SalaryPayment::all()->where('payment_month',$salary_month)->sum('payment_amount');
              ?>
              <?php ($sl = 1); ?>
              <?php $__currentLoopData = $salarypayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salarypay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
              $emplname = \App\Models\User::find($salarypay->user_id)->name;
              $desigid = \App\Models\User::find($salarypay->user_id)->designation_id;
              $designation = \App\Models\Designation::find($desigid)->designation;
              ?>
              <tr>
                <td><?php echo e($sl++); ?></td>
                <td><?php echo e($emplname); ?></td>
                <td><?php echo e($designation); ?></td>
                <td><?php echo e(number_format($salarypay->gross_salary, 2, '.', ',')); ?> </td>
                <td><?php echo e(number_format($salarypay->total_deduction, 2, '.', ',')); ?></td>
                <td><?php echo e(number_format($salarypay->net_salary, 2, '.', ',')); ?></td>
                <td><?php echo e(number_format($salarypay->provident_fund, 2, '.', ',')); ?></td>
                <td><?php echo e(number_format($salarypay->payment_amount, 2, '.', ',')); ?></td>
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              
              <tr>
                <td colspan="3"><span class="TR_B"><?php echo e(__('Total')); ?></span></td>
                <td><span class="TR_B">$<?php echo e(number_format($grosstotal, 2, '.', ',')); ?></span></td>
                <td><span class="TR_B">$<?php echo e(number_format($didcttotal, 2, '.', ',')); ?></span></td>
                <td><span class="TR_B">$<?php echo e(number_format($nettotal, 2, '.', ',')); ?></span></td>
                <td><span class="TR_C">$<?php echo e(number_format($pftotal, 2, '.', ',')); ?> </span></td>
                <td><span class="TR_C">$<?php echo e(number_format($paymenttotal, 2, '.', ',')); ?> </span></td>
              </tr>
            </tbody>
          </table>
          <div class="Bottom_txt_statement text-center my-3">
            <h4 class="mb-0"><?php echo e(__('This is Salary sheet of only one month')); ?></h4>
          </div>
          <div class="clearfix mt-5">
            <div class="Emplyee_sign w-50 py-2 float-left">
              <span class="mb-0"><?php echo e(__('HR Signature')); ?></span>
            </div>
            <div class="Author_sign py-2 w-50 float-left text-right"><span><?php echo e(__('Authorize Signature')); ?></span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
$(function() {

$(".Print").on('click', function() {
print();
});

});
</script>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/College/KarmaPatro/resources/views/admin/hrm/salary_payment/salarySheetView.blade.php ENDPATH**/ ?>