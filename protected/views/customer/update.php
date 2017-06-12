
<?php
$this->breadcrumbs=array(
	'Customers'=>array('admin'),
	'Edit',
);
?>
<h1>Edit Customer <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>	