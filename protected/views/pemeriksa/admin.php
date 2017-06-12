<?php
$this->breadcrumbs=array(
	'Pemeriksas'=>array('admin'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
  $('.search-form form').submit(function(){
    $('#pemeriksa-grid').yiiGridView('update', {
      data: $(this).serialize()
    });
    return false;
  });
 ");
?>

<div class="form-actions">
	<div class="search-form" >
		<?php $this->renderPartial('_search',array(
		  'model'=>$model,
		)); ?>
	</div>
</div>
		
<?php echo TbHtml::linkButton('<i class="fa fa-plus"></i> Tambah', array('url'=>array('create'), 'class'=>'btn btn-info')); ?>
<br/><br/>
		
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pemeriksa-grid',
	'htmlOptions' => array(
        'class' => 'table table-bordered table-condensed table-hover',
    ),
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
			'header' => 'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		'nama',
		'kota',
		'negara',
		'email',
		'telepon',
		'role.level',
		array(
			'header'=>'Action',
			'headerHtmlOptions'=>array('style'=>'text-align:center;'),
			'htmlOptions'=>array('style'=>'text-align:center;'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
			