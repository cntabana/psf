<?php

Yii::import('application.models._base.BaseDepartments');

class Departments extends BaseDepartments
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}