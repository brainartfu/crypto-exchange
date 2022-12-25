

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get(@$page->title ?? 'About'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  
   <div class="dashboard--content-item">
        
        <div class="profile--card">
            <div class="user--profile mb-5">
                <div class="thumb">
                    <img src="<?php echo e(getPhoto($user->photo)); ?>" alt="clients">
                </div>
                <div class="remove-thumb">
                    <i class="fas fa-times"></i>
                </div>
                <div class="content">
                    <div>
                        <h3 class="title">
                            <?php echo e($user->name); ?>

                        </h3>
                        <!--<a href="#0" class="text--base">-->
                        <!--   <?php echo e($user->email); ?>-->
                        <!--</a>-->
                        <p><span class="m-0"><?php echo translate('Total Completed Trade : '); ?> <?php echo e($user->completedTrade()); ?></span></p>
                    </div>
                    <br />
                    <ul class="user-info-list">
                           
                            <?php if($user->kyc_status == 1): ?>
                                <li>
                                    <?php echo translate('KYC verified'); ?>
                                </li>
                            <?php else: ?>
                                <li class="no">
                                    <?php echo translate('KYC not verified'); ?>
                                </li>
                                 
                            <?php endif; ?>
                            <?php if($user->email_verified == 1): ?>
                                <li>
                                    <?php echo translate('Email verified'); ?>
                                </li>
                            <?php else: ?>
                                <li class="no">
                                    <?php echo translate('Email not verified'); ?>
                                </li>
                                 
                            <?php endif; ?>
                            <?php if($user->phone_verified == 1): ?>
                                <li>
                                    <?php echo translate('Phone verified'); ?>
                                </li>
                            <?php else: ?>
                                <li class="no">
                                    <?php echo translate('Phone not verified'); ?>
                                </li>
                                 
                            <?php endif; ?>
                        </ul>
                </div>
            </div>
         <div class="col-lg-12">
                <div class="about-offer">
                    <h4 class="title mb-3 pt-3">Reviews</h4>
                     
                    <div class="about-offer-area border rounded">
                        <?php if(count($reviews)>0): ?>
                        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="cmn--media ms-0">
                            <img src="<?php echo e(getPhoto($review->reviewer->photo)); ?>" alt="clients">
                            <div class="subtitle" style="width: 90%;">
                                <h5 class="m-0"><?php echo e($review->reviewer->name); ?></h5>
                                <span class="m-0"> <?php echo str_repeat('<span><i class="fa fa-star" style="color: gold;"></i></span>', $review->rating); ?> </span>
                            </div>
                            <div>
                                <br />
                                <p><?php echo e($review->description); ?></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <p>No Reviews.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>  
                
                
                </div>
            </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\resources\views\frontend\profile.blade.php ENDPATH**/ ?>