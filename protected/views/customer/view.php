<?php
$this->breadcrumbs=array(
	'Customers'=>array('admin'),
	$model->id,
);
?>
<h1>Lihat Customer #<?php echo $model->id; ?></h1>

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
		'penghasilan',
	),
)); ?>

