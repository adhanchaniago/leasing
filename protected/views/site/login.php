<div class="row-fluid">
	<div class="span4"></div>
	<div class="span4">
		<div class="panel panel-info">
			<div class="panel-heading"><h1><small>Login</small></h1></div>
			<div class="panel-body" style="padding:10px;">
				<div class="form">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'login-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); ?>
						<?php echo $form->textField($model,'username', array('placeholder'=>'Username','style'=>'width:97%')); ?>
						<?php echo $form->error($model,'username'); ?>
				
					
						<?php echo $form->passwordField($model,'password',  array('placeholder'=>'Password','style'=>'width:97%')); ?>
						<?php echo $form->error($model,'password'); ?>
				

					 <div class="form-actions">
						<?php echo TbHtml::submitButton('Login',array(
							'color'=>TbHtml::BUTTON_COLOR_INFO,
							'size'=>TbHtml::BUTTON_SIZE_SMALL,
						)); ?>
					</div>

				<?php $this->endWidget(); ?>
				</div><!-- form -->
			</div>
		</div>
	</div>
	<div class="span4"></div>
</div>

