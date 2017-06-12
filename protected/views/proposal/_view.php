<?php
/* @var $this ProposalController */
/* @var $data Proposal */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kendaraan_id')); ?>:</b>
	<?php echo CHtml::encode($data->kendaraan_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('judul_pengajuan')); ?>:</b>
	<?php echo CHtml::encode($data->judul_pengajuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jangka_waktu')); ?>:</b>
	<?php echo CHtml::encode($data->jangka_waktu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($data->status_id); ?>
	<br />


</div>