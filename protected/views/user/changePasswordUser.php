<?php
$model = new user;
$this->breadcrumbs=array(
	'Users',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('users-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<h1>Change Profile</h1>
<hr />





<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php
$groupes = array(
    array('value'=>'1', 'text'=>'Admin'),
    array('value'=>'2', 'text'=>'Receptionist'),
    array('value'=>'3', 'text'=>'Administrative'),
   );

$status = array(
    array('value'=>'1', 'text'=>'Active'),
    array('value'=>'0', 'text'=>'Inactive')
    
    );

 $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
        'type'=>'striped bordered condensed',
        'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		'id',
		array( 
            
            'name' => 'firstname',
         ),
		
		array( 
           
            'name' => 'lastname',
            
          ),
		'username',
		 array(
                'name'=>'password',
                   'header'=>'Password',
                   'type'=>'raw',
                   'value'=>'CHtml::link("Change Password",Yii::app()->createUrl("user/changepassword", array("id"=>$data["id"])))',
                   
                        
           ),
		/*
		'salt',
		
		*/

	),
)); ?>

