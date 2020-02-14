<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo e(getPhrase('countries')); ?></h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo e($title); ?>

        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">

                        <tr>
                            <th><?php echo e(getPhrase('country_name')); ?></th>
                            <td field-key='title'><?php echo e($country->title); ?></td>
                        </tr>
                       

                        <tr>
                            <th><?php echo e(getPhrase('short_code')); ?></th>
                            <td field-key='shortcode'><?php echo e($country->shortcode); ?></td>
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