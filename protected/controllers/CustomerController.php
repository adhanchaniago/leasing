<?php

class CustomerController extends Controller
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
				'actions'=>array('admin','delete', 'index','view', 'create','update'),
				'expression'=>array('CustomerController','allowOnlyOwner'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('userhome','proposal', 'profil', 'updateprofil'),
				'expression'=>array('CustomerController','allowOnlyUser'),
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
	
	public function allowOnlyUser(){
		$ada = User::model()->findByAttributes(array('username'=>Yii::app()->user->id));
		if($ada->level == 5 || $ada->level == 3 || $ada->level == 2){	
			return true;
		}
    }
	
	// public function actionGetNama() {
        // $res = array();
        // $param = $_POST['kd'];
        // $_GET['term'] = isset($param) ? $param['term'] : $_GET['term'];
        // if (isset($_GET['term'])) {
            // $sql = "
			// select nama
			// FROM customer 
			// WHERE lower(nama) LIKE :name";
            // $command = Yii::app()->db->createCommand($sql);
            // $command->bindValue(":name", '%' . $_GET['term'] . '%', PDO::PARAM_STR);
            // $res = $command->queryColumn();
        // }
        // echo CJSON::encode($res);
        // Yii::app()->end();
    // }
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Customer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Customer'])) {
			$model->attributes=$_POST['Customer'];
			if ($model->save()) {
				$cekuser = new User;
				$cekuser->nama = $model->nama;
				$cekuser->username = $model->username;
				$cekuser->password = 'telkom';
				$cekuser->level = 5;
				$cekuser->email = $model->email;
				$cekuser->save();
				
				Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS, 'Data berhasil diinput');
				$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Customer'])) {
			$model->attributes=$_POST['Customer'];
			if ($model->save()) {
				Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS, 'Data berhasil diedit');
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		
		$model = Customer::model()->findByPk($id);
			$delpemeriksa = User::model()->findByAttributes(array('username'=>$model->username));
			$delpemeriksa->delete();
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS, 'Data berhasil dihapus');
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Customer');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Customer('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Customer'])) {
			$model->attributes=$_GET['Customer'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionUserHome(){
		
		$this->render('userhome');
	}
	
	public function actionProposal($username){
		
		$modlog = Customer::model()->findByAttributes(array('username'=>$username));
		$cekpro = Proposal::model()->findByAttributes(array('customer_id'=>$modlog->id, 'status_id'=>3));
		
		$model=new Proposal;

		if (isset($_POST['Proposal'])) {
			$model->attributes=$_POST['Proposal'];
			$model->customer_id = $modlog->id;
			$model->created_date = date('Y-m-d');
			$model->status_id = 3;
			$ada = count($cekpro);
			// var_dump($ada == 0);exit;
			if($cekpro != null){
				/*if($cekpro->status_id == 2 || $cekpro->status_id == 6){
					if ($model->save()) {
						Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS, 'Pengajuan berhasil dilakukan, mohon tunggu sampai proses selesai');
						$this->redirect(array('customer/proposal','username'=>$username));
					}
				}else{*/
					Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_DANGER, 'Anda telah mengajukan proposal, mohon tunggu sampai proposal selesai di proses');
					$this->redirect(array('customer/proposal','username'=>$username));
				//} 	 
			}else{
				if ($model->save()) {
					Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS, 'Pengajuan berhasil dilakukan, mohon tunggu sampai proses selesai');
					$this->redirect(array('customer/proposal','username'=>$username));
				}
			}
		}
		
		$modeldata=new Proposal('search');
		$modeldata->unsetAttributes();  // clear any default values
		if (isset($_GET['Proposal'])) {
			$modeldata->attributes=$_GET['Proposal'];
		}
		
		$this->render('proposal',array(
			'username'=>$username,
			'model'=>$model,
			'modeldata'=>$modeldata
		));
	}
	
	public function actionProfil($username){
		$modlog = Customer::model()->findByAttributes(array('username'=>$username));
		
		$this->render('profil',array(
			'username'=>$username,
			'modlog'=>$modlog
		));
	}
	
	public function actionUpdateProfil($username)
	{
		$model = Customer::model()->findByAttributes(array('username'=>$username));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Customer'])) {
			$model->attributes=$_POST['Customer'];
			if ($model->save()) {
				Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS, 'Data berhasil diedit');
				$this->redirect(array('profil', 'username'=>$username));
			}
		}

		$this->render('updateprofil',array(
			'model'=>$model,
			'username'=>$username
		));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Customer the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Customer::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Customer $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='customer-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}