<?php 
	echo '<h3>Profil '. $modlog->nama.'</h3>';
?>

<?php $this->widget('zii.widgets.CDetailView',array(
'htmlOptions' => array(
	'class' => 'table table-striped table-condensed table-hover',
),
	'data'=>$modlog,
	'attributes'=>array(
		'nama',
		'kota',
		'negara',
		'email',
		'telepon',
		'penghasilan',
	),
)); ?>

<?php 
if(Yii::app()->user->id == $modlog->username)
{
	echo TbHtml::linkButton('<i class="fa fa-plus"></i> Edit Profil', array('url'=>array('updateprofil','username'=>$modlog->username), 'class'=>'btn btn-info')); 
}
?>
<br/><br/>