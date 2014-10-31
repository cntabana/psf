		
<style>
.span5{

	display: block;
    width: 30%;
    min-height: 30px;
   
}
</style>
<?
$group = array(''=>'Select Group','1'=>'Administrative','2'=>'Admin','0'=>'Receptionist');
?>
<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
        'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
	)
)); ?>
     	<fieldset>
		<legend>
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		</legend>

	<?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span12')); ?>
        		
   <div class="control-group">		
			<div class="span4">

	<?php echo $form->textFieldRow($model,'firstname',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'lastname',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->dropDownListRow($model,'group',$group,array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model, 'idposition', GxHtml::listDataEx(Position::model()->findAllAttributes(null, true)),array('prompt'=>'Select Position','class'=>'span5','maxlength'=>20)); ?>
    
    <?php echo $form->hiddenField($model,'status',array('value'=>1,'class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'salt',array('class'=>'span5','maxlength'=>32)); ?>

                        </div>   
  </div>
<br/>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
                        'icon'=>'ok white',  
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
              <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
                        'icon'=>'remove',  
			'label'=>'Reset',
		)); ?>
	</div>
</fieldset>

<?php $this->endWidget(); ?>

</div>
