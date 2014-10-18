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
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
		array('label'=>'Export to PDF', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
		array('label'=>'Export to Excel', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
	),
));
$this->endWidget();
?>



<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<? $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'food-grid',
    'itemsCssClass' => 'table-bordered items',
    'dataProvider' => $model->search(),
    'columns'=>array(
        array(
           'class' => 'editable.EditableColumn',
           'name' => 'id',
           'headerHtmlOptions' => array('style' => 'width: 80px'),
                         
        ),
        'username',
         array( 
            'class' => 'editable.EditableColumn',
            'name' => 'firstname',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('user/updateFirstname'),
                'placement' => 'right',
            )
          ), 
          array( 
            'class' => 'editable.EditableColumn',
            'name' => 'lastname',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('user/updateLastname'),
                'placement' => 'right',
            )
          ),
          array( 
            'class' => 'editable.EditableColumn',
            'name' => 'password',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('user/updatePassword'),
                'placement' => 'right',
            )
          ),  
        array( 
              'class' => 'editable.EditableColumn',
              'name' => 'group',
              'headerHtmlOptions' => array('style' => 'width: 100px'),
              'editable' => array(
                  'type'     => 'select',
                  'url'      => $this->createUrl('user/updateGroup'),
                  'source'   => $this->createUrl('user/groupes'),
                  'options'  => array(    //custom display 
                     'display' => 'js: function(value, sourceData) {
                          var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                              colors = {1: "green", 2: "blue", 3: "red", 4: "gray"};
                          $(this).text(selected[0].text).css("color", colors[value]);    
                      }'
                  ),
                 //onsave event handler 
                 'onSave' => 'js: function(e, params) {
                      console && console.log("saved value: "+params.newValue);
                 }',
                 //source url can depend on some parameters, then use js function:
                 /*
                 'source' => 'js: function() {
                      var dob = $(this).closest("td").next().find(".editable").text();
                      var username = $(this).data("username");
                      return "?r=site/getStatuses&user="+username+"&dob="+dob;
                 }',
                 'htmlOptions' => array(
                     'data-username' => '$data->user_name'
                 )
                 */
              )
         ),

        
         
         //editable related attribute with sorting.
         //see http://www.yiiframework.com/wiki/281/searching-and-sorting-by-related-model-in-cgridview  
      
    ),
)); 

