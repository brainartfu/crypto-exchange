

<?php $__env->startSection('title'); ?>
   <?php echo translate('Edit Language'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
 <section class="section">
    <div class="section-header justify-content-between">
        <h1><?php echo translate('Edit Language'); ?></h1>
        <a href="<?php echo e(route('admin.language.index')); ?>" class="btn btn-primary"> <i class="fas fa-backward"></i> <?php echo translate('Back'); ?></a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
   <div class="col-lg-12">
      <div class="card mb-4">
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Edit Language Form')); ?></h6>
         </div>
         <div class="card-body">
            <form  action="<?php echo e(route('admin.language.update',$language->id)); ?>" method="POST" enctype="multipart/form-data">
               <?php echo csrf_field(); ?>
               <?php echo method_field('PUT'); ?>
               <div class="row">
                  <div class="form-group col-md-6">
                     <label for="inp-name"><?php echo e(__('Name')); ?></label>
                     <input type="text" class="form-control" id="inp-name" name="name" value="<?php echo e($language->language); ?>"  placeholder="<?php echo e(__('Enter Name')); ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inp-name"><?php echo e(__('Code')); ?></label>
                     <input type="text" class="form-control" id="inp-name"  value="<?php echo e($language->code); ?>"  placeholder="<?php echo e(__('Enter Code')); ?>" disabled>
                 </div> 
               </div>
              
               <div class="mt-3 text-right">
                  <button type="submit" id="submit-btn" class="btn btn-primary btn-lg"><?php echo e(__('Submit')); ?></button>
               </div>
            </form>
         </div>
      </div>
      
   </div>
   <div class="col-md-12">
    <div class="card">
        <div class="card-header justify-content-between">
            <div class="form-group mb-0">
                <input class="form-control search mb-1" type="text" placeholder="<?php echo translate('Search'); ?>">
            </div>

            <a href="javascript:void(0)" data-toggle="modal" data-target="#translate" class="btn btn-primary add"> <i class="fas fa-plus"></i> <?php echo translate('Add New'); ?>
                </a>
         
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="bg-primary mb-2">
                        <tr>
                            <th class="text-white"><?php echo translate('Sl'); ?></th>
                            <th class="text-white"><?php echo translate('Key'); ?></th>
                            <th class="text-white"><?php echo translate('Value'); ?></th>
                            <th class="text-right text-white"><?php echo translate('Action'); ?></th>
                        </tr>
                    </thead>
                    <tbody class="custom-data">
                        <?php
                            $i = 0;
                        ?>
                      <?php $__empty_1 = true; $__currentLoopData = $lang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="elements">
                             <td data-label="<?php echo translate('Sl'); ?>">
                               <?php echo e(++$i); ?>

                             </td>
                             <td data-label="<?php echo translate('Key'); ?>" data-toggle="tooltip" title="<?php echo e($key); ?>">
                               <?php echo e(Str::limit($key,60)); ?>

                             </td>
                             <td data-label="<?php echo translate('Value'); ?>" data-toggle="tooltip" title="<?php echo e($value); ?>"><?php echo e(Str::limit($value,40)); ?></td>
                             <td data-label="<?php echo translate('Action'); ?>" class="text-right">
                                 <a class="btn btn-primary btn-sm edit m-1" data-key="<?php echo e($key); ?>" data-value="<?php echo e($value); ?>" data-route="<?php echo e(route('admin.translate.update',$language->id)); ?>" href="javascript:void(0)"><i class="fas fa-edit"></i></a>

                                 <a class="btn btn-danger btn-sm remove m-1" data-key="<?php echo e($key); ?>" data-value="<?php echo e($value); ?>" data-route="<?php echo e(route('admin.translate.remove',$language->id)); ?>" href="javascript:void(0)"><i class="fas fa-trash"></i></a>
                             </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
   
                           <tr>
                               <td class="text-center" colspan="100%"><?php echo translate('No Data Found'); ?></td>
                           </tr>
   
                       <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="translate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?php echo e(route('admin.translate.store',$language->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo translate('Add New Translation'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                   <div class="form-group">
                       <label ><?php echo translate('Key'); ?></label>
                       <input class="form-control" type="text" name="key" required value="<?php echo e(old('key')); ?>">
                   </div>
                   <div class="form-group">
                       <label ><?php echo translate('Value'); ?></label>
                       <textarea class="form-control" name="value" required><?php echo e(old('value')); ?></textarea>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo translate('Close'); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo translate('Save'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>



<div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?php echo e(route('admin.translate.remove')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="language" value="<?php echo e($language->id); ?>">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="mt-3"><?php echo translate('Are you sure to remove?'); ?></h5>
                    <input type="hidden" name="key" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo translate('Close'); ?></button>
                    <button type="submit" class="btn btn-danger"><?php echo translate('Confirm'); ?></button>
                </div>
            </div>
        </form>
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
                    content.html('<tr><td colspan="100%" class="text-center"><?php echo translate('Data Not Found'); ?></td></tr>');
                }else{
                    content.html(match);
                }
            });

            $(document).on('click','.edit',function () { 
                const modal = $('#translate')
                modal.find('.modal-title').text('<?php echo translate('Edit Translation'); ?>')
                modal.find('input[name=key]').val($(this).data('key'))
                modal.find('textarea[name=value]').val($(this).data('value'))
                modal.find('form').attr('action',$(this).data('route'))
                modal.modal('show')
            })

            $(document).on('click','.remove',function () { 
                const modal = $('#remove')
                modal.find('input[name=key]').val($(this).data('key'))
                modal.modal('show')
            })
            $('.add').on('click',function () { 
                $('#translate').find('form')[0].reset();
                $('#translate').find('.modal-title').text('<?php echo translate('Add New Translation'); ?>')
            })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\resources\views\admin\language\edit.blade.php ENDPATH**/ ?>