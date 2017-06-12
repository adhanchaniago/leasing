<?php
$this->breadcrumbs=array(
	'Pemeriksas'=>array('admin'),
	'Edit',
);
?>

<h1>Edit Pemeriksa <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>