

<?php $__env->startSection('title'); ?>
   <?php echo translate('Mechant Details'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
 <section class="section">
    <div class="section-header justify-content-between">
        <h1><?php echo translate('Mechant Details'); ?></h1>
        <a href="<?php echo e(route('admin.merchant.index')); ?>" class="btn btn-primary"><i class="fas fa-backward"></i> <?php echo translate('Back'); ?></a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xxl-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h6><?php echo translate('Mechant Wallets'); ?></h6>
                    <hr>
                    <div class="row justify-content-center">
                        <?php $__empty_1 = true; $__currentLoopData = $user->wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-md-4">
                            <a href="javascript:void(0)" class="wallet" data-code="<?php echo e($item->currency->code); ?>" data-id="<?php echo e($item->id); ?>" data-toggle="tooltip" title="<?php echo translate('Click to Add or Subtract Balance'); ?>">
                                <div class="card card-statistic-1 bg-sec">
                                    <div class="card-icon bg-primary text-white">
                                        <?php echo e($item->currency->code); ?>

                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header ">
                                            <h4 class="text-dark"><?php echo app('translator')->get($item->currency->curr_name); ?></h4>
                                        </div>
                                        <div class="card-body">
                                            <?php echo e(amount($item->balance,$item->currency->type,3)); ?> <?php echo e($item->currency->code); ?>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p><?php echo translate('No wallet found'); ?></p>
                      <?php endif; ?>
                    </div>

                    <h6 class="mt-3"><?php echo translate('Merchant details'); ?></h6>
                    <hr>
                    <form action="<?php echo e(route('admin.merchant.profile.update',$user->id)); ?>" method="POST" class="row">
                        <?php echo csrf_field(); ?>
                        <?php if($user->api): ?>
                        <div class="form-group col-md-12">
                            <label><?php echo translate('Access Key'); ?></label>
                            <input class="form-control" type="text" value="<?php echo e($user->api->access_key); ?>" disabled>
                        </div>
                        <?php endif; ?>
                        <div class="form-group col-md-6">
                            <label><?php echo translate('Name'); ?></label>
                            <input class="form-control" type="text" name="name" value="<?php echo e($user->name); ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label><?php echo translate('Email'); ?></label>
                            <input class="form-control" type="email" name="email" value="<?php echo e($user->email); ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label><?php echo translate('Phone'); ?></label>
                            <input class="form-control" type="text" name="phone" value="<?php echo e($user->phone); ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label><?php echo translate('Country'); ?></label>
                            <Select class="form-control js-example-basic-single" name="country" required>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->name); ?>" <?php echo e($user->country == $item->name ? 'selected':''); ?>><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </Select>
                        </div>
                        <div class="form-group col-md-6">
                            <label><?php echo translate('City'); ?></label>
                            <input class="form-control" type="text" name="city" value="<?php echo e($user->city); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label><?php echo translate('Zip'); ?></label>
                            <input class="form-control" type="text" name="zip" value="<?php echo e($user->zip); ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label><?php echo translate('Address'); ?></label>
                            <input class="form-control" type="text" name="address" value="<?php echo e($user->address); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="cswitch d-flex justify-content-between align-items-center border p-2">
                                <input class="cswitch--input" name="status" type="checkbox" <?php echo e($user->status == 1 ? 'checked':''); ?> /><span class="cswitch--trigger wrapper"></span>
                                <span class="cswitch--label font-weight-bold"><?php echo translate('User status'); ?></span>
                            </label>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label class="cswitch d-flex justify-content-between align-items-center border p-2">
                                <input class="cswitch--input update" name="email_verified" type="checkbox" <?php echo e($user->email_verified == 1 ? 'checked':''); ?> /><span class="cswitch--trigger wrapper"></span>
                                <span class="cswitch--label font-weight-bold"><?php echo translate('Email Verified'); ?></span>
                            </label>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label class="cswitch d-flex justify-content-between align-items-center border p-2">
                                <input class="cswitch--input update" name="kyc_status" type="checkbox" <?php echo e($user->kyc_status == 1 ? 'checked':''); ?> /><span class="cswitch--trigger wrapper"></span>
                                <span class="cswitch--label font-weight-bold"><?php echo translate('KYC Verified'); ?></span>
                            </label>
                        </div>
                        <?php if(access('update merchant')): ?>
                        <div class="form-group col-md-12 text-right">
                           <button type="submit" class="btn btn-primary btn-lg"><?php echo translate('Submit'); ?></button>
                        </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-lg-6 col-md-8">
            <div class="card">
                <div class="card-body">
                        <label class="font-weight-bold"><?php echo translate('Profile Picture'); ?></label>
                        <div id="image-preview" class="image-preview u_details w-100"
                        style="background-image:url(<?php echo e(getPhoto($user->photo)); ?>);">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item active"><h5><?php echo translate('Information'); ?></h5></li>
                        <li class="list-group-item d-flex justify-content-between"><?php echo translate('Total Withdraw'); ?> <span><?php echo e($gs->curr_sym); ?><?php echo e($totalWithdraw); ?></span></li>
                        <?php if(access('merchant login')): ?>
                        <li class="list-group-item d-flex justify-content-between"><?php echo translate('Login to Merchant'); ?> <span><a target="_blank" href="<?php echo e(route('admin.merchant.login',$user->id)); ?>" class="btn btn-dark"><?php echo translate('Login'); ?></a></span></li>
                        <?php endif; ?>
                        <li class="list-group-item d-flex justify-content-between"><?php echo translate('Merchant Login Info'); ?> <span><a href="<?php echo e(route('admin.merchant.login.info',$user->id)); ?>" class="btn btn-dark"><?php echo translate('View'); ?></a></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <?php if(access('merchant balance modify')): ?>
    <div class="modal fade" id="balanceModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?php echo e(route('admin.merchant.balance.modify')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="wallet_id">
                <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo translate('Add/Subract Balance -- '); ?> <span class="code"></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                       <div class="form-group">
                           <label><?php echo translate('Amount'); ?></label>
                           <input class="form-control" type="text" name="amount" required>
                       </div>
                       <div class="form-group">
                           <label><?php echo translate('Type'); ?></label>
                          <select name="type" id="" class="form-control">
                              <option value="1"><?php echo translate('Add Balance'); ?></option>
                              <option value="2"><?php echo translate('Subtract Balance'); ?></option>
                          </select>
                       </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo translate('Close'); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo translate('Confirm'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        'use strict';
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "<?php echo translate('Choose File'); ?>", // Default: Choose File
            label_selected: "<?php echo translate('Update Image'); ?>", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $('.wallet').on('click',function () { 
            $('#balanceModal').find('input[name=wallet_id]').val($(this).data('id'))
            $('#balanceModal').find('.code').text($(this).data('code'))
            $('#balanceModal').modal('show')
        })
        $(document).ready(function() {
           $('.js-example-basic-single').select2();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .bg-sec{
            background-color: #cdd3d83c
        }
        .u_details{
            height: 370px!important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\resources\views\admin\merchant\details.blade.php ENDPATH**/ ?>