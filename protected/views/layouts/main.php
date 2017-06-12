<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>
	<?php //Yii::app()->getClientScript()->registerCoreScript('jquery.ui'); ?>
</head>

<body>

<div class="container" id="page">

	<!--<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	<div class="page-header text-center">
		<h1><small><?php echo CHtml::encode(Yii::app()->name); ?></small></h1>
	</div>
	
	<?php
		$criteria = new CDbCriteria;
		$criteria->condition = 'username = :param1 AND level = :param2';
		$criteria->params = array(':param1'=>Yii::app()->user->id, ':param2'=>4);
		
		$cekadmin = User::model()->find($criteria);
		
		$critcust = new CDbCriteria;
		$critcust->condition = 'username = :param1 AND level = :param2';
		$critcust->params = array(':param1'=>Yii::app()->user->id, ':param2'=>5);
		
		$cekcustomer = User::model()->find($critcust);
		
		$critapp = new CDbCriteria;
		$critapp->condition = 'username = :param1 AND level IN ("1", "2", "3")';
		$critapp->params = array(':param1'=>Yii::app()->user->id);
		
		$cekapp = User::model()->find($critapp);
	?>
	
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/admin/adminhome'), 'visible'=>!empty($cekadmin)),
				array('label'=>'Customer', 'url'=>array('/customer/admin'), 'visible'=>!empty($cekadmin)),
				array('label'=>'Pemeriksa', 'url'=>array('/pemeriksa/admin'), 'visible'=>!empty($cekadmin)),
				array('label'=>'Home', 'url'=>array('/customer/userhome'), 'visible'=>!empty($cekcustomer)),
				array('label'=>'Profil', 'url'=>array('/customer/profil', 'username'=>Yii::app()->user->id), 'visible'=>!empty($cekcustomer)),
				array('label'=>'Pengajuan Kredit Kendaraan', 'url'=>array('/customer/proposal', 'username'=>Yii::app()->user->id), 'visible'=>!empty($cekcustomer)),
				array('label'=>'Home', 'url'=>array('/approver/approverhome'), 'visible'=>!empty($cekapp)),
				array('label'=>'Lihat Pengajuan', 'url'=>array('/approver/pengajuan', 'username'=>Yii::app()->user->id), 'visible'=>!empty($cekapp)),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
		
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
