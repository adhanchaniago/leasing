<?php

class ApproverController extends Controller
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
				'actions'=>array('approverhome', 'pengajuan', 'approved', 'rejected'),
				'expression'=>array('ApproverController','allowOnlyOwner'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionApproverHome(){
		$this->render('approverhome');
	}
	
	public function allowOnlyOwner(){
		$ada = User::model()->findByAttributes(array('username'=>Yii::app()->user->id));
		if($ada->level == 1 || $ada->level == 2 || $ada->level == 3){	
			return true;
		}
    }
	
	public function actionPengajuan($username){
		
		$modeldata=new Proposal('search');
		$modeldata->unsetAttributes();  // clear any default values
		if (isset($_GET['Proposal'])) {
			$modeldata->attributes=$_GET['Proposal'];
		}
		
		$this->render('pengajuan',array(
			'username'=>$username,
			'modeldata'=>$modeldata
		));
	}
	
	public function actionApproved($id){
		$model = Proposal::model()->findByPk($id);
		$approver = User::model()->findByAttributes(array('username'=>Yii::app()->user->id));
		
		if($approver->level == 1){
			$model->status_id = 1;
		}else if($approver->level == 2){
			$model->status_id = 4;
		}else if($approver->level == 3){
			$model->status_id = 6;
			
			$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
			//$mailer->IsSMTP();
			$mailer->IsHTML(true);
			$mailer->SMTPAuth = true;
			$mailer->SMTPSecure = "";
			$mailer->Host = "localhost";
			$mailer->SMTPDebug  = 2; 
			$mailer->Port = 26;
			$mailer->Username = "ferioandrean@yahoo.co.id";
			$mailer->Password = 'Blitar_181192';
			$mailer->From = "System";
			$mailer->FromName = "No Reply";
			$mailer->AddAddress($model->cust->email);
			$mailer->Subject = "Proposal Pengajuan Kredit Mobil";
			$mailer->Body = 'Yth '.$model->cust->nama.', Terimakasih pengajuan kredit anda telah diterima.';
			$mailer->Send();
		}	
		if($model->save()){
			$this->redirect(array('approver/pengajuan', 'username'=>$approver->username));
		}
	}
	
	public function actionRejected($id){
		$model = Proposal::model()->findByPk($id);
		$approver = User::model()->findByAttributes(array('username'=>Yii::app()->user->id));
		
		if($approver->level == 1){
			$model->status_id = 2;
			
			$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
			//$mailer->IsSMTP();
			$mailer->IsHTML(true);
			$mailer->SMTPAuth = true;
			$mailer->SMTPSecure = "";
			$mailer->Host = "localhost";
			$mailer->SMTPDebug  = 2; 
			$mailer->Port = 26;
			$mailer->Username = "ferioandrean@yahoo.co.id";
			$mailer->Password = 'Blitar_181192';
			$mailer->From = "System";
			$mailer->FromName = "No Reply";
			$mailer->AddAddress($model->cust->email);
			$mailer->Subject = "Proposal Pengajuan Kredit Mobil";
			$mailer->Body = 'Yth '.$model->cust->nama.', Terimakasih pengajuan kredit anda telah diterima.';
			$mailer->Send();
		}else if($approver->level == 2){
			$model->status_id = 5;
		}else if($approver->level == 3){
			$model->status_id = 7;
		}	
		if($model->save()){
			$this->redirect(array('approver/pengajuan', 'username'=>$approver->username));
		}
	}
}
?>	