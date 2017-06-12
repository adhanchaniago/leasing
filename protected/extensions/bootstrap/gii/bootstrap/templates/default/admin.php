<?php echo "<?php"; ?>
<?php
echo "\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin'),
	'Manage',
);\n";
?>
?>

<section class="commonSection bgwhite">
	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body" style="overflow:auto;">
					
					<?php
						foreach(Yii::app()->user->getFlashes() as $key => $message){
							echo '<div class="alert alert-'.$key.'">'.'<button type="button" class="close" data-dismiss="alert">*</button>'.$message."</div>\n";
						}
					?>
					
					<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
						'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
						'dataProvider'=>$model->search(),
						'columns'=>array(
							<?php
							$count = 0;
							foreach ($this->tableSchema->columns as $column) {
								if (++$count == 7) {
									echo "\t\t/*\n";
								}
								echo "\t\t'" . $column->name . "',\n";
							}
							if ($count >= 7) {
								echo "\t\t*/\n";
							}
							?>
							array(
								'class'=>'bootstrap.widgets.TbButtonColumn',
							),
						),
					)); ?>
				</div>
			</div>
		</div>
	</div>
</section>