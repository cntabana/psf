<?php
$this->breadcrumbs=array(
	'User Requests',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-requests-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<h3>User Requests</h3>
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
		//array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
        array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array('style'=>'color:black')),
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


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-requests-grid',
	'dataProvider'=>$model->search(),
        'type'=>'striped bordered condensed',
        'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		'id',
			'receiveddate',
		array(
        'name'=>'status',
        'value'=>'Request::getStatus($data->status)',
        'filter'=>CHtml::listData(Request::getStatuss(), 'id', 'status'),
        ),
		 array(
                'name'=>'idrequest0.request',
                   'header'=>'Request',
                   'type'=>'raw',
                  // 'value'=>'$data->nameofmd',
				   'value'=>'CHtml::link("<span style=color:blue>View Request</span>",Yii::app()->createUrl("userRequests/view", array("id"=>$data["id"])))',
                   //'htmlOptions'=>array('width'=>'40'),
                  
           ),
		  array(
                
                   'header'=>'Reponse',
                   'type'=>'raw',
                   'value'=>'CHtml::link("<span style=color:blue>Response</span>",Yii::app()->createUrl("response/create", array("idrequest"=>$data["idrequest"])))',
                   //'htmlOptions'=>array('width'=>'40'),
                  
           ),
	
           array(
                
                   'header'=>'Riderect',
                   'type'=>'raw',
                   'value'=>'CHtml::link("<span style=color:blue>Riderect</span>",Yii::app()->createUrl("userRequests/update", array("id"=>$data->id)))',
                   //'htmlOptions'=>array('width'=>'40'),
                  
           ),

	),
)); ?>

