<?php
$this->breadcrumbs=array(
	'Proposals'=>array('admin'),
	'Manage',
);
?>

										
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'proposal-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
			'header' => 'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		'customer_id',
		'kendaraan_id',
		'judul_pengajuan',
		'jangka_waktu',
		'status_id',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
				