<br/>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'proposal-form',
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

			<?php echo $form->dropDownListControlGroup($model,'kendaraan_id',CHtml::listData(Kendaraan::model()->findAll(), 'id', 'kendaraan'),array('prompt'=>'Pilih Kendaraan'));?>

			<?php echo $form->textFieldControlGroup($model,'judul_pengajuan',array('span'=>5,'maxlength'=>45)); ?>

			<?php echo $form->dropDownListControlGroup($model, 'jangka_waktu', array('1'=>'12 Bulan', '2'=>'24 Bulan', '3'=>'36 Bulan'), array('prompt'=>'Pilih Jangka Waktu','options'=>array($model->jangka_waktu=>array('selected'=>true)))); ?>
			
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

<?php
  foreach(Yii::app()->user->getFlashes() as $key => $message){
    echo '<div class="alert alert-'.$key.'">'.'<button type="button" class="close" data-dismiss="alert">*</button>'.$message."</div>\n";
  }
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'proposal-grid',
	'dataProvider'=>$modeldata->search($username),
	'columns'=>array(
		array(
			'header' => 'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		'cust.nama',
		'cust.penghasilan',
		'kendaraan.kendaraan',
		'judul_pengajuan',
		array(
			'header'=>'Jangka Waktu',
			'value'=>'$data->getJangka()',
		),
		'status.status',
	),
)); ?>