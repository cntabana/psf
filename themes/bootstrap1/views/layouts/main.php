<?php /* @var $this Controller */
error_reporting(E_ALL);

ini_set('display_errors', 1);

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
   <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet"> 
 
 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/pagination.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/sb-admin-2.css" rel="stylesheet">

    
    <!-- Custom Fonts -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
    <style>
#footer {
  background-color:#FFFFFF;
  border:2px solid #F7921E;
  display:block;
  float:left;
  height:110px;
  margin:10px 0 0;
  overflow:hidden;
  width:100%;
}

div.psf_boxtitle_orange {
  background-color:#F7921E;
 
  background-repeat:no-repeat;
  color:#FFFFFF;
  display:block;
  float:left;
  font-family:'Segoe UI';
  font-size:14px;
  font-weight:bold;
  height:25px;
  line-height:25px;
  margin:0;
  overflow:hidden;
  padding-left:10px;
  text-align:left;
  text-transform:uppercase;
  width:99%;
}

.list_carousel {
  height:105px;
  margin:0;
  width:963px;
}

element.style {
  bottom:auto;
  display:block;
  float:none;
  height:80px;
  left:auto;
  margin:0;
  overflow:hidden;
  position:relative;
  right:auto;
  text-align:start;
  top:auto;
 
  z-index:auto;
}


.list_carousel ul {
  display:block;
  list-style:none;
  margin:0;
  padding:0;
}
    </style>
</head>

<body>

<?php

if(!Yii::app()->user->isGuest){
if(yii::app()->user->group == 2){

   $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/home'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'User Management', 'url'=>array('/user'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Departments', 'url'=>array('/departments'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Requests', 'url'=>array('/request'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Position', 'url'=>array('/position'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Response', 'url'=>array('/response'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Backup', 'url'=>array('/backup'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); 
}else if(yii::app()->user->group == 1){

   $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/home'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'User Requests', 'url'=>array('/userRequests'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Sent', 'url'=>array('/userRequests/sent'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Response', 'url'=>array('/response'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
));	
}
else{

	   $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/home'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'New Requests', 'url'=>array('/request/newRequest'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Open Requests', 'url'=>array('/request/archive'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Under Process Requests', 'url'=>array('/request/underProcess'), 'visible'=>!Yii::app()->user->isGuest),
                 array('label'=>'Closed Requests', 'url'=>array('/request/closed'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
));
}
}else{

     $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); 
}
?>

<div class="container" id="page">
<br>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
   
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
        <div class="psf_boxtitle_orange">Sponsors & Partners</div>
        
        <div class="caroufredsel_wrapper" style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 100%; height: 80px; margin: 0px; overflow: hidden;">
        
        <a href="http://www.theglobalfund.org/en/" target="_blank">
        <img src="images/part_globalfund.jpg" width="145" height="68" border="0"/>
        </a>
        
        
        <a href="http://rwanda.nlembassy.org/" target="_blank">
        <img src="images/part_nethlandsembassy.jpg" width="145" height="68" border="0"/>
        </a>
        
        
        <a href="http://www.spark-online.org/" target="_blank">
        <img src="images/part_sparks.jpg" width="145" height="68" border="0"/>
        </a>
        
        
        <a href="http://www.trademarkea.com/category/projects/projects-rwanda/" target="_blank">
        <img src="images/part_tmea.jpg" width="140" height="68" border="0"/>
        </a>
        
        
        <a href="http://www.acbf-pact.org/" target="_blank">
        <img src="images/part_acfb.jpg" width="140" height="68" border="0"/>
        </a>
        
        
        <a href="http://www.afdb.org/en/countries/east-africa/rwanda/" target="_blank">
        <img src="images/part_afdb.jpg" width="140" height="68" border="0"/>
        </a>
        
        
        <a href="http://rdb.rw/" target="_blank">
        <img src="images/member_rdb.jpg" width="140" height="68" border="0"/>
        </a>
        
        
        <a href="http://www.wda.gov.rw/" target="_blank">
        <img src="images/part_wda.jpg" width="14" height="68" border="0"/>
        </a>
        
    
        
     
        </div>
        <div class="clearfix"/>
        </div>
       

        </div><!-- page -->

        <div class="clear"></div>

</body>
</html>
