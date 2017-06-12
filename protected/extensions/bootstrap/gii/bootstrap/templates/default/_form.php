<br/>
<div class="form">

    <?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'" . $this->class2id($this->modelClass) . "-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>\n"; ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>
	
	<div class="row">
		<div class="col-lg-4">
			<?php
			foreach ($this->tableSchema->columns as $column) {
				if ($column->autoIncrement) {
					continue;
				}
				?>
				<?php echo "<?php echo " . $this->generateActiveControlGroup($this->modelClass, $column) . "; ?>\n"; ?>

			<?php
			}
			?>
		</div>
	</div>
    <div class="form-actions">
        <?php echo "<?php echo TbHtml::submitButton(\$model->isNewRecord ? 'Simpan' : 'Simpan',array(
		    'color'=>TbHtml::BUTTON_COLOR_INFO,
		    'size'=>TbHtml::BUTTON_SIZE_SMALL,
		)); ?>\n"; ?>
    </div>

    <?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->