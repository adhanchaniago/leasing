<?php

/**
 * This is the model class for table "pemeriksa".
 *
 * The followings are the available columns in table 'pemeriksa':
 * @property string $id
 * @property string $nama
 * @property string $kota
 * @property string $negara
 * @property string $email
 * @property string $telepon
 * @property string $user
 *
 * The followings are the available model relations:
 * @property User $user0
 */
class Pemeriksa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pemeriksa the static model class
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
		return 'pemeriksa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('level, username, nama, kota, negara, email, telepon','required'),
			array('level', 'numerical','integerOnly'=>true),
			array('nama, username, kota, negara, email, telepon', 'length', 'max'=>45),
			array('username','unique'),
			array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, kota, username, negara, email, level, telepon, user', 'safe', 'on'=>'search'),
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
			'role' => array(self::BELONGS_TO, 'Level', array('level'=>'id'), 'joinType'=>'JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'kota' => 'Kota',
			'negara' => 'Negara',
			'email' => 'Email',
			'telepon' => 'Telepon',
			'user' => 'User',
			'level' => 'Level',
			'username' => 'Username',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('negara',$this->negara,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telepon',$this->telepon,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('username',$this->username,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}