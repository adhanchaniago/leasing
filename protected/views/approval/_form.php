<br/>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'approval-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<div class="col-lg-4">
							<?php echo $form->textFieldControlGroup($model,'customer',array('span'=>5,'maxlength'=>10)); ?>

							<?php echo $form->textFieldControlGroup($model,'user',array('span'=>5,'maxlength'=>10)); ?>

							<?php echo $form->textFieldControlGroup($model,'status',array('span'=>5,'maxlength'=>10)); ?>

							<?php echo $form->textAreaControlGroup($model,'comment',array('class'=>'form-control','rows'=>6,'span'=>8)); ?>

					</div>
	</div>
    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Simpan',array(
		    'color'=>TbHtml::BUTTON_COLOR_INFO,
		    'size'=>TbHtml::BUTTON_SIZE_SMALL,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->