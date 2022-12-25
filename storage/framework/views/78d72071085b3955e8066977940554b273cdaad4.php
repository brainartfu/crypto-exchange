
<?php if(in_array($gateway->keyword,['stripe','authorize'])): ?>
<div class="card border-0 mt-5">
    <div class="card-header">
        <h4><?php echo translate('Card Information'); ?></h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <input type="text" name="card_number" class="form-control" placeholder="<?php echo translate('Card Number'); ?>">
            </div>
            <div class="col-4">
                <input type="text" name="cvc" class="form-control" placeholder="<?php echo translate('CVC'); ?>">
            </div>
            <div class="col-2">
                <input type="text" name="month" class="form-control" placeholder="<?php echo translate('Month'); ?>">
            </div>
            <div class="col-2">
                <input type="text" name="year" class="form-control" placeholder="<?php echo translate('Year'); ?>">
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php if($gateway->keyword == 'paystack'): ?>
    <input type="hidden" id="ref_id" name="ref_id" value="">
<?php endif; ?>


<?php if($gateway->keyword == 'mercadopago'): ?>
<div class="row mt-3">
    <div class="col-lg-6 mb-2">
      <input class="form-control" type="text" placeholder="<?php echo e(__('Credit Card Number')); ?>" id="cardNumber" data-checkout="cardNumber" onselectstart="return false" autocomplete=off required />
    </div>

    <div class="col-lg-6 mb-2">
      <input class="form-control" type="text" id="securityCode" data-checkout="securityCode" placeholder="<?php echo e(__('Security Code')); ?>" onselectstart="return false" autocomplete=off required />
    </div>

    <div class="col-lg-6 mb-2">
      <input class="form-control" type="text" id="cardExpirationMonth" data-checkout="cardExpirationMonth" placeholder="<?php echo e(__('Expiration Month')); ?>" autocomplete=off required />
    </div>

    <div class="col-lg-6 mb-2">
    <input class="form-control" type="text" id="cardExpirationYear" data-checkout="cardExpirationYear" placeholder="<?php echo e(__('Expiration Year')); ?>" autocomplete=off required />
    </div>

    <div class="col-lg-6 mb-2">
      <input class="form-control" type="text" id="cardholderName" data-checkout="cardholderName" placeholder="<?php echo e(__('Card Holder Name')); ?>" required />
    </div>

    <div class="col-lg-6">
      <label for="docType" class="col-lg-3 pl-0" id="dc-label"><?php echo e(__('Document type')); ?></label>
        <select class="form-control col-lg-9 pl-0" id="docType" data-checkout="docType" required>
          
        </select>
    </div>

    <div class="col-lg-6">
      <input class="form-control" type="text" id="docNumber" data-checkout="docNumber" placeholder="<?php echo e(__('Document Number')); ?>" required />
    </div>

  </div>


  <input type="hidden" id="installments" value="1" />
  <input type="hidden" name="amount" id="amount" />
  <input type="hidden" name="description" />
  <input type="hidden" name="paymentMethodId" />
<?php endif; ?>

<?php if($gateway->type == 'manual'): ?>
<div class="row mt-3">
  <div class="form-group col-lg-12">
    <h3><?php echo translate('Deposit Instruction'); ?></h3>
    <p>
      <?php
          echo $gateway->details;
      ?>
    </p>
  </div>

  <div class="form-group col-lg-12">
    <label class="my-3"><?php echo translate('Please provide your transaction details'); ?></label>
    <textarea name="trx_details" class="form-control" id="" cols="30" rows="10"></textarea>
  </div>
  <input type="hidden" name="type"  value="manual">

</div>
<?php endif; ?><?php /**PATH C:\xampp1\htdocs\resources\views\other\payment_load.blade.php ENDPATH**/ ?>