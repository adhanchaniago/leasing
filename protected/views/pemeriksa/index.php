<?php
/* @var $this PemeriksaController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Pemeriksas',
);

$this->menu=array(
	array('label'=>'Create Pemeriksa','url'=>array('create')),
	array('label'=>'Manage Pemeriksa','url'=>array('admin')),
);
?>

<h1>Pemeriksas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>