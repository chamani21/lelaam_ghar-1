<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <a href="<?php echo e(URL_HOME); ?>" class="au-middles justify-content-start"> <?php echo e(getPhrase('home')); ?> &nbsp;<span> / <?php echo e(getPhrase('Verification')); ?> </span></a>
        <div class="jumbotron">
            <h2 class="text-center h2 mb-5">
                Mobile Verification
                <i class="fa fa-mobile-phone"></i>
            </h2>
            
                <?php echo Form::open(array('url' => 'phone/verify', 'method' => 'POST', 'novalidate'=>'', 'class'=>"form-horizontal", 'name'=>"verificationForm",'id'=>'login-form', 'style'=>'display:block')); ?>

                <input name="id" type="hidden" value="<?php echo e($id); ?>">
                <div class="form-row">
                    <div class="col-md-6 offset-md-3">
                        <label for="">Verification Code</label>
                        <input type="text" placeholder="Enter 6-Digit Verification Code" name="code" class="form-control" minlength="6" maxlength="6" required>
                        
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col-md-6 offset-md-3">
                        <button class="btn btn-success" type="submit">
                            Verify Phone Number
                        </button>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>