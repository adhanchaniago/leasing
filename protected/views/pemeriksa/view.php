<?php
$this->breadcrumbs=array(
	'Pemeriksas'=>array('admin'),
	$model->id,
);
?>

					<h1>Lihat Pemeriksa #<?php echo $model->id; ?></h1>

					<?php $this->widget('zii.widgets.CDetailView',array(
						'htmlOptions' => array(
							'class' => 'table table-striped table-condensed table-hover',
						),
						'data'=>$model,
						'attributes'=>array(
							'id',
		'nama',
		'kota',
		'negara',
		'email',
		'telepon',
						),
					)); ?>
		