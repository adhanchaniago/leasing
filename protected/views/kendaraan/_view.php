<?php
/* @var $this KendaraanController */
/* @var $data Kendaraan */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kendaraan')); ?>:</b>
	<?php echo CHtml::encode($data->kendaraan); ?>
	<br />


</div>