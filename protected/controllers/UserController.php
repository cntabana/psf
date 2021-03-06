<?php

class UserController extends CController
{
        public $breadcrumbs;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', 
				'actions'=>array('index','view','Changepassword','changePasswordUser', 'UpdateBooster','UpdatePaswword'),
				'users'=>array('*'),
				),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','GeneratePdf','GenerateExcel','groupes','UpdateFirstname','UpdateGroup','UpdateLastname','UpdatePassword'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $session=new CHttpSession;
            $session->open();		
            $criteria = new CDbCriteria();            

                $model=new User('search');
                $model->unsetAttributes();  // clear any default values

                if(isset($_GET['User']))
		{
                        $model->attributes=$_GET['User'];
			
			
                   	
                       if (!empty($model->id)) $criteria->addCondition('id = "'.$model->id.'"');
                     
                    	
                       if (!empty($model->group)) $criteria->addCondition('group = "'.$model->group.'"');
                     
                    	
                       if (!empty($model->status)) $criteria->addCondition('status = "'.$model->status.'"');
                     
                    	
                       if (!empty($model->username)) $criteria->addCondition('username = "'.$model->username.'"');
                     
                    	
                       if (!empty($model->password)) $criteria->addCondition('password = "'.$model->password.'"');
                     
                    	
                       if (!empty($model->firstname)) $criteria->addCondition('firstname = "'.$model->firstname.'"');
                     
                    	
                       if (!empty($model->lastname)) $criteria->addCondition('lastname = "'.$model->lastname.'"');
                     
                    	
                       if (!empty($model->idposition)) $criteria->addCondition('idposition = "'.$model->idposition.'"');
                     
                    	
                       if (!empty($model->salt)) $criteria->addCondition('salt = "'.$model->salt.'"');
                     
                    			
		}
                 $session['User_records']=User::model()->findAll($criteria); 
       

                $this->render('index',array(
			'model'=>$model,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
             if(isset($session['User_records']))
               {
                $model=$session['User_records'];
               }
               else
                 $model = User::model()->findAll();

		
		Yii::app()->request->sendFile(date('YmdHis').'.xls',
			$this->renderPartial('excelReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.modules.admin.extensions.giiplus.bootstrap.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');

             if(isset($session['User_records']))
               {
                $model=$session['User_records'];
               }
               else
                 $model = User::model()->findAll();



		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('User Report');
		$pdf->SetSubject('User Report');
		//$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Report", '');
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 0);
		$pdf->SetFont('dejavusans', '', 7);
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("User_002.pdf", "I");
	}

	public function actionUpdateFirstname()
    {
		    $es = new EditableSaver('User');  //'User' is name of model to be updated
		    $es->update();
	}

	public function actionUpdateLastname()
	{
		    $es = new EditableSaver('User');  //'User' is name of model to be updated
		    $es->update();
	}

	public function actionUpdatePassword()
	{
		    $es = new EditableSaver('User');
			$es->update();
	}

	public function actionUpdateGroup()
	{
		    $es = new EditableSaver('User');
			$es->update();
	}

	public function actionGroupes()
	{
	$data = array(
        array('value' => 1, 'text' => 'Cape Town'),
        array('value' => 2, 'text' => 'Still Bay'),
        array('value' => 3, 'text' => 'Johannesburg'),
        array('value' => 4, 'text' => 'Port Elisabeth'),
    ); 

    return $data;
	}

public function actionChangepassword($id)
 {      

 
    $model = User::model()->findByAttributes(array('id'=>$id));
    $model->setScenario('changePwd');
 
 
     if(isset($_POST['User'])){
 
        $model->attributes = $_POST['User'];
        $valid = $model->validate();
 
        if($valid){
 
          $model->password = $model->new_password;
          //$model->setAttributes($model->password);

          if($model->save())
             $this->redirect(array('user/changePasswordUser&p=profile'));
          else
             $this->redirect(array('changepassword','msg'=>'password not changed'));
            }
        }
 
    $this->render('changepassword',array('model'=>$model)); 
 }

 
 public function actionChangePasswordUser() {
		$dataProvider = new CActiveDataProvider('User');
		$this->render('changePasswordUser', array(
			'dataProvider' => $dataProvider,
		));
	}

}