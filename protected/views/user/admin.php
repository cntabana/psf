<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'user-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'group',
		'status',
		'username',		
		'firstname',
		'lastname',
		/*
		'password',
		
		array(
				'name'=>'idposition',
				'value'=>'GxHtml::valueEx($data->idposition0)',
				'filter'=>GxHtml::listDataEx(Position::model()->findAllAttributes(null, true)),
				),
		'salt',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>