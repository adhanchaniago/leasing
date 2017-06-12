
<?php
$this->breadcrumbs=array(
	'Proposals'=>array('admin'),
	'Edit',
);
?>
<section class="commonSection bgwhite">
	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body" style="overflow:auto;">
					<h1>Edit Proposal <?php echo $model->id; ?></h1>

					<?php $this->renderPartial('_form', array('model'=>$model)); ?>				</div>
			</div>
		</div>
	</div>
</section>