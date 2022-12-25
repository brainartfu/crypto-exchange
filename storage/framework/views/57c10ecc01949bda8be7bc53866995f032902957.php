
<?php $__env->startSection('title'); ?>
   <?php echo translate('System Purchase Activation'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
 <section class="section">
    <div class="section-header">
        <h1><?php echo translate('System Purchase Activation'); ?></h1>
       
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="product-description">
						<div class="body-area">
		
							<div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
							<?php if($activation_data != ""): ?>
								<div class="row">
									<div class="col-lg-12 text-center" style="color:darkgreen">
		
										<?php echo $activation_data; ?>

		
									</div>
								</div>
							<?php else: ?>
								<form id="geniusform" action="<?php echo e(route('admin-activate-purchase')); ?>" method="POST">
									<?php echo e(csrf_field()); ?>

		
									<?php echo $__env->make('admin.partials.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
		
									<div class="row">
										<div class="col-lg-4">
											<div class="left-area">
												<h4 class="heading"><?php echo e(__('Purchase Code')); ?> *</h4>
												<p class="sub-heading"><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank"><?php echo e(__('How to get purchase code?')); ?></a></p>
											</div>
										</div>
										<div class="col-lg-7">
											<input class="form-control" name="pcode" id="admin_name" placeholder="<?php echo e(__('Enter Purchase Code')); ?>" required="" value="" type="text">
										</div>
									</div>
		
		
									<div class="row">
										<div class="col-lg-4">
											<div class="left-area">
		
											</div>
										</div>
										<div class="col-lg-7">
											<button class="addProductSubmit-btn btn btn-primary" type="submit"><?php echo e(__('Activate')); ?></button>
										</div>
									</div>
		
								</form>
		
							<?php endif; ?>
		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\resources\views\admin\activation.blade.php ENDPATH**/ ?>