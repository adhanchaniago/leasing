<?php

/**
 * This is the model class for table "proposal".
 *
 * The followings are the available columns in table 'proposal':
 * @property string $id
 * @property string $customer_id
 * @property string $kendaraan_id
 * @property string $judul_pengajuan
 * @property string $jangka_waktu
 * @property string $status_id
 */
class Proposal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Proposal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proposal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kendaraan_id, judul_pengajuan, jangka_waktu', 'required'),
			array('customer_id, kendaraan_id', 'length', 'max'=>10),
			array('judul_pengajuan, jangka_waktu, status_id', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, customer_id, kendaraan_id, created_date, judul_pengajuan, jangka_waktu, status_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cust' => array(self::BELONGS_TO, 'Customer', array('customer_id'=>'id'), 'joinType'=>'JOIN'),
			'kendaraan' => array(self::BELONGS_TO, 'Kendaraan', array('kendaraan_id'=>'id'), 'joinType'=>'JOIN'),
			'status' => array(self::BELONGS_TO, 'Status', array('status_id'=>'id'), 'joinType'=>'JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'customer_id' => 'Customer',
			'kendaraan_id' => 'Kendaraan',
			'judul_pengajuan' => 'Judul Pengajuan',
			'jangka_waktu' => 'Jangka Waktu',
			'status_id' => 'Status',
			'created_date' => 'Created Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($username)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		
		$cekmod = Customer::model()->findByAttributes(array('username'=>$username));
		
		$criteria=new CDbCriteria;
		
		$criteria->condition = 'customer_id = :param1';
		$criteria->params = array(':param1'=>$cekmod->id);
		
		$criteria->compare('id',$this->id,true);
		$criteria->compare('customer_id',$this->customer_id,true);
		$criteria->compare('kendaraan_id',$this->kendaraan_id,true);
		$criteria->compare('judul_pengajuan',$this->judul_pengajuan,true);
		$criteria->compare('jangka_waktu',$this->jangka_waktu,true);
		$criteria->compare('status_id',$this->status_id,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchPengajuan()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		
		$approver = User::model()->findByAttributes(array('username'=>Yii::app()->user->id));
		
		$criteria=new CDbCriteria;
		
		if($approver->level == 1){
			$criteria->condition = 'status_id IN (3, 5)';
		}else if($approver->level == 2){
			$criteria->condition = 'status_id IN (1, 7)';
		}else if($approver->level == 3){
			$criteria->condition = 'status_id = 4';
		}	
		
		$criteria->compare('id',$this->id,true);
		$criteria->compare('customer_id',$this->customer_id,true);
		$criteria->compare('kendaraan_id',$this->kendaraan_id,true);
		$criteria->compare('judul_pengajuan',$this->judul_pengajuan,true);
		$criteria->compare('jangka_waktu',$this->jangka_waktu,true);
		$criteria->compare('status_id',$this->status_id,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getJangka(){
		if($this->jangka_waktu == 1){
			return '12 Bulan';
		}else if($this->jangka_waktu == 2){
			return '24 Bulan';
		}else{
			return '36 Bulan';
		}	
	}
	
	public function getLink(){
		$data = User::model()->findByAttributes(array('username'=>Yii::app()->user->id));
		if($data->level == 2){
			return CHtml::link($this->cust->nama,array("customer/profil","username"=>$this->cust->username));
		}else if($data->level == 3){
			return CHtml::link($this->cust->nama,array("customer/profil","username"=>$this->cust->username));
		}else{
			return $this->cust->nama;
		}
	}
}