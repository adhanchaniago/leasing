<?php
/* @var $this PemeriksaController */
/* @var $model Pemeriksa */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
		<div class="row-fluid">
			<div class="span3">
                <?php echo $form->textField($model,'nama',array('span'=>12,'maxlength'=>45, 'placeholder'=>'Nama')); ?>
			</div>
			<div class="span3">
                 <?php echo $form->textField($model,'kota',array('span'=>12,'maxlength'=>45, 'placeholder'=>'Kota')); ?>
			</div>
			<div class="span3">
                <?php echo $form->textField($model,'negara',array('span'=>12,'maxlength'=>45, 'placeholder'=>'Negara')); ?>
			</div>
			<div class="span3">
                 <?php echo $form->textField($model,'email',array('span'=>12, 'maxlength'=>45, 'placeholder'=>'Email')); ?>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="span3">
				<?php echo $form->textField($model,'telepon',array('span'=>12,'maxlength'=>45, 'placeholder'=>'Telepon')); ?>
			</div>
			<div class="span3">
				<?php //echo $form->textField($model,'level',array('span'=>12,'maxlength'=>10, 'placeholder'=>'Level')); ?>
				<?php echo $form->dropDownList($model,'level',CHtml::listData(Level::model()->findAll(array('condition'=>'id IN (1, 2, 3)')), 'id', 'level'),array('prompt'=>'Pilih Level','span'=>12,'options'=>array($model->level =>array('selected'=>true))));?>
			</div>
		</div>
		
       <?php echo TbHtml::submitButton('<i class="fa fa-search""></i> Search',  array('color' => TbHtml::BUTTON_COLOR_INFO,));?>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->