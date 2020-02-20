<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo e(getPhrase('payments')); ?></h3>
<?php $currency = getSetting('currency_code','site_settings');

     $billing_country=null; 
     $bcountry=$record->getBillingCountry();
     if (count($bcountry))
      $billing_country = $bcountry->title;

     $billing_state=null; 
     $bstate=$record->getBillingState();
     if (count($bstate))
      $billing_state = $bstate->state;


     $billing_city=null; 
     $bcity=$record->getBillingCity();
     if (count($bcity))
      $billing_city = $bcity->city;


     $shipping_country=null; 
     $scountry=$record->getShippingCountry();
     if (count($scountry))
      $shipping_country = $scountry->title;


     $shipping_state=null; 
     $sstate=$record->getShippingState();
     if (count($sstate))
      $shipping_state = $sstate->state;


     $shipping_city=null; 
     $scity=$record->getShippingCity();
     if (count($scity))
      $shipping_city = $scity->city;
              
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo e($title); ?>

        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">

                        <tr>
                            <th><?php echo e(getPhrase('user')); ?></th>
                            <td> <?php if($record->username): ?> <a href="<?php echo e(URL_USERS_VIEW); ?>/<?php echo e($record->user_slug); ?>"><?php echo e($record->username); ?></a> <?php endif; ?> </td>
                        </tr>
                       

                        <tr>
                            <th><?php echo e(getPhrase('auction')); ?></th>
                            <td> <?php if($auction->title): ?> <a href="<?php echo e(URL_AUCTIONS_VIEW); ?><?php echo e($auction->slug); ?>"><?php echo e($auction->title); ?></a> <?php endif; ?> </td>
                        </tr>

                        <tr>
                          <th> <?php echo e(getPhrase('image')); ?> </th>
                          <td> <?php if($auction): ?> <img src="<?php echo e(getAuctionImage($auction->image)); ?>" alt="<?php echo e($auction->title); ?>" width="50"> <?php endif; ?> </td>
                        </tr>


                        <tr>
                            <th><?php echo e(getPhrase('paid_through')); ?></th>
                            <td> <?php echo e(get_text($record->payment_gateway)); ?> </td>
                        </tr>

                        <tr>
                            <th><?php echo e(getPhrase('payment_for')); ?></th>
                            <td> <?php echo e(get_text($record->payment_for)); ?> </td>
                        </tr>


                        <tr>
                            <th><?php echo e(getPhrase('paid_amount')); ?></th>
                            <td> <?php if($record->paid_amount): ?> <?php echo e($currency); ?><?php echo e($record->paid_amount); ?> <?php endif; ?> </td>
                        </tr>


                        <tr>
                            <th><?php echo e(getPhrase('payment_status')); ?></th>
                            <td> <?php echo e(get_text($record->payment_status)); ?> </td>
                        </tr>

                         <tr>
                            <th><?php echo e(getPhrase('transaction_id')); ?></th>
                            <td> <?php echo e($record->transaction_id); ?> </td>
                        </tr>

                         <tr>
                            <th><?php echo e(getPhrase('billing_name')); ?></th>
                            <td> <?php echo e($record->billing_name); ?> </td>
                        </tr>

                        <tr>
                            <th><?php echo e(getPhrase('billing_email')); ?></th>
                            <td> <?php echo e($record->billing_email); ?> </td>
                        </tr>

                       
                        
                    </table>
                </div>

                 <div class="col-md-6">
                    <table class="table table-bordered table-striped">

                         <tr>
                            <th><?php echo e(getPhrase('billing_phone')); ?></th>
                            <td> <?php echo e($record->billing_phone); ?> </td>
                        </tr>
                       

                        <tr>
                            <th><?php echo e(getPhrase('billing_country')); ?></th>
                            <td> <?php echo e($billing_country); ?> </td>
                        </tr>

                        <tr>
                            <th><?php echo e(getPhrase('billing_state')); ?></th>
                            <td> <?php echo e($billing_state); ?> </td>
                        </tr>

                        <tr>
                            <th><?php echo e(getPhrase('billing_city')); ?></th>
                            <td> <?php echo e($billing_city); ?> </td>
                        </tr>


                         <tr>
                            <th><?php echo e(getPhrase('shipping_name')); ?></th>
                            <td> <?php echo e($record->shipping_name); ?> </td>
                        </tr>

                        <tr>
                            <th><?php echo e(getPhrase('shipping_email')); ?></th>
                            <td> <?php echo e($record->shipping_email); ?> </td>
                        </tr>

                        <tr>
                            <th><?php echo e(getPhrase('shipping_phone')); ?></th>
                            <td> <?php echo e($record->shipping_phone); ?> </td>
                        </tr>

                        <tr>
                            <th><?php echo e(getPhrase('shipping_country')); ?></th>
                            <td> <?php echo e($shipping_country); ?> </td>
                        </tr>

                        <tr>
                            <th><?php echo e(getPhrase('shipping_state')); ?></th>
                            <td> <?php echo e($shipping_state); ?> </td>
                        </tr>

                        <tr>
                            <th><?php echo e(getPhrase('shipping_city')); ?></th>
                            <td> <?php echo e($shipping_city); ?> </td>
                        </tr>

                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="<?php echo e(URL_COUNTRIES); ?>" class="btn btn-default"><?php echo e(getPhrase('back_to_list')); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>