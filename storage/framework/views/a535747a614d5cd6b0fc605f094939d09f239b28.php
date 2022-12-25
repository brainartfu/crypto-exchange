

<?php $__env->startSection('title'); ?>
   <?php echo translate('Create New Role'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
 <section class="section">
    <div class="section-header justify-content-between">
        <h1><?php echo translate('Create New Role'); ?></h1>
        <a href="<?php echo e(route('admin.role.manage')); ?>" class="btn btn-primary"><i class="fas fa-backward"></i> <?php echo translate('Back'); ?></a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between">
                        <div class="form-group">
                            <input class="form-control search" type="text" placeholder="<?php echo translate('Search Permission Name'); ?>">
                        </div>
                        <label class="cswitch mb-2 d-flex justify-content-between align-items-center border p-2 rounded">
                            <span class="cswitch--label font-weight-bold ml-4"><?php echo translate('Check All'); ?></span>
                            <input class="cswitch--input check-all" type="checkbox" />
                            <span class="cswitch--trigger wrapper"></span>
                        </label>
                 </div>
                <div class="card-body">
                    <form action="" method="POST">
                         <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label><?php echo translate('Role Name'); ?></label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="row custom-data">
                            <div class="col-md-12 mb-3">
                                <h6><?php echo translate('Assign Permissions'); ?></h6>
                                <hr>
                            </div>
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 col-lg-3 elements">
                                <div class="card">
                                    <div class="card-body">
                                        <label class="cswitch mb-0 d-flex justify-content-between align-items-center">
                                            <input class="cswitch--input permission" name="permissions[]" value="<?php echo e($item->id); ?>" type="checkbox" />
                                            <span class="cswitch--trigger wrapper"></span>
                                            <span class="cswitch--label font-weight-bold "><?php echo app('translator')->get(ucwords($item->name)); ?></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary btn-lg"><?php echo translate('Submit'); ?></button>
                        </div>
                     </form>
                    </div>
                </div>
               
            </div>
        </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        'use strict';

        var elements = $('.elements');
        $(document).on('input','.search',function(){
            var search = $(this).val().toUpperCase();
            var match = elements.filter(function (idx, elem) {
                return $(elem).text().trim().toUpperCase().indexOf(search) >= 0 ? elem : null;
            }).sort();
            var content = $('.custom-data');
            if (match.length == 0) {
                content.html('<div class="col-md-12 text-center"><h6><?php echo translate('No permission found!'); ?></h6></div>');
            }else{
                content.html(match);
            }
        });

        $('.check-all').on('change',function () { 
            if($(this).is(':checked')){
                $.each($(document).find(".permission"), function (i, element) { 
                    $(element).attr('checked',true);
                });
            }
            else{
                $.each($(document).find(".permission"), function (i, element) { 
                    $(element).attr('checked',false);
                });
            }
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\resources\views\admin\role\create.blade.php ENDPATH**/ ?>