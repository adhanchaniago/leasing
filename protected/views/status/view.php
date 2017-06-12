<?php
$this->breadcrumbs=array(
	'Statuses'=>array('admin'),
	$model->id,
);
?>

<section class="commonSection bgwhite">
	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body" style="overflow:auto;">
					<h1>Lihat Status #<?php echo $model->id; ?></h1>

					<?php $this->widget('zii.widgets.CDetailView',array(
						'htmlOptions' => array(
							'class' => 'table table-striped table-condensed table-hover',
						),
						'data'=>$model,
						'attributes'=>array(
							'id',
		'status',
						),
					)); ?>
				</div>
			</div>
		</div>
	</div>
</section>