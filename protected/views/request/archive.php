<?php
$this->breadcrumbs=array(
	'Requests',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('request-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<h3>Requests</h3>
<hr />

<?php 
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array('style'=>'color:black')),
        array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button','style'=>'color:black')),
		array('label'=>'Export to PDF', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank','style'=>'color:black'), 'visible'=>true),
		array('label'=>'Export to Excel', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank','style'=>'color:black'), 'visible'=>true),
	),
));
$this->endWidget();
?>



<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php
//echo 'CHtml::link("Redirect",Yii::app()->createUrl("userRequests/create", array("idrequest"=>$model->status)))';
$link = 'CHtml::link("<span style=color:blue>Redirect</span>",Yii::app()->createUrl("userRequests/create", array("idrequest"=>$data["id"])))';
 $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'request-grid',
	'dataProvider'=>$model->searchArchive(),
        'type'=>'striped bordered condensed',
        'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		'id',
		//'request',
		 array(
                'name'=>'request',
                   'header'=>'Request',
                   'type'=>'raw',
                   'value'=>'CHtml::link("<span style=color:blue>$data[request]<span>",Yii::app()->createUrl("request/view", array("id"=>$data["id"])))',
                   //'htmlOptions'=>array('width'=>'40'),
                  
           ),
		'phonenumber',
		'email',
		'requestdate',
		'responsedate',
		array(
        'name'=>'status',
        'value'=>'Request::getStatus($data->status)',
        'filter'=>CHtml::listData(Request::getStatuss(), 'id', 'status'),
        ),
		array(
                'name'=>'idrequest',
                   'header'=>'Redirect',
                   'type'=>'raw',
                  // 'value'=>'$data->nameofmd',
				   'value'=>$link,
                   //'htmlOptions'=>array('width'=>'40'),
                  
           ),   
	),
)); ?>

