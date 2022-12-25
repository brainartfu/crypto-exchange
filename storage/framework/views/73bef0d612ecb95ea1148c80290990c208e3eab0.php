
<?php $__env->startSection('title'); ?>
   <?php echo translate('Generate BackUp'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
 <section class="section">
    <div class="section-header">
        <h1><?php echo translate('Generate BackUp'); ?></h1>
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
							<?php echo $__env->make('admin.partials.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
							<div style="padding: 10px;" class="text-center">
								<?php if($bkuplink == ""): ?>
									<span id="bkupData"><?php echo e(__('No Backup File Generated.')); ?></span>
								<?php else: ?>
									<span id="bkupData"><a href="<?php echo e($bkuplink); ?>"><?php echo e($chk); ?></a><a href="<?php echo e(route('admin-clear-backup')); ?>"> <i class="fa fa-times-circle"></i></a></span>
								<?php endif; ?>
							</div>
							<hr/>
							<div class="add-product-footer text-center">
								<button name="addProduct_btn" id="generateBkup" type="button" class="addProductSubmit-btn btn btn-primary"><?php echo e(__('Generate Backup')); ?></button>
							</div>
		
		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">

        $("#generateBkup").click(function(){
            $('#bkupData').html('<p><?php echo e(__('Generating Backup... Please wait....')); ?></p>');
            $.ajax({
                url: "<?php echo e(url('admin/check/movescript')); ?>",
                success: function(result){
                    if(result.status == 'success'){
                        $("#bkupData").html('<a href="'+result.backupfile+'">'+result.filename+'</a>');
                    }
                }
            });
        });

	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\resources\views\admin\movetoserver.blade.php ENDPATH**/ ?>