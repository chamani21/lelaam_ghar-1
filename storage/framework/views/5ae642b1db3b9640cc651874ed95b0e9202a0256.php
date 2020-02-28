<?php $__env->startSection('header_scripts'); ?>
<link href="<?php echo e(CSS); ?>checkbox.css" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php 
$currency_code = getSetting('currency_code','site_settings');

$payu   = getSetting('payu','module');
$paypal = getSetting('paypal','module');
$stripe = getSetting('stripe','module');


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
                      <th width="120"> <?php echo e(getPhrase('title')); ?> </th>
                      <td><?php echo e($record->title); ?></td>
                  </tr>

                   <tr>
                      <th> <?php echo e(getPhrase('image')); ?> </th>
                      <td> <img src="<?php echo e(getAuctionImage($record->image)); ?>" alt="<?php echo e($record->title); ?>" width="50">  </td>
                  </tr>


                  <tr>
                      <th> <?php echo e(getPhrase('category')); ?>  </th>
                      <td> <?php if($record->category): ?> <?php echo e($record->category->category); ?> <?php endif; ?></td>
                  </tr>


                  <tr>
                      <th> <?php echo e(getPhrase('sub_category')); ?>  </th>
                      <td> <?php if($record->sub_category): ?> <?php echo e($record->sub_category->sub_category); ?> <?php endif; ?> </td>
                  </tr>


                   <tr>
                        <th> <?php echo e(getPhrase('seller')); ?>  </th>
                        <td> <?php echo e($user->getUserTitle()); ?> </td>
                    </tr>


                    <tr>
                        <th> <?php echo e(getPhrase('start_date')); ?>  </th>
                        <td> <?php echo e($record->start_date); ?> </td>
                    </tr>

                    <tr>
                        <th> <?php echo e(getPhrase('end_date')); ?>  </th>
                        <td> <?php echo e($record->end_date); ?> </td>
                    </tr>


                    <tr>
                        <th> <?php echo e(getPhrase('reserve_price')); ?>  </th>
                        <td> <?php echo e($currency_code); ?><?php echo e($record->reserve_price); ?> </td>
                    </tr>


                     <tr>
                          <th> <?php echo e(getPhrase('amount')); ?> </th>
                          <td> <?php echo e($currency_code); ?><?php echo e($record->buy_now_price); ?></td>
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
                 $bcountry=$user->getBillingCountry();
                 if (($bcountry))
                  $billing_country = $bcountry->title;

                 $billing_state=null; 
                 $bstate=$user->getBillingState();
                 if (($bstate))
                  $billing_state = $bstate->state;


                 $billing_city=null; 
                 $bcity=$user->getBillingCity();
                 if (($bcity))
                  $billing_city = $bcity->city;


                 $shipping_country=null; 
                 $scountry=$user->getShippingCountry();
                 if (($scountry))
                  $shipping_country = $scountry->title;


                 $shipping_state=null; 
                 $sstate=$user->getShippingState();
                 if (($sstate))
                  $shipping_state = $sstate->state;


                 $shipping_city=null; 
                 $scity=$user->getShippingCity();
                 if (($scity))
                  $shipping_city = $scity->city;

                 ?>

                 <div class="card payment-page">
                  
                  <div class="card-body">
                    <h5 class="box-head"><?php echo e(getPhrase('billing_details')); ?></h5>

                    <p class="card-text"><?php echo e($user->billing_name); ?></p>
                    <p class="card-text"><?php echo e($user->billing_email); ?></p>
                    <p class="card-text"><?php echo e($user->billing_phone); ?></p>
                    <p class="card-text"><?php echo e($user->billing_address); ?></p>
                    <p class="card-text"> <?php echo e($billing_city); ?>,<?php echo e($billing_state); ?>,<?php echo e($billing_country); ?></p>
                    
                  </div>
                </div>


                 <div class="card payment-page">
                  
                  <div class="card-body">
                    <h5 class="box-head"><?php echo e(getPhrase('shipping_details')); ?></h5>

                    <p class="card-text"><?php echo e($user->shipping_name); ?></p>
                    <p class="card-text"><?php echo e($user->shipping_email); ?></p>
                    <p class="card-text"><?php echo e($user->shipping_phone); ?></p>
                    <p class="card-text"><?php echo e($user->shipping_address); ?></p>
                    <p class="card-text"> <?php echo e($shipping_city); ?>,<?php echo e($shipping_state); ?>,<?php echo e($shipping_country); ?></p>
                    
                  </div>
                </div>

                  </div>
                </div>



                <div class="box-card">
                <h4 class="box-head"><?php echo e(getPhrase('choose_payment')); ?></h4>

                 <div class="row">

                      <?php if($paypal && $paypal_record->count()): ?>
                       <div class="col-lg-3">  

                       <?php echo Form::open(array('url' => URL_PAYNOW, 'method' => 'POST','name'=>'paypalFormValidate','novalidate'=>'','class'=>'form-inline')); ?>


                       
                       <input type="hidden" name="auction_id" value="<?php echo e($record->id); ?>">
                       <input type="hidden" name="payment_for" value="<?php echo e(PAYMENT_FOR_BUY_AUCTION); ?>">
                       <input type="hidden" name="auction_price" value="<?php echo e($record->buy_now_price); ?>">
                       <input type="hidden" name="payment_gateway" value="paypal">


                        <button class="btn btn-info btn-paypal login-bttn" ng-disabled='!paypalFormValidate.$valid'><?php echo e(getPhrase('paypal')); ?></button>
                      
                        <?php echo Form::close(); ?>


                        </div>
                      <?php endif; ?>



                       <?php if($payu && $payu_record->count()): ?>
                       <div class="col-lg-3">  

                    
                        <?php echo Form::open(array('url' => URL_PAYNOW, 'method' => 'POST','name'=>'payuFormValidate','novalidate'=>'','class'=>'form-inline')); ?>

                          
                        <input type="hidden" name="auction_id" value="<?php echo e($record->id); ?>">
                        <input type="hidden" name="payment_for" value="<?php echo e(PAYMENT_FOR_BUY_AUCTION); ?>">
                        <input type="hidden" name="auction_price" value="<?php echo e($record->buy_now_price); ?>">
                        <input type="hidden" name="payment_gateway" value="payu">

                        <button class="btn btn-info btn-payu login-bttn" ng-disabled='!payuFormValidate.$valid'><?php echo e(getPhrase('payu')); ?></button>
                      
                        <?php echo Form::close(); ?>


                        </div>
                      <?php endif; ?>


                      <?php if($stripe && $stripe_record->count()): ?>
                      <div class="col-lg-4">

                      <form action="<?php echo e(URL_STRIPE_PAYMENT); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>


                        <input type="hidden" name="auction_id" value="<?php echo e($record->id); ?>">
                        <input type="hidden" name="payment_for" value="<?php echo e(PAYMENT_FOR_BUY_AUCTION); ?>">
                        <input type="hidden" name="auction_price" value="<?php echo e($record->buy_now_price); ?>">
                        <input type="hidden" name="payment_gateway" value="stripe">

                        <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="<?php echo e(env('STRIPE_KEY')); ?>"
                                data-amount="<?php echo e($record->buy_now_price*100); ?>"
                                data-name="<?php echo e(getSetting('site_title','site_settings')); ?>"
                                data-description="Buy Auction"
                                data-locale="auto"
                                data-currency="USD"
                                data-label="Stripe">
                        </script>
                       </form>

                      </div>

                      <!-- <div class="col-lg-3"> 
                        <?php echo Form::open(array('url' => URL_STRIPE_PAYMENT, 'method' => 'POST','name'=>'stripeFormValidate','novalidate'=>'','class'=>'form-inline')); ?>


                        <input type="hidden" name="auction_id" value="<?php echo e($record->id); ?>">
                        <input type="hidden" name="payment_for" value="<?php echo e(PAYMENT_FOR_BUY_AUCTION); ?>">
                        <input type="hidden" name="auction_price" value="<?php echo e($record->buy_now_price); ?>">
                        <input type="hidden" name="payment_gateway" value="stripe">
                       

                       <input type="hidden" name="stripeToken" value="pk_test_Z8QCoRT9K8x0F1IrgFg7rh4b"> 

                        <button class="btn btn-info btn-stripe" ng-disabled='!stripeFormValidate.$valid'><?php echo e(getPhrase('stripe')); ?></button>
                      
                        <?php echo Form::close(); ?>

                      </div> -->

                      <?php endif; ?>



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