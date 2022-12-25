
<?php $__env->startSection('title'); ?>
   <?php echo translate('Add New Blog'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
 <section class="section">
    <div class="section-header  d-flex justify-content-between">
        <h1><?php echo translate('Add New Blog'); ?></h1>
        <a href="<?php echo e(route('user.blog.index')); ?>" class="btn btn-primary"><i class="fas fa-backward"></i> <?php echo translate('Back'); ?></a>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">
   <div class="col-md-12">
      <!-- Form Basic -->
      <div class="card mb-4">
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Add New Blog Form')); ?></h6>
         </div>
         <div class="card-body">
           
            <form action="<?php echo e(route('user.blog.store')); ?>" enctype="multipart/form-data" method="POST">
                <?php echo csrf_field(); ?>
                <div class="col-md-12 ShowImage mb-3  text-center">
                    <img src="<?php echo e(getPhoto('')); ?>" id="img" class="img-fluid" alt="image" width="400">
                 </div>
                <div class="form-group">
                    <label for="title"><?php echo e(__('Blog Title')); ?></label>
                    <input type="text" class="form-control" name="title" id="title" required placeholder="<?php echo e(__('Blog Title')); ?>" value="<?php echo e(old('title')); ?>">
                </div>
            
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="categorys"><?php echo e(__('Category')); ?></label>
                            <select class="form-control  mb-3" id="categorys" name="category_id" required>
                                <option value="" selected disabled><?php echo e(translate('Select Category')); ?></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image"><?php echo e(__('Blog Photo')); ?></label>
                            <span class="ml-3"><?php echo e(__('(Extension:jpeg,jpg,png)')); ?></span>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo" id="image" accept="image/*" required>
                                <label class="custom-file-label" for="photo"><?php echo e(__('Choose file')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description"><?php echo e(__('Description')); ?></label>
                    <textarea id="area1" class="form-control summernote" name="description" placeholder="<?php echo e(__('Description')); ?>" required><?php echo e(old('description')); ?></textarea>
                </div>
        
                <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
            </form>
         </div>
      </div>
      <!-- Form Sizing -->
      <!-- Horizontal Form -->
   </div>
</div>
<!--Row-->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $(document).on('change', '#image', function(event) {
        console.log('changed occured');
            var file = event.target.files[0];
            var target = $(this).attr('data-target');
            var path = $('#img');
            var reader = new FileReader();
            reader.onload = function(e) {
                path.attr('src', e.target.result);

            };
            reader.readAsDataURL(file);
        })
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\resources\views\user\blog\create.blade.php ENDPATH**/ ?>