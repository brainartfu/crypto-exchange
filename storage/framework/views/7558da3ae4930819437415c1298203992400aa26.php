

<?php $__env->startSection('title'); ?>
   <?php echo translate('Profile Setting'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
 <section class="section">
    <div class="section-header">
        <h1><?php echo translate('Send Notification'); ?></h1>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php if(Session::has('flash_msg_success')): ?>
                     <div class="alert alert-success p-2">
                        <strong>Success!</strong> <?php echo session('flash_msg_success'); ?>.
                     </div>
                     <?php endif; ?>
                    <form action="<?php echo e(route('admin.sendNotification')); ?>" class="row" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo translate('Title'); ?></label>
                                <input class="form-control" type="text" name="title" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="6 " placeholder="Message" maxlength="200"></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-lg"><?php echo translate('Submit'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\resources\views\admin\notifications.blade.php ENDPATH**/ ?>