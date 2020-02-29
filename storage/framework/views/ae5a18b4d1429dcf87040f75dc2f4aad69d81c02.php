<?php $__env->startSection('content'); ?>


<!---LOGIN TABS-->


<div class="container">
<?php 
$fb_login = getSetting('facebook_login','module');
$google_login = getSetting('google_plus_login','module');

?>
      <div class="row">
      <div class="col-lg-6 lg-offset-3 mx-auto col-md-12">
        <div class="panel panel-login">

          <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>
                <a href="#" class="active" id="login-form-link"><?php echo e(getPhrase('login')); ?></a>
                  </h4> </div>
                        <div class="col-md-6">
                            <h4>
                <a href="#" id="register-form-link"><?php echo e(getPhrase('register')); ?></a>
                </h4> </div>
                    </div>
                     </div>

          <div class="panel-body form-auth-style">



                <!--form id="login-form" action="https://phpoll.com/login/process" method="post" role="form" style="display: block;"-->

                   <?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                   <?php echo Form::open(array('url' => URL_USERS_LOGIN, 'method' => 'POST', 'novalidate'=>'', 'class'=>"form-horizontal", 'name'=>"loginForm",'id'=>'login-form', 'style'=>'display:block')); ?>

  <div class="row">
                   <div class="form-group col-lg-12">


                            <?php echo e(Form::text('email', $value = null , $attributes = array('class'=>'form-control',

                                'ng-model'=>'email',

                                'required'=> 'true',

                                'id'=> 'lg_email',

                                'placeholder' => getPhrase('username').'/'.getPhrase('email'),

                                'ng-class'=>'{"has-error": loginForm.email.$touched && loginForm.email.$invalid}',

                            ))); ?>



                        <div class="validation-error" ng-messages="loginForm.email.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('email'); ?>


                        </div>

                    </div>






                    <div class="form-group col-lg-12">



                                   <?php echo e(Form::password('password', $attributes = array('class'=>'form-control instruction-call',

                                        'placeholder' => getPhrase("password"),

                                        'ng-model'=>'registration.password',

                                        'required'=> 'true',

                                        'id'=> 'lg_password',

                                        'ng-class'=>'{"has-error": loginForm.password.$touched && loginForm.password.$invalid}',

                                        'ng-minlength' => 5

                                    ))); ?>


                             <div class="validation-error" ng-messages="loginForm.password.$error" >

                                <?php echo getValidationMessage(); ?>


                                <?php echo getValidationMessage('password'); ?>


                            </div>

                    </div>




                  <div class="form-group col-lg-12">
                    <div class="text-center  login-btn">
                       <button type="submit"
                                    class="btn btn-primary login-bttn"
                                    style="margin-right: 15px;" ng-disabled='!loginForm.$valid'>
                                <?php echo e(getPhrase('login')); ?>

                            </button>
                    </div>
                    <hr>
                  </div>



                  <div class="form-group col-lg-6 col-sm-6 col-xs-6">



                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal"> <?php echo e(getPhrase('forgot_password')); ?> ? </a>



                  </div>



                   <div class="form-group col-lg-6 col-sm-6 col-xs-6">
                      <div class="text-right login-icons">


                           <?php if($google_login): ?>
                            <a href="<?php echo e(route('auth.login.social', 'google')); ?>" class="btn btn-primary login-bttn" data-toggle="tooltip" title="Google Login Only For Bidder">
                                <i class="fab fa-google"></i>
                            </a>
                            <?php endif; ?>

                            <?php if($fb_login): ?>
                            <a href="<?php echo e(route('auth.login.social', 'facebook')); ?>" class="btn btn-primary login-bttn" data-toggle="tooltip" title="Facebook Login Only For Bidder">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <?php endif; ?>


                      </div>

                      
                  </div>

                    <div class="row col-lg-12">
                      <p class="alert alert-info">
                          Social Logins only for Bidder
                      </p>
                    </div>
                 

                  
              </div>

                <?php echo Form::close(); ?>





                <!--form id="register-form" action="https://phpoll.com/register/process" method="post" role="form" style="display: none;"-->

                 <?php echo Form::open(array('url' => URL_USERS_REGISTER, 'method' => 'POST', 'novalidate'=>'', 'class'=>"form-horizontal", 'name'=>"registrationForm",'id'=>'register-form', 'style'=>'display:none')); ?>


  <div class="row">
                 <div class="form-group col-lg-12">



                                    <?php echo e(Form::text('name', old('name') , $attributes = array('class'=>'form-control',

                                        'placeholder' => 'Name',

                                        'ng-model'=>'name',

                                        'ng-pattern' => getRegexPattern('name'),

                                        'required'=> 'true',

                                        'ng-class'=>'{"has-error": registrationForm.name.$touched && registrationForm.name.$invalid}',

                                        'ng-minlength' => '4',

                                    ))); ?>



                                    <div class="validation-error" ng-messages="registrationForm.name.$error" >

                                        <?php echo getValidationMessage(); ?>


                                        <?php echo getValidationMessage('minlength'); ?>


                                        <?php echo getValidationMessage('pattern'); ?>


                                    </div>

                                </div>






                            <div class="form-group col-lg-12">



                                    <?php echo e(Form::text('username', old('username') , $attributes = array('class'=>'form-control',

                                        'placeholder' => 'Username',

                                        'ng-model'=>'username',

                                        'required'=> 'true',

                                        'ng-class'=>'{"has-error": registrationForm.username.$touched && registrationForm.username.$invalid}',

                                        'ng-minlength' => '4',

                                    ))); ?>



                                    <div class="validation-error" ng-messages="registrationForm.username.$error" >

                                        <?php echo getValidationMessage(); ?>


                                        <?php echo getValidationMessage('minlength'); ?>


                                        <?php echo getValidationMessage('pattern'); ?>


                                    </div>



                            </div>


                  <div class="form-group col-lg-12">



                                   <?php echo e(Form::email('email', $value = null , $attributes = array('class'=>'form-control',

                                        'placeholder' => getPhrase("email"),

                                        'ng-model'=>'email',

                                        'required'=> 'true',

                                        'id'=>'rg_email',

                                        'ng-class'=>'{"has-error": registrationForm.email.$touched && registrationForm.email.$invalid}',

                                    ))); ?>





                                    <div class="validation-error" ng-messages="registrationForm.email.$error" >

                                            <?php echo getValidationMessage(); ?>


                                            <?php echo getValidationMessage('email'); ?>


                                     </div>


                            </div>






                            <div class="form-group col-lg-12">




                                    <?php echo e(Form::password('password', $attributes = array('class'=>'form-control instruction-call',

                                        'placeholder' => getPhrase("password"),

                                        'ng-model'=>'registration.password',

                                        'required'=> 'true',

                                        'id'=>'rg_password',

                                        'ng-class'=>'{"has-error": registrationForm.password.$touched && registrationForm.password.$invalid}',

                                        'ng-minlength' => 5

                                    ))); ?>




                                   <div class="validation-error" ng-messages="registrationForm.password.$error" >

                                        <?php echo getValidationMessage(); ?>


                                        <?php echo getValidationMessage('password'); ?>


                                    </div>

                            </div>


                             <div class="form-group col-lg-12">




                                    <?php echo e(Form::password('password_confirmation', $attributes = array('class'=>'form-control instruction-call',

                                        'placeholder' => getPhrase("password_confirmation"),

                                        'ng-model'=>'registration.password_confirmation',

                                        'required'=> 'true',

                                        'ng-class'=>'{"has-error": registrationForm.password_confirmation.$touched && registrationForm.password_confirmation.$invalid}',

                                        'ng-minlength' => 5,

                                        'compare-to' =>"registration.password"

                                    ))); ?>


                                        <div class="validation-error" ng-messages="registrationForm.password_confirmation.$error" >

                                            <?php echo getValidationMessage(); ?>


                                            <?php echo getValidationMessage('minlength'); ?>


                                            <?php echo getValidationMessage('confirmPassword'); ?>


                                        </div>


                            </div>

                            <div class="form-group col-lg-12">


                                    <input type="tel" name="phone_number" required class="phone form-control col-12" placeholder="Enter Phonenumber">
                                    



                            </div>
                            <div class="form-group col-lg-12">
                                <input type="text" name="cnic" placeholder="Enter CNIC Number 34120-1234569-7" maxlength="15" minlength="15" class="cnic form-control">


                                    


                                    <div class="validation-error" ng-messages="registrationForm.cnic.$error" >

                                        <?php echo getValidationMessage(); ?>


                                        <?php echo getValidationMessage('minlength'); ?>

                                        <?php echo getValidationMessage('maxlength'); ?>


                                    </div>



                            </div>
                            <div class="form-group col-lg-12">



                                    <?php echo e(Form::text('city', old('city') , $attributes = array('class'=>'form-control',

                                        'placeholder' => 'City name',

                                        'ng-model'=>'city',

                                        'required'=> 'true',

                                        'ng-class'=>'{"has-error": registrationForm.city.$touched && registrationForm.city.$invalid}',

                                        'ng-minlength' => '3',

                                    ))); ?>



                                    <div class="validation-error" ng-messages="registrationForm.city.$error" >

                                        <?php echo getValidationMessage(); ?>


                                        <?php echo getValidationMessage('minlength'); ?>


                                    </div>



                            </div>
                            <div class="form-group col-lg-12">



                                    <?php echo e(Form::text('state', old('state') , $attributes = array('class'=>'form-control',

                                        'placeholder' => 'State',

                                        'ng-model'=>'state',

                                        'required'=> 'true',

                                        'ng-class'=>'{"has-error": registrationForm.state.$touched && registrationForm.state.$invalid}',

                                        'ng-minlength' => '3',

                                    ))); ?>



                                    <div class="validation-error" ng-messages="registrationForm.state.$error" >

                                        <?php echo getValidationMessage(); ?>


                                        <?php echo getValidationMessage('minlength'); ?>


                                    </div>



                            </div>
                            <div class="form-group col-lg-12">



                                    <?php echo e(Form::text('country', old('country') , $attributes = array('class'=>'form-control',

                                        'placeholder' => 'Country',

                                        'ng-model'=>'country',

                                        'required'=> 'true',

                                        'ng-class'=>'{"has-error": registrationForm.country.$touched && registrationForm.country.$invalid}',

                                        'ng-minlength' => '3',

                                    ))); ?>



                                    <div class="validation-error" ng-messages="registrationForm.country.$error" >

                                        <?php echo getValidationMessage(); ?>


                                        <?php echo getValidationMessage('minlength'); ?>


                                    </div>



                            </div>
                            <div class="form-group col-lg-12">
                                <?php echo e(Form::text('streetaddress', old('streetaddress') , $attributes = array('class'=>'form-control',

                                    'placeholder' => 'Street Address',

                                    'ng-model'=>'streetaddress',

                                    'required'=> 'true',

                                    'ng-class'=>'{"has-error": registrationForm.streetaddress.$touched && registrationForm.streetaddress.$invalid}',

                                    'ng-minlength' => '10',

                                ))); ?>

                                <div class="validation-error" ng-messages="registrationForm.streetaddress.$error" >

                                    <?php echo getValidationMessage(); ?>


                                    <?php echo getValidationMessage('minlength'); ?>


                                </div>
                            </div>

                            
                            
                                <div class="form-group col-lg-12">
                                    <div class="">
                                        <input type="checkbox" name="tc" required> Must agree to <a href="#">Terms and Conditions</a>
                                    </div>
                                </div>

                  <div class="form-group col-lg-12">
                    <div class="text-center  login-btn">
                        <button type="submit" class="btn btn-primary login-bttn" ng-disabled='!registrationForm.$valid'>
                                       <?php echo e(getPhrase('register_now')); ?>

                                    </button>
                      </div>

                  </div>
              </div>
                <?php echo Form::close(); ?>





          </div>
        </div>
      </div>
    </div>
  </div>
<!---LOGIN TABS-->



<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>