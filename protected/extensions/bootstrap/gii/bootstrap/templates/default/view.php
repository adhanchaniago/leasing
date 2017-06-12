<?php
echo "<?php\n";
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin'),
	\$model->{$nameColumn},
);\n";
?>
?>

<section class="commonSection bgwhite">
	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body" style="overflow:auto;">
					<h1>Lihat <?php echo $this->modelClass . " #<?php echo \$model->{$nameColumn}; ?>"; ?></h1>

					<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView',array(
						'htmlOptions' => array(
							'class' => 'table table-striped table-condensed table-hover',
						),
						'data'=>$model,
						'attributes'=>array(
					<?php
					foreach ($this->tableSchema->columns as $column) {
						echo "\t\t'" . $column->name . "',\n";
					}
					?>
						),
					)); ?>
				</div>
			</div>
		</div>
	</div>
</section>