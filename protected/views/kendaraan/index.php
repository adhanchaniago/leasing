<?php
/* @var $this KendaraanController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Kendaraans',
);

$this->menu=array(
	array('label'=>'Create Kendaraan','url'=>array('create')),
	array('label'=>'Manage Kendaraan','url'=>array('admin')),
);
?>

<h1>Kendaraans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>