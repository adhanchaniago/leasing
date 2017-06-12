<?php

class AdminController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('adminhome'),
				'expression'=>array('AdminController','allowOnlyOwner'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function allowOnlyOwner(){
		$ada = User::model()->findByAttributes(array('username'=>Yii::app()->user->id));
		if($ada->level == 4){	
			return true;
		}
    }
	
	public function actionAdminHome(){
		
		$this->render('adminhome');
	}
	
	public function actionCustomer()
	{
		$model=new Customer('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Customer'])) {
			$model->attributes=$_GET['Customer'];
		}

		$this->render('customer',array(
			'model'=>$model,
		));
	}
}
?>