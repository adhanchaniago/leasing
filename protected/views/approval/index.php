<?php
/* @var $this ApprovalController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Approvals',
);

$this->menu=array(
	array('label'=>'Create Approval','url'=>array('create')),
	array('label'=>'Manage Approval','url'=>array('admin')),
);
?>

<h1>Approvals</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>