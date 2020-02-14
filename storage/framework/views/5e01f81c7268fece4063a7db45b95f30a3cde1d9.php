<?php $__env->startSection('content'); ?>

<?php echo $__env->make('bidder.leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!--Dashboard section -->


    <div class="col-lg-8 col-md-8 col-sm-12 au-onboard">

       <?php
                $title = $notification->data['title'];
                $url = $notification->data['url'];
                $description='';
                if (isset($notification->data['description']))
                $description = $notification->data['description'];

         ?>

            <a href="<?php echo e(URL_HOME); ?>" class="au-middles justify-content-start"> <?php echo e(getPhrase('home')); ?> &nbsp;<span> / <?php echo e($title); ?> </span></a>

             <div class="row au-left-side">

                 <div class="col-md-12">

                   <div class="panel panel-custom">
                    <div class="panel-heading">
                        <h4><span class="text-left" ><?php echo e($title); ?></span>
                            <span class="pull-right time">@  <?php echo date(getSetting('date_format','site_settings').' H:i:s', strtotime($notification->updated_at));?>  </span>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="notification-details">

                            <div class="notification-content text-center">
                                <?php echo $description; ?>

                            </div>
                            <br>
                            <?php if($url): ?>
                            <div class="notification-footer text-center">
                                <a href="<?php echo e($url); ?>" class="btn btn-primary login-bttn"><?php echo e(getPhrase('read_more')); ?></a>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                </div>




              </div>

            </div>

              </div>
      </div>
    </section>
    <!--Dashboard section-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>