<?php $__env->startSection('content'); ?>
    <h3 class="page-title"> <?php echo e(getPhrase('notifications')); ?> </h3>

    <div class="panel panel-default">
        <div class="panel-heading">
           <?php echo e(getPhrase('view')); ?>

        </div>

        <?php 
                $title = $notification->data['title'];
                $url = $notification->data['url'];
                $description='';
                if (isset($notification->data['description']))
                $description = $notification->data['description'];
                
         ?>


        <div class="panel-body">
            <div class="row">

                <div class="col-md-6">

                   <div class="panel panel-custom">
                    <div class="panel-heading">
                        <h4><span class="text-left" ><?php echo e($title); ?></span> 
                            <span class="pull-right">@ <?php echo date(getSetting('date_format','site_settings').' H:i:s', strtotime($notification->updated_at));?></span>
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
                                <a type="button" href="<?php echo e($url); ?>" class="btn btn-info button"><?php echo e(getPhrase('read_more')); ?></a>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                </div>


            </div>



            <p>&nbsp;</p>

            <a href="<?php echo e(URL_USER_NOTIFICATIONS); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('global.app_back_to_list'); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>