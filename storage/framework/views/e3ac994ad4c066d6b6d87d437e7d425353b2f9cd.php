

<?php $__env->startSection('content'); ?>
	<h3 class="page-title"> <?php echo e(getPhrase('change_password')); ?></h3>

	
		<?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo e(Form::model($record, 
						array('url' => ['users/change-password', $record->slug], 
						'method'=>'patch', 'novalidate'=>'', 'name'=>"changePassword"))); ?>


		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo e($title); ?>

			</div>

			<div class="panel-body form-auth-style">

				<div class="row">

					<div class="col-xs-6">

						<div class="form-group">
							<?php echo Form::label('current_password', getPhrase('current_password'), ['class' => 'control-label']); ?>


							<span style="color:red;">*</span>

							<?php echo e(Form::password('old_password', $attributes = array('class'=>'form-control', 'placeholder' => getphrase('old_password'),

									'ng-model'=>'old_password',

									'required'=> 'true', 

									'ng-class'=>'{"has-error": changePassword.old_password.$touched && changePassword.old_password.$invalid}',

									'ng-minlength' => 5

							))); ?>



							<div class="validation-error" ng-messages="changePassword.old_password.$error" >

								<?php echo getValidationMessage(); ?>


								<?php echo getValidationMessage('password'); ?>


							</div>

						</div>


						<div class="form-group">

						<?php echo Form::label('new_password', getPhrase('new_password'), ['class' => 'control-label']); ?>


						<span style="color:red;">*</span>

						<?php echo e(Form::password('password', $attributes = array('class'=>'form-control', 'placeholder' => getphrase('new_password'),

							'ng-model'=>'password',

							'required'=> 'true', 

							'ng-class'=>'{"has-error": changePassword.password.$touched && changePassword.password.$invalid}',

							'ng-minlength' => 5

						))); ?>



						<div class="validation-error" ng-messages="changePassword.password.$error" >

							<?php echo getValidationMessage(); ?>


							<?php echo getValidationMessage('password'); ?>


						</div>

						</div>



						<div class="form-group">

							<?php echo Form::label('new_password_confirmation', getPhrase('password_confirm'), ['class' => 'control-label']); ?>


							<span style="color:red;">*</span>

							<?php echo e(Form::password('password_confirmation', $attributes = array('class'=>'form-control', 'placeholder' => getphrase('retype_password'),

								'ng-model'=>'password_confirmation',

								'required'=> 'true', 

							'ng-class'=>'{"has-error": changePassword.password_confirmation.$touched && changePassword.password_confirmation.$invalid}',

								'compare-to' =>"password",

								'ng-minlength' => 5

							))); ?>



								
								<div class="validation-error" ng-messages="changePassword.password_confirmation.$error" >

								<?php echo getValidationMessage(); ?>


								<?php echo getValidationMessage('password'); ?>


								<?php echo getValidationMessage('confirmPassword'); ?>



								</div>

						</div>


						<div class="form-group pull-right">

							<button class="btn btn-success"

							ng-disabled='!changePassword.$valid' ><?php echo e(getPhrase('change')); ?></button>

						</div>

				</div>

				

				
			</div>

		</div>


		<?php echo Form::close(); ?>

	
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_scripts'); ?>
	<?php echo $__env->make('common.validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>