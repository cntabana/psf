<!DOCTYPE>
<html >
<head>


	<!-- General meta information -->
	<title>Login Psf</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="index, follow" />
	<meta charset="utf-8" />
	<!-- // General meta information -->
	
	
	<!-- Load Javascript -->
	<script type="text/javascript" src="./login/js/jquery.js"></script>
	<script type="text/javascript" src="./login/js/jquery.query-2.1.7.js"></script>
	<script type="text/javascript" src="./login/js/rainbows.js"></script>
	<!-- // Load Javascipt -->

	<!-- Load stylesheets -->
	<link type="text/css" rel="stylesheet" href="./login/css/style.css" media="screen" />
	<!-- // Load stylesheets -->
	
<script>


	$(document).ready(function(){
 
	$("#submit1").hover(
	function() {
	$(this).animate({"opacity": "0"}, "slow");
	},
	function() {
	$(this).animate({"opacity": "1"}, "slow");
	});
 	});


</script>
	
</head>
<body>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div id="wrapper">
		<div id="wrappertop"></div>

		<div id="wrappermiddle">

			<h2>Login</h2>

			<div id="username_input">

				<div id="username_inputleft"></div>

				<div id="username_inputmiddle">
			
					
					<?php echo $form->textField($model,'username',array('id'=>'url','placeholder'=>'Enter Username')); ?>
					<?php echo $form->error($model,'username'); ?>
					<img id="url_user" src="./login/images/mailicon.png" alt="">
				
				</div>

				<div id="username_inputright"></div>

			</div>

			<div id="password_input">

				<div id="password_inputleft"></div>

				<div id="password_inputmiddle">
				
					
					<?php echo $form->passwordField($model,'password',array('id'=>'url','placeholder'=>'Enter Password')); ?>
					<?php echo $form->error($model,'password'); ?>
					<img id="url_password" src="./login/images/passicon.png" alt="">
				
				</div>

				<div id="password_inputright"></div>

			</div>

			<div id="submit">
				<form>
				<input type="image" src="./login/images/submit_hover.png" id="submit1" value="Sign In">
				<input type="image" src="./login/images/submit.png" id="submit2" value="Sign In">
				</form>
			</div>


			

			
		</div>

		<div id="wrapperbottom"></div>
		
		
	</div>
<?php $this->endWidget(); ?>

</body>
</html>