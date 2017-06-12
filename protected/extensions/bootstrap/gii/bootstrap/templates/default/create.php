<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin'),
	'Tambah',
);\n";
?>
?>
<section class="commonSection bgwhite">
	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body" style="overflow:auto;">
					<h1>Tambah <?php echo $this->modelClass; ?></h1>

					<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
				</div>
			</div>
		</div>
	</div>
</section>