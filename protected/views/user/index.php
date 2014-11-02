<?php
$this->breadcrumbs=array(
	'Users',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
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

<h3>Users</h3>
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


<? 


$status = array(
    array('value'=>'1', 'text'=>'Active'),
    array('value'=>'0', 'text'=>'Inactive')
    
    );

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'food-grid',
    'itemsCssClass' => 'table-bordered items',
    'dataProvider' => $model->search(),
    'columns'=>array(
        array(
          
           'name' => 'id',
           'headerHtmlOptions' => array('style' => 'width: 80px'),
                         
        ),
        'username',
         array( 
           
            'name' => 'firstname',
            
          ), 
          array( 
            
            'name' => 'lastname',
            
          ),
          array(
                'name'=>'password',
                   'header'=>'Password',
                   'type'=>'raw',
                   'value'=>'CHtml::link("<span style=color:blue>Change Password</span>",Yii::app()->createUrl("user/changepassword", array("id"=>$data["id"])))',
                   
                        
           ),
           array( 'name' => 'group',
            'type' => 'raw',
            'value' => 'User::getGroups($data["group"])',
          ), 
        
      
      
    ),
)); 
?>
