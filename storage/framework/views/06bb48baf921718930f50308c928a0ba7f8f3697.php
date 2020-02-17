<?php $__env->startSection('content'); ?>
<?php 
$currency_code = getSetting('currency_code','site_settings');
?>



 <!--CATEGORY BODY SECTION-->
    
     <section class="au-categorys">

      <div class="container">


          <div class="row"> 


            <div class="col-lg-6">

              <div class="box-card">

              <div class="table-responsive">

                <table class="table table-striped">

                  <tr>
                      <th width="120"><?php echo e(getPhrase('auction')); ?></th>
                      <td><?php if($auction): ?> <?php echo e($auction->title); ?> <?php endif; ?></td>
                  </tr>

                   <tr>
                      <th> <?php echo e(getPhrase('image')); ?> </th>
                      <td> <?php if($auction): ?> <img src="<?php echo e(getAuctionImage($auction->image)); ?>" alt="<?php echo e($auction->title); ?>" width="50"> <?php endif; ?> </td>
                  </tr>


                  <tr>
                      <th> <?php echo e(getPhrase('category')); ?>  </th>
                      <td> <?php if($auction->category): ?> <?php echo e($auction->category->category); ?> <?php endif; ?> </td>
                  </tr>


                  <tr>
                      <th> <?php echo e(getPhrase('sub_category')); ?>  </th>
                      <td> <?php if($auction->sub_category): ?> <?php echo e($auction->sub_category->sub_category); ?> <?php endif; ?> </td>
                  </tr>

                  <tr>
                      <th><?php echo e(getPhrase('paid_through')); ?></th>
                      <td><?php echo e(get_text($record->payment_gateway)); ?></td>
                  </tr>

                  <tr>
                      <th><?php echo e(getPhrase('payment_for')); ?></th>
                      <td><?php echo e(get_text($record->payment_for)); ?></td>
                  </tr>


                  <tr>
                      <th> <?php echo e(getPhrase('paid_amount')); ?> </th>
                      <td> <?php if($record->paid_amount): ?> <?php echo e($currency_code); ?><?php echo e($record->paid_amount); ?> <?php endif; ?></td>
                  </tr>


                  <tr>
                      <th><?php echo e(getPhrase('payment_status')); ?></th>
                      <td><?php echo e(get_text($record->payment_status)); ?></td>
                  </tr>


                  <tr>
                      <th><?php echo e(getPhrase('transaction_id')); ?></th>
                      <td><?php echo e($record->transaction_id); ?></td>
                  </tr>

                </table>

              </div>
            </div>
             </div>



            <div class="col-lg-6">

             
                <div class="row">
                  <div class="col-sm-12">

                 <?php
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

                 <div class="card payment-page">
                  
                  <div class="card-body">
                     <h5 class="box-head"><?php echo e(getPhrase('billing_details')); ?></h5>

                    <p class="card-text"><?php echo e($record->billing_name); ?></p>
                    <p class="card-text"><?php echo e($record->billing_email); ?></p>
                    <p class="card-text"><?php echo e($record->billing_phone); ?></p>
                    <p class="card-text"><?php echo e($record->billing_address); ?></p>
                    <p class="card-text"> <?php echo e($billing_city); ?> <?php echo e($billing_state); ?> <?php echo e($billing_country); ?></p>
                    
                  </div>
                </div>

              

                 <div class="card payment-page">
                  
                  <div class="card-body">
                    <h5 class="box-head"><?php echo e(getPhrase('shipping_details')); ?></h5>

                    <p class="card-text"><?php echo e($record->shipping_name); ?></p>
                    <p class="card-text"><?php echo e($record->shipping_email); ?></p>
                    <p class="card-text"><?php echo e($record->shipping_phone); ?></p>
                    <p class="card-text"><?php echo e($record->shipping_address); ?></p>
                    <p class="card-text"> <?php echo e($shipping_city); ?> <?php echo e($shipping_state); ?> <?php echo e($shipping_country); ?></p>
                    
                  </div>
                </div>


            </div>

          </div>

        </div>

        </div>

      </div>

    <!--SAME CATEGORY AUCTIONS SECTION-->
    <?php echo $__env->make('home.pages.auctions.category-auctions', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <!--SAME CATEGORY AUCTIONS SECTION-->


    <!--SELLER AUCTIONS SECTION-->
    <?php echo $__env->make('home.pages.auctions.seller-auctions', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <!--SELLER AUCTIONS SECTION-->



<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

<?php echo $__env->make('common.validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('common.alertify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('home.pages.auctions.auctions-js-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>