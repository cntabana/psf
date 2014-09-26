<?php

/**
 * This is the model base class for the table "user_requests".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserRequests".
 *
 * Columns in table "user_requests" available as properties of the model,
 * followed by relations of table "user_requests" available as properties of the model.
 *
 * @property integer $id
 * @property integer $iduser
 * @property integer $idrequest
 * @property string $receiveddate
 * @property integer $status
 *
 * @property Request $idrequest0
 * @property User $iduser0
 */
abstract class BaseUserRequests extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'user_requests';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UserRequests|UserRequests', $n);
	}

	public static function representingColumn() {
		return 'receiveddate';
	}

	public function rules() {
		return array(
			array('iduser, idrequest, receiveddate, status', 'required'),
			array('iduser, idrequest, status', 'numerical', 'integerOnly'=>true),
			array('id, iduser, idrequest, receiveddate, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idrequest0' => array(self::BELONGS_TO, 'Request', 'idrequest'),
			'iduser0' => array(self::BELONGS_TO, 'User', 'iduser'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'iduser' => null,
			'idrequest' => null,
			'receiveddate' => Yii::t('app', 'Received Date'),
			'status' => Yii::t('app', 'Status'),
			'idrequest0' => null,
			'iduser0' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;
        if(Yii::app()->user->group == 1 ){
        $criteria->addCondition('iduser='.Yii::app()->session['iduser']);
         $criteria->addCondition('status=1');
		}
		$criteria->compare('id', $this->id);
		$criteria->compare('iduser', $this->iduser);
		$criteria->compare('idrequest', $this->idrequest);
		$criteria->compare('receiveddate', $this->receiveddate, true);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	public function searchSent() {
		$criteria = new CDbCriteria;
        if(Yii::app()->user->group == 1 ){
        $criteria->addCondition('iduser='.Yii::app()->session['iduser']);
         $criteria->addCondition('status=3');
		}
		$criteria->compare('id', $this->id);
		$criteria->compare('iduser', $this->iduser);
		$criteria->compare('idrequest', $this->idrequest);
		$criteria->compare('receiveddate', $this->receiveddate, true);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	static function getStatuss()
		{
		return array(
		    array('id'=>'1', 'type'=>'Open'),
		    array('id'=>'3', 'type'=>'Closed'),
		);
		}
		static function getStatus($onoff)
		{
		if($onoff == 1) 
		    return 'Open';
		else 
		    return 'Closed';
		}
}