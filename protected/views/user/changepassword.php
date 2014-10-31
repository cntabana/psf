<style>
/*!
 * Bootstrap v2.3.1
 *
 * Copyright 2012 Twitter, Inc
 * Licensed under the Apache License v2.0
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Designed and built with all the love in the world @twitter by @mdo and @fat.
 */


form {
  margin: 0 0 20px;
}


label,
input,
button,
select,
textarea {
  font-size: 14px;
  font-weight: normal;
  line-height: 20px;
}

input,
button,
select,
textarea {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}

label {
  display: block;
  margin-bottom: 5px;
}

select,
textarea,
input[type="text"],
input[type="password"],

.uneditable-input {
  display: inline-block;
  height: 20px;
  padding: 4px 6px;
  margin-bottom: 10px;
  font-size: 14px;
  line-height: 20px;
  color: #555555;
  vertical-align: middle;
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
}

input,
textarea,
.uneditable-input {
  width: 206px;
   min-height: 30px;
}

textarea {
  height: auto;
}

textarea,
input[type="text"],
input[type="password"],

.uneditable-input {
  background-color: #ffffff;
  border: 1px solid #cccccc;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
     -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
       -o-transition: border linear 0.2s, box-shadow linear 0.2s;
          transition: border linear 0.2s, box-shadow linear 0.2s;
}

button.btn,
input[type="submit"].btn {
  *padding-top: 3px;
  *padding-bottom: 3px;
}

button.btn::-moz-focus-inner,
input[type="submit"].btn::-moz-focus-inner {
  padding: 0;
  border: 0;
}

button.btn.btn-large,
input[type="submit"].btn.btn-large {
  *padding-top: 7px;
  *padding-bottom: 7px;
}

button.btn.btn-small,
input[type="submit"].btn.btn-small {
  *padding-top: 3px;
  *padding-bottom: 3px;
}

button.btn.btn-mini,
input[type="submit"].btn.btn-mini {
  *padding-top: 1px;
  *padding-bottom: 1px;
}

</style>

<h2>Change Password</h2>
<hr>
<div class="form" align='center'>
 
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'chnage-password-form',
            'enableClientValidation' => true,
            //'htmlOptions' => array('class' => 'well'),
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
     ));
?>
 
  <div class="row"> <?php echo $form->labelEx($model,'old_password'); ?> <?php echo $form->passwordField($model,'old_password'); ?> <?php echo $form->error($model,'old_password'); ?> </div>
 
  <div class="row"> <?php echo $form->labelEx($model,'new_password'); ?> <?php echo $form->passwordField($model,'new_password'); ?> <?php echo $form->error($model,'new_password'); ?> </div>
 
  <div class="row"> <?php echo $form->labelEx($model,'repeat_password'); ?> <?php echo $form->passwordField($model,'repeat_password'); ?> <?php echo $form->error($model,'repeat_password'); ?> </div>
 
  <div class="row submit">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Change password')); ?>
  </div>
  <?php $this->endWidget(); ?>
</div>