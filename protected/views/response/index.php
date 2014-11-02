<?php
$this->breadcrumbs=array(
	'Responses',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('response-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<h1 style = 'color:#027f3d'>Responses</h1>
<hr />
<span style='backgroundcolor:blue'>
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
        array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button','style'=>'color:black')),
		array('label'=>'Export to PDF', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank','style'=>'color:black'), 'visible'=>true),
		array('label'=>'Export to Excel', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank','style'=>'color:black'), 'visible'=>true),
	),
));
$this->endWidget();
?>

</span>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'response-grid',
	'dataProvider'=>$model->search(),
        'type'=>'striped bordered condensed',
        'template'=>'{summary}{pager}{items}{pager}',
        'filter'=>$model,
	'columns'=>array(
		//'idrequest',
		//strip_tags('<a href="">response</a>'),
		//'response_date',
         array(
                'name'=>'response',
                   'header'=>'Response',
                   'type'=>'raw',
                  // 'value'=>'$data->nameofmd',
				   'value'=>'CHtml::link("<span style=color:blue>$data[response]<span>",Yii::app()->createUrl("response/view", array("id"=>$data["id"])))',
                   
                   //'htmlOptions'=>array('width'=>'40'),
                  
           ),
      
	),
)); ?>

